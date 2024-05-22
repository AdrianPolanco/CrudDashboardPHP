<?php

declare(strict_types=1);
class Database
{
    private mysqli $connection;

    public function __construct(string $host = "localhost", string $username = "root", string $password = "", string $dbname = "warriors")
    {
        $this->connection = new mysqli($host, $username, $password, $dbname);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        $this->connection->set_charset('utf8');
    }

    private function countRecords(string $table = "warriors"): int
    {
        $sql = "SELECT COUNT(*) FROM $table";
        $result = $this->connection->query($sql);
        $row = $result->fetch_assoc();
        return (int)$row["COUNT(*)"];
    }

    public function getRecordById(int $id, string $table = "warriors"): ?array
    {
        $sql = "SELECT * FROM $table WHERE id = ?";
        //Usamos prepare para compilar la consulta en la BD y hacerla mas eficiente, pudiendo reutilizarla con diferentes parametros
        //en caso de que se necesite ejecutar la misma consulta con diferentes parametros
        //Adicionalmente, al ejecutar consultas preparadas, automaticamente se escapan los caracteres especiales y los parametros que se enlazan posteriormente son tratados como datos, no como sintaxis de la consulta, evitando inyecciones SQL
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("i", $id);
        $preparedQuery->execute();
        $result = $preparedQuery->get_result();
        return $result->fetch_assoc() ?: null;
    }

    public function getRecordsByPage(int $page, string $table = "warriors"): array
    {
        $offset = ($page - 1) * 10;
        $sql = "SELECT * FROM $table ORDER BY id LIMIT 10 OFFSET ?";
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("i", $offset);
        $preparedQuery->execute();
        $result = $preparedQuery->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $recordsQuantity = $this->countRecords();
        return ["data" => $data, "totalPages" => ceil($recordsQuantity / 10)];
    }

    public function insertRecord(string $name, string $lastname, string $birthdate, string $table = "warriors"): bool
    {
        $sql = "INSERT INTO $table (nombre, apellido, fecha_nacimiento) VALUES (?, ?, ?)";
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("sss", $name, $lastname, $birthdate);
        return $preparedQuery->execute();
    }

    public function updateRecord(int $id, string $name, string $lastname, string $birthdate, string $table = "warriors"): bool
    {
        $sql = "UPDATE $table SET nombre = ?, apellido = ?, fecha_nacimiento = ? WHERE id = ?";
        $preparedQuery = $this->connection->prepare($sql);
        //Asignamos cada una de las letras a cada uno de los valores de las variables que se estan pasando
        //y estas se asignan a los signos de interrogacion, por lo que en lugar del ? estaran los valores de las variables
        //al ejecutarse el script
        $preparedQuery->bind_param("sssi", $name, $lastname, $birthdate, $id);
        return $preparedQuery->execute();
    }

    public function deleteRecord(int $id, string $table = "warriors"): bool
    {
        $sql = "DELETE FROM $table WHERE id = ?";
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("i", $id);
        return $preparedQuery->execute();
    }
}

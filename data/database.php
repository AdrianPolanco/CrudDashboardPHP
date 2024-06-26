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

    public function countWarriors(string $table = "warriors"): int
    {
        $sql = "SELECT COUNT(*) FROM $table";
        $result = $this->connection->query($sql);
        $row = $result->fetch_assoc();
        return (int)$row["COUNT(*)"];
    }

    public function getWarriorById(int $id, string $table = "warriors"): ?array
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

    public function getWarriorsByPage(int $page, string $table = "warriors"): array
    {
        $offset = ($page - 1) * 10;
        $sql = "SELECT * FROM $table ORDER BY id LIMIT 10 OFFSET ?";
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("i", $offset);
        $preparedQuery->execute();
        $result = $preparedQuery->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $recordsQuantity = $this->countWarriors();
        return ["data" => $data, "totalPages" => ceil($recordsQuantity / 10)];
    }

    public function getWarriors()
    {
        $sql = "SELECT * FROM warriors";
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->execute();
        $result = $preparedQuery->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertWarrior(string $name, string $lastname, string $birthdate, string $table = "warriors"): bool
    {
        $sql = "INSERT INTO $table (nombre, apellido, fecha_nacimiento) VALUES (?, ?, ?)";
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("sss", $name, $lastname, $birthdate);
        return $preparedQuery->execute();
    }

    public function updateWarrior(int $id, string $name, string $lastname, string $birthdate, string $table = "warriors"): bool
    {
        $sql = "UPDATE $table SET nombre = ?, apellido = ?, fecha_nacimiento = ? WHERE id = ?";
        $preparedQuery = $this->connection->prepare($sql);
        //Asignamos cada una de las letras a cada uno de los valores de las variables que se estan pasando
        //y estas se asignan a los signos de interrogacion, por lo que en lugar del ? estaran los valores de las variables
        //al ejecutarse el script
        $preparedQuery->bind_param("sssi", $name, $lastname, $birthdate, $id);
        return $preparedQuery->execute();
    }

    public function deleteWarrior(int $id, string $table = "warriors"): bool
    {
        $sql = "DELETE FROM $table WHERE id = ?";
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("i", $id);
        return $preparedQuery->execute();
    }

    public function countAbilityTypes(): int
    {
        $sql = "SELECT COUNT(*) FROM tipos_habilidades";
        $result = $this->connection->query($sql);
        $row = $result->fetch_assoc();
        return (int)$row["COUNT(*)"];
    }

    public function getAbilitiesTypes(): ?array
    {
        $sql = "SELECT * FROM tipos_habilidades";
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->execute();
        $result = $preparedQuery->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAbilityTypeById(int $id): ?array
    {
        $sql = "SELECT * FROM tipos_habilidades WHERE id = ?";
        //Usamos prepare para compilar la consulta en la BD y hacerla mas eficiente, pudiendo reutilizarla con diferentes parametros
        //en caso de que se necesite ejecutar la misma consulta con diferentes parametros
        //Adicionalmente, al ejecutar consultas preparadas, automaticamente se escapan los caracteres especiales y los parametros que se enlazan posteriormente son tratados como datos, no como sintaxis de la consulta, evitando inyecciones SQL
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("i", $id);
        $preparedQuery->execute();
        $result = $preparedQuery->get_result();
        return $result->fetch_assoc() ?: null;
    }

    public function getAbilityTypesByPage(int $page): array
    {
        $offset = ($page - 1) * 10;
        $sql = "SELECT * FROM tipos_habilidades ORDER BY id LIMIT 10 OFFSET ?";
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("i", $offset);
        $preparedQuery->execute();
        $result = $preparedQuery->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $recordsQuantity = $this->countAbilityTypes();
        return ["data" => $data, "totalPages" => ceil($recordsQuantity / 10)];
    }

    public function insertAbilityType(string $name): bool
    {
        $sql = "INSERT INTO tipos_habilidades (tipo_habilidad) VALUES (?)";
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("s", $name);
        return $preparedQuery->execute();
    }

    public function deleteAbilityType(int $id): bool
    {
        $sql = "DELETE FROM tipos_habilidades WHERE id = ?";
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("i", $id);
        return $preparedQuery->execute();
    }

    public function countAbilities(): int
    {
        $sql = "SELECT COUNT(*) FROM habilidades";
        $result = $this->connection->query($sql);
        $row = $result->fetch_assoc();
        return (int)$row["COUNT(*)"];
    }

    public function getAbilities(): ?array
    {
        $sql = "SELECT * FROM habilidades";
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->execute();
        $result = $preparedQuery->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAbilityById(int $id): ?array
    {
        $sql = "SELECT h.*, th.tipo_habilidad
        FROM habilidades h
        INNER JOIN tipos_habilidades th ON h.tipo_habilidad_id = th.id WHERE h.id = ?";;
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("i", $id);
        $preparedQuery->execute();
        $result = $preparedQuery->get_result();
        return $result->fetch_assoc() ?: null;
    }

    public function getAbilitiesByPage(int $page): array
    {
        $offset = ($page - 1) * 10;
        $sql = "SELECT h.*, th.tipo_habilidad
            FROM habilidades h
            INNER JOIN tipos_habilidades th ON h.tipo_habilidad_id = th.id
            ORDER BY h.id
            LIMIT 10 OFFSET ?";
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("i", $offset);
        $preparedQuery->execute();
        $result = $preparedQuery->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $recordsQuantity = $this->countAbilities();
        return ["data" => $data, "totalPages" => ceil($recordsQuantity / 10)];
    }

    public function insertAbility(string $name, string $type, int $power): bool
    {
        $sql = "INSERT INTO habilidades (nombre_habilidad, tipo_habilidad_id, nivel_poder) VALUES (?, ?, ?)";
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("ssi", $name, $type, $power);
        return $preparedQuery->execute();
    }

    public function updateAbility(int $id, string $name, string $type, int $power): bool
    {
        $sql = "UPDATE habilidades SET nombre_habilidad = ?, tipo_habilidad_id = ?, nivel_poder = ? WHERE id = ?";
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("siii", $name, $type, $power, $id);
        return $preparedQuery->execute();
    }

    public function deleteAbility(int $id): bool
    {
        $sql = "DELETE FROM habilidades WHERE id = ?";
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("i", $id);
        return $preparedQuery->execute();
    }

    public function addAbilityToWarrior(int $warriorId, int $abilityId): bool
    {
        $sql = "INSERT INTO warriors_habilidades (warrior_id, habilidad_id) VALUES (?, ?)";
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("ii", $warriorId, $abilityId);
        return $preparedQuery->execute();
    }

    public function getAbilitiesByWarriorId(int $warriorId): ?array
    {
        $sql = "SELECT h.nombre_habilidad,th.tipo_habilidad,h.nivel_poder
                FROM habilidades h INNER JOIN warriors_habilidades wh ON h.id = wh.habilidad_id
                INNER JOIN tipos_habilidades th ON h.tipo_habilidad_id = th.id
                WHERE wh.warrior_id = ?";

        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("i", $warriorId);
        $preparedQuery->execute();
        $result = $preparedQuery->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public
    function countWarriorAbilities($warriorId)
    {
        $sql = "SELECT COUNT(*) AS total_registros
            FROM warriors_habilidades
            WHERE warrior_id = ?";

        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("i", $warriorId);
        $preparedQuery->execute();
        $result = $preparedQuery->get_result();
        $row = $result->fetch_assoc();

        return $row['total_registros'];
    }

    public function getWarriorsAbilitiesByPage($warriorId, $page = 1, $registrosPorPagina = 10): array
    {
        $sql = "SELECT wh.warrior_id, wh.habilidad_id,
        h.nombre_habilidad,
        th.tipo_habilidad,
        h.nivel_poder
    FROM
        habilidades h
    INNER JOIN
        warriors_habilidades wh ON h.id = wh.habilidad_id
    INNER JOIN
        tipos_habilidades th ON h.tipo_habilidad_id = th.id
    WHERE
        wh.warrior_id = ?
    ORDER BY
        h.nombre_habilidad
    LIMIT ?
    OFFSET ?";

        $offset = ($page - 1) * $registrosPorPagina;

        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("iii", $warriorId, $registrosPorPagina, $offset);
        $preparedQuery->execute();
        $result = $preparedQuery->get_result();
        $habilidades = $result->fetch_all(MYSQLI_ASSOC);
        $totalRegistros = $this->countWarriorAbilities($warriorId);

        return [
            'data' => $habilidades,
            'totalPages' => $totalRegistros
        ];
    }

    public function deleteAbilityForWarrior(int $warriorId, int $abilityId): bool
    {
        $sql = "DELETE FROM warriors_habilidades WHERE warrior_id = ? AND habilidad_id = ?";
        $preparedQuery = $this->connection->prepare($sql);
        $preparedQuery->bind_param("ii", $warriorId, $abilityId);
        return $preparedQuery->execute();
    }
}

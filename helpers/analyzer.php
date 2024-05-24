<?php

class WarriorAnalytics
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getAverageAbilitiesPerWarrior(int $warriorId)
    {
        $abilities = $this->database->getAbilitiesByWarriorId($warriorId);
        $totalPower = array_sum(array_column($abilities, 'nivel_poder'));
        $count = count($abilities);
        return $count > 0 ? $totalPower / $count : 0;
    }

    public function getAverageAgeOfWarriors()
    {
        $warriors = $this->database->getWarriors();
        $totalAge = 0;
        $count = 0;
        foreach ($warriors as $warrior) {
            $age = (int)((time() - strtotime($warrior['fecha_nacimiento'])) / (60 * 60 * 24 * 365.25));
            $totalAge += $age;
            $count++;
        }
        return $count > 0 ? $totalAge / $count : 0;
    }

    public function getWarriorsByZodiacSign($signoSeleccionado)
    {
        $warriors = $this->database->getWarriors();
        // Inicializamos todas las claves a 0
        $signs = array_fill_keys([
            'Capricornio', 'Acuario', 'Piscis', 'Aries', 'Tauro', 'Géminis',
            'Cáncer', 'Leo', 'Virgo', 'Libra', 'Escorpio', 'Sagitario'
        ], 0);

        // Calculamos el rango de fechas para cada signo
        $fechasSignos = [
            'Capricornio' => ['start' => '12-22', 'end' => '01-20'],
            'Acuario' => ['start' => '01-21', 'end' => '02-18'],
            'Piscis' => ['start' => '02-19', 'end' => '03-20'],
            'Aries' => ['start' => '03-21', 'end' => '04-19'],
            'Tauro' => ['start' => '04-20', 'end' => '05-20'],
            'Géminis' => ['start' => '05-21', 'end' => '06-20'],
            'Cáncer' => ['start' => '06-21', 'end' => '07-22'],
            'Leo' => ['start' => '07-23', 'end' => '08-22'],
            'Virgo' => ['start' => '08-23', 'end' => '09-22'],
            'Libra' => ['start' => '09-23', 'end' => '10-22'],
            'Escorpio' => ['start' => '10-23', 'end' => '11-21'],
            'Sagitario' => ['start' => '11-22', 'end' => '12-21']
        ];

        foreach ($warriors as $warrior) {
            $fechaNacimiento = date('m-d', strtotime($warrior['fecha_nacimiento']));
            foreach ($fechasSignos as $signo => $rango) {
                if ($fechaNacimiento >= $rango['start'] && $fechaNacimiento <= $rango['end']) {
                    $signs[$signo]++;
                    break;
                }
            }
        }

        // Devolvemos solo la cantidad de guerreros del signo seleccionado
        return $signs[$signoSeleccionado] ?? 0;
    }


    public function getAveragePowerLevelOfAbilities()
    {
        $abilities = $this->database->getAbilities();
        $totalPower = array_sum(array_column($abilities, 'nivel_poder'));
        $count = count($abilities);
        return $count > 0 ? $totalPower / $count : 0;
    }

    public function getMostAndLeastPowerfulAbilities()
    {
        $abilities = $this->database->getAbilities();
        $powerLevels = array_column($abilities, 'nivel_poder');
        return [
            'habilidad_mas_poderosa' => max($powerLevels),
            'habilidad_menos_poderosa' => min($powerLevels),
            "habilidad_mas_poderosa_nombre" => $abilities[array_search(max($powerLevels), $powerLevels)]['nombre_habilidad'],
            "habilidad_menos_poderosa_nombre" => $abilities[array_search(min($powerLevels), $powerLevels)]['nombre_habilidad']
        ];
    }
}

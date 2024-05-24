<?php
// models/Validator.php

class Validator
{
    public static function validateName(string $name, string $pattern, int $minLength, string $fieldName): ?string
    {
        if (empty($name)) {
            return "El campo '$fieldName' es obligatorio.";
        } elseif (!preg_match($pattern, $name)) {
            return "El campo '$fieldName' solo puede contener letras y espacios.";
        } elseif (strlen($name) < $minLength) {
            return "El campo '$fieldName' debe tener al menos $minLength caracteres.";
        }
        return null;
    }

    public static function validateDate(string $date): ?string
    {
        if (empty($date)) {
            return "La fecha de nacimiento es obligatoria.";
        } elseif ($date > date("Y-m-d")) {
            return "La fecha de nacimiento no puede estar en el futuro.";
        }
        return null;
    }

    public static function validatePower(string $power): ?string
    {
        if (empty($power)) {
            return "El campo 'Nivel de poder' es obligatorio.";
        } elseif (!preg_match('/^(100|[1-9]?\d)$/', $power)) {
            return "El campo 'Nivel de poder' debe ser un número entre 0 y 100.";
        }
        return null;
    }
}

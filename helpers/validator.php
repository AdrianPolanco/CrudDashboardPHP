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
}

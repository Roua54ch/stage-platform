<?php

class Validator {

    public static function validateRegister($data) {

        $errors = [];

        if (empty($data['name'])) {
            $errors['name'] = "Name is required";
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email";
        }

        if (strlen($data['password']) < 6) {
            $errors['password'] = "Password must be at least 6 characters";
        }

        if ($data['password'] !== $data['confirm']) {
            $errors['confirm'] = "Passwords do not match";
        }

        return $errors;
    }

    public static function validateLogin($data) {

        $errors = [];

        if (empty($data['email'])) {
            $errors['email'] = "Email required";
        }

        if (empty($data['password'])) {
            $errors['password'] = "Password required";
        }

        return $errors;
    }
}
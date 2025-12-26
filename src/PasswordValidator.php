<?php

namespace App;

class PasswordValidator
{
    /**
     * Проверяет, соответствует ли пароль требованиям.
     *
     * @param string $password Пароль для проверки
     * @return bool true, если пароль валиден, иначе false
     */
    public static function validate(string $password): bool
    {
        // 1. Минимум 8 символов
        if (strlen($password) < 8) {
            return false;
        }

        // 2. Есть хотя бы одна заглавная буква
        if (!preg_match('/[A-Z]/', $password)) {
            return false;
        }

        // 3. Есть хотя бы одна цифра
        if (!preg_match('/\d/', $password)) {
            return false;
        }

        // 4. Нет пробелов
        if (strpos($password, ' ') !== false) {
            return false;
        }

        return true;
    }
}
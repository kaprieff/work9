<?php

declare(strict_types=1);

namespace App\Tests;

use App\PasswordValidator;
use PHPUnit\Framework\TestCase;

class PasswordValidatorTest extends TestCase
{
    /**
     * Data Provider для тестирования валидных паролей.
     *
     * @return array
     */
    public function validPasswordsProvider(): array
    {
        return [
            ['Password1'],
            ['MyPass123'],
            ['StrongP@ssw0rd'],
            ['Valid1Pass'],
        ];
    }

    /**
     * Data Provider для тестирования невалидных паролей.
     *
     * @return array
     */
    public function invalidPasswordsProvider(): array
    {
        return [
            ['pass'],           // Меньше 8 символов
            ['password'],       // Нет заглавной буквы
            ['PASSWORD'],       // Нет цифры
            ['Pass word'],      // Есть пробел
            ['Pass1'],          // Меньше 8 символов
            ['12345678'],       // Нет заглавной буквы
            ['abcdefgh'],       // Нет цифры
            ['Pass 1'],         // Есть пробел
        ];
    }

    /**
     * Тестирует валидные пароли.
     *
     * @dataProvider validPasswordsProvider
     * @param string $password
     */
    public function testValidPasswords(string $password): void
    {
        $this->assertTrue(PasswordValidator::validate($password));
    }

    /**
     * Тестирует невалидные пароли.
     *
     * @dataProvider invalidPasswordsProvider
     * @param string $password
     */
    public function testInvalidPasswords(string $password): void
    {
        $this->assertFalse(PasswordValidator::validate($password));
    }
}
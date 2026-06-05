<?php

class Database
{
    private static $connection = null;

    private static function loadEnv()
    {
        $envFile = __DIR__ . '/../.env';

        if (!file_exists($envFile)) {
            throw new Exception('.env não encontrado.');
        }

        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {

            if (str_starts_with(trim($line), '#')) {
                continue;
            }

            [$key, $value] = explode('=', $line, 2);

            $_ENV[trim($key)] = trim($value);
        }
    }

    public static function connect()
    {
        if (self::$connection === null) {

            self::loadEnv();

            self::$connection = new PDO(
                "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset=utf8",
                $_ENV['DB_USER'],
                $_ENV['DB_PASS']
            );

            self::$connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        }

        return self::$connection;
    }
}
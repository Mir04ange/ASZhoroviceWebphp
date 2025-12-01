<?php

class EnvLoader {
    private static $env = array();

    public static function load($path) {
        if (!file_exists($path)) {
            throw new Exception(".env file not found at: $path");
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            if (strpos($line, '#') === 0 || strpos($line, '=') === false) {
                continue;
            }

            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);

            self::$env[$key] = $value;
            putenv("$key=$value");
        }
    }

    public static function get($key, $default = null) {
        return isset(self::$env[$key]) ? self::$env[$key] : $default;
    }

    public static function getAll() {
        return self::$env;
    }
}

?>

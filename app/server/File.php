<?php

namespace Server;

/**
 * Server/File
 */
class File
{
    /**
     * @param mixed $data
     * @param string $name Filename
     * @return integer|bool
     */
    public static function append($data, $name)
    {
        return file_put_contents(self::file($name), $data, FILE_APPEND);
    }

    /**
     * @param mixed $data
     * @param string $name Filename
     * @return integer|bool
     */
    public static function upload($data, $name)
    {
        return file_put_contents(self::file($name), $data);
    }

    /**
     * @param string $name Filename
     * @return string|null
     */
    public static function load($name)
    {
        $file = self::file($name);
        if (is_file($file)) {
            return file_get_contents($file);
        }

        return null;
    }

    /**
     * @return boolean
     */
    public static function clear($name)
    {
        $file = self::file($name);
        if (is_file($file)) {
            return unlink($file);
        }

        return true;
    }

    /**
     * @param string $name Filename
     * @return string
     */
    private static function file($name)
    {
        return self::directory() . $name;
    }

    /**
     * @return string
     */
    private static function directory()
    {
        return __DIR__ . '/../../data/';
    }
}
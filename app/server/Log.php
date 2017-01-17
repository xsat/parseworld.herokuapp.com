<?php

namespace Server;

/**
 * Server/Log
 */
class Log
{
    /**
     * @param mixed $data
     * @return integer|bool
     */
    public static function append($data)
    {
        ob_start();
        var_dump($data);
        $result = ob_get_clean();
        return File::append(date('Y-m-d H:i:s') . "\n" . $result . "\n", 'log.txt');
    }

    /**
     * @return string|null
     */
    public static function load()
    {
        return File::load('log.txt');
    }

    /**
     * @return boolean
     */
    public static function clear()
    {
        return File::clear('log.txt');
    }
}
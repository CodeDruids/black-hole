<?php
namespace CodeDruids;

/**
 * Black Hole for testing
 *
 * Testing class that ignores everything while still being valid; wrapper around PHP's many "magic methods"
 * @see https://www.php.net/manual/en/language.oop5.magic.php
 *
 * @author Leith Caldwell <leith@codedruids.com>
 * @copyright 2020 CodeDruids
 * @license https://opensource.org/licenses/MIT MIT
 */
class BlackHole
{
    public function __construct()
    {
        // deliberately empty
    }

    public function __destruct()
    {
        // deliberately empty
    }

    public function __get($name)
    {
        return $this;
    }

    public function __set($name, $value)
    {
        return $this;
    }

    public function __isset($name)
    {
        return true;
    }

    public function __unset($name)
    {
        // deliberately empty
    }

    public function __call($name, $arguments)
    {
        return $this;
    }

    public static function __callStatic($name, $arguments)
    {
        return new static;
    }

    public function __toString()
    {
        return static::class;
    }

    public function __serialize()
    {
        return [];
    }

    public function __unserialize(array $data)
    {
        // deliberately empty
    }

    public function __invoke()
    {
        return $this;
    }

    public static function __set_state($properties)
    {
        return new static;
    }

    public function __debugInfo()
    {
        return [];
    }

    public function __clone()
    {
        // deliberately empty
    }
}

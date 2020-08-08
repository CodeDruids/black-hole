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
    /**
     * Constructor
     *
     * @see https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor
     *
     * @return void
     */
    public function __construct()
    {
        // deliberately empty
    }

    /**
     * Destructor
     *
     * @see https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.destructor
     *
     * @return void
     */
    public function __destruct()
    {
        // deliberately empty
    }

    /**
     * Get class property (magic method)
     *
     * @see https://www.php.net/manual/en/language.oop5.overloading.php#object.get
     *
     * @param string $name  Property to retrieve
     * @return mixed  The BlackHole instance so it can be chained.
     */
    public function __get($name)
    {
        return $this;
    }

    /**
     * Set class property (magic method)
     *
     * @see https://www.php.net/manual/en/language.oop5.overloading.php#object.set
     *
     * @param string $name   Property to set
     * @param mixed  $value  Value to set property to
     * @return void
     */
    public function __set($name, $value)
    {
        // deliberately empty
    }

    /**
     * Unset class property (magic method)
     *
     * @see https://www.php.net/manual/en/language.oop5.overloading.php#object.isset
     *
     * @param string $name  Property to check
     * @return bool  Always true
     */
    public function __isset($name)
    {
        return true;
    }

    /**
     * Unset class property (magic method)
     *
     * @see https://www.php.net/manual/en/language.oop5.overloading.php#object.unset
     *
     * @param string $name  Property to unset
     * @return void
     */
    public function __unset($name)
    {
        // deliberately empty
    }

    /**
     * Call specific class method in object context (magic method)
     *
     * @see https://www.php.net/manual/en/language.oop5.overloading.php#object.call
     *
     * @param string  $name       Method to call
     * @param mixed[] $arguments  Enumerated array of method parameters
     * @return mixed  The BlackHole instance so it can be chained.
     */
    public function __call($name, $arguments)
    {
        return $this;
    }

    /**
     * Call specific class method in static context (magic method)
     *
     * @see https://www.php.net/manual/en/language.oop5.overloading.php#object.callstatic
     *
     * @param string  $name       Method to call
     * @param mixed[] $arguments  Enumerated array of method parameters
     * @return mixed  A new BlackHole instance so it can be chained.
     */
    public static function __callStatic($name, $arguments)
    {
        return new static;
    }

    /**
     * Serialize class to string (magic method)
     *
     * @see https://www.php.net/manual/en/language.oop5.magic.php#object.tostring
     *
     * @return string  The fully qualified class name for the object
     */
    public function __toString()
    {
        return static::class;
    }

    /**
     * Serialize class to array (magic method)
     *
     * @see https://www.php.net/manual/en/language.oop5.magic.php#object.serialize
     *
     * @return mixed  Associative array of key-value pairs as object representation
     */
    public function __serialize()
    {
        return [];
    }

    /**
     * Unserialize array of class properties (magic method)
     *
     * @see https://www.php.net/manual/en/function.unserialize.php
     *
     * @param mixed[] $data  Properties to unserialize back into the class
     * @return void
     */
    public function __unserialize(array $data)
    {
        // deliberately empty
    }

    /**
     * Call object as a function (magic method)
     *
     * @see https://www.php.net/manual/en/language.oop5.magic.php#object.invoke
     *
     * @return string  The BlackHole instance so it can be chained.
     */
    public function __invoke()
    {
        return $this;
    }

    /**
     * Override object representation for {@see \var_export()} (magic method)
     *
     * @see https://www.php.net/manual/en/language.oop5.magic.php#object.set-state
     *
     * @param mixed[] $properties  Associative array of exported properties
     * @return object  A new BlackHole instance so it can be chained.
     */
    public static function __set_state($properties)
    {
        return new static;
    }

    /**
     * Override object representation for {@see \var_dump()} (magic method)
     *
     * @see https://www.php.net/manual/en/language.oop5.magic.php#object.debuginfo
     *
     * @return mixed[]  Only the class name
     */
    public function __debugInfo()
    {
        return ['class' => static::class];
    }
}

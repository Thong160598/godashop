<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitc67d768b67d78d0d2a0b46454b0d6acb
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitc67d768b67d78d0d2a0b46454b0d6acb', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitc67d768b67d78d0d2a0b46454b0d6acb', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitc67d768b67d78d0d2a0b46454b0d6acb::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}

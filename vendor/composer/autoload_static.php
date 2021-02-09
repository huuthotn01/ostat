<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf373c4ba22aa48afce862c3029161f63
{
    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Monolog' => 
            array (
                0 => __DIR__ . '/..' . '/monolog/monolog/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitf373c4ba22aa48afce862c3029161f63::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitf373c4ba22aa48afce862c3029161f63::$classMap;

        }, null, ClassLoader::class);
    }
}
<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit28c8bf3611ae36d6aed8080be7d3b386
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit28c8bf3611ae36d6aed8080be7d3b386::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit28c8bf3611ae36d6aed8080be7d3b386::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit28c8bf3611ae36d6aed8080be7d3b386::$classMap;

        }, null, ClassLoader::class);
    }
}

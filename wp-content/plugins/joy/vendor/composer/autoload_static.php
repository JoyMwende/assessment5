<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit79f3b68bdf980e9cd2e4610ece52ada1
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit79f3b68bdf980e9cd2e4610ece52ada1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit79f3b68bdf980e9cd2e4610ece52ada1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit79f3b68bdf980e9cd2e4610ece52ada1::$classMap;

        }, null, ClassLoader::class);
    }
}

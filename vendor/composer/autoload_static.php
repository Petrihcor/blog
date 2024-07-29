<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit92b0cf9673a2328310ea60c29baf69b9
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit92b0cf9673a2328310ea60c29baf69b9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit92b0cf9673a2328310ea60c29baf69b9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit92b0cf9673a2328310ea60c29baf69b9::$classMap;

        }, null, ClassLoader::class);
    }
}

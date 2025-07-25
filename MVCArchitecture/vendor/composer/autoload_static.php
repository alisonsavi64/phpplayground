<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit41a17a7fd5e9542a2f5dc2abe0384c00
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MVCArchitecture\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MVCArchitecture\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit41a17a7fd5e9542a2f5dc2abe0384c00::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit41a17a7fd5e9542a2f5dc2abe0384c00::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit41a17a7fd5e9542a2f5dc2abe0384c00::$classMap;

        }, null, ClassLoader::class);
    }
}

<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit233f1e18f9e6c02ce86a2da11789af56
{
    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'Uocnv\\Dictionary\\' => 17,
        ),
        'B' => 
        array (
            'Benlipp\\SrtParser\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Uocnv\\Dictionary\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Benlipp\\SrtParser\\' => 
        array (
            0 => __DIR__ . '/..' . '/benlipp/srt-parser/src/SrtParser',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit233f1e18f9e6c02ce86a2da11789af56::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit233f1e18f9e6c02ce86a2da11789af56::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit233f1e18f9e6c02ce86a2da11789af56::$classMap;

        }, null, ClassLoader::class);
    }
}
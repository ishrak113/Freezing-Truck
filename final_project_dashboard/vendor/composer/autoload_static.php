<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit595b1874e582b8d7fb4ba044bf1bfe41
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
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit595b1874e582b8d7fb4ba044bf1bfe41::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit595b1874e582b8d7fb4ba044bf1bfe41::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}

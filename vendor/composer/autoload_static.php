<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8de51a2b1b50a0af2169c9b9ce0d8220
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8de51a2b1b50a0af2169c9b9ce0d8220::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8de51a2b1b50a0af2169c9b9ce0d8220::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8de51a2b1b50a0af2169c9b9ce0d8220::$classMap;

        }, null, ClassLoader::class);
    }
}
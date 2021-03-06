<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit62519ca67e51be18ad81f262f4577cc5
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Class',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit62519ca67e51be18ad81f262f4577cc5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit62519ca67e51be18ad81f262f4577cc5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit62519ca67e51be18ad81f262f4577cc5::$classMap;

        }, null, ClassLoader::class);
    }
}

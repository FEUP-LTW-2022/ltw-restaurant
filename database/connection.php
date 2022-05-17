<?php
declare(strict_types=1);

function getDatabaseConnection(): PDO
{

    $db = new PDO('sqlite:database/database.db');
    
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $db;
}

class password{
    private static $algo = '$2a';
    private static $cost = '$10';
    private static $pepper = 'eMI8MHpEByw/M4c9o7sN3d';

    public static function generateSalt($length) {
        try {
            $randomBinaryString = random_bytes($length);
        } catch (Exception $e) {
        }
        $randomEncodedString = str_replace('+', '.', base64_encode($randomBinaryString));
        return substr($randomEncodedString, 0, $length);
    }

    public static function generateHash($password) {
        if (!defined('CRYPT_BLOWFISH'))
            die('The CRYPT_BLOWFISH algorithm is required (PHP 5.3).');
        $password = hash_hmac('sha256', $password, self::$pepper, false);
        return crypt($password, self::$algo . self::$cost . '$' . self::generateSalt(22));
    }

    public static function checkPassword($hash, $password) {
        $salt = substr($hash, 0, 29);
        $password = hash_hmac('sha256', $password, self::$pepper, false);
        $new_hash = crypt($password, $salt);
        return ($hash == $new_hash);
    }
}

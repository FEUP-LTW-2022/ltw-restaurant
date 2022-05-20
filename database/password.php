<?php

class security{
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
        $password = hash_hmac('sha256', $password, self::$pepper);
        return crypt($password, self::$algo . self::$cost . '$' . self::generateSalt(22));
    }

    public static function checkPassword($hash, $password): bool
    {
        $salt = substr($hash, 0, 29);
        $password = hash_hmac('sha256', $password, self::$pepper);
        $new_hash = crypt($password, $salt);
        return ($hash == $new_hash);
    }

    public static function generateToken(){
        try {
            $randomBinaryString = random_bytes(22);
        } catch (Exception $e) {
        }
        $randomEncodedString = str_replace('+', '.', base64_encode($randomBinaryString));
        return substr($randomEncodedString, 0,22);
    }
}

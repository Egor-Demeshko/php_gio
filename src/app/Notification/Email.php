<?php

namespace App\Notification;

class Email
{
    protected static $name = 'email';
    static public function send()
    {
        echo "SEND EMAIL" . '</br>' . PHP_EOL;
        echo self::$name . PHP_EOL;
    }
}

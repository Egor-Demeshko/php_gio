<?php

declare(strict_types=1);

namespace App;

use App\Enum\Status;
use App\Notification\Email;

class Transaction extends Email
{

    private float $amount;
    private string $description;
    private string $status;
    protected static $name = 'TRANSACTION';

    public function __construct(float $amount, string $description)
    {
        $this->amount = $amount;
        $this->description = $description;
        $this->status = Status::PENDING;

        $this->send();
    }

    public static function send()
    {
        echo self::$name;
    }

    public function setStatus($status)
    {
        $this->$status = Status::ALL_STATUSES[$status];
    }

    public function addTax(float $rate): Transaction
    {
        $this->amount += $this->amount * $rate / 100;
        return $this;
    }

    public function applyDiscount(float $rate): Transaction
    {
        $this->amount -= $this->amount * $rate / 100;
        return $this;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function __destruct()
    {
        echo "DESCTRUCT TRANSACTION: {$this->amount} {$this->description}" . '</br>';
    }
}

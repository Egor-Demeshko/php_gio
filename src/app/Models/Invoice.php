<?php

declare(strict_types=1);

namespace App\Models;

class Invoice extends \App\Model
{
    public function __construct()
    {
        parent::__contruct();
    }

    public function create(float $amount, int $userId): int
    {
        $smtp = $this->db->prepare(
            'INSERT INTO invoices (amount, user_id)
            VALUES (:amount, :user_id)'
        );

        $smtp->execute([$amount, $userId]);

        return (int) $this->db->lastInsertId();
    }


    public function find(int $invoiceId): array
    {
        $smtp = $this->db->prepare(
            'SELECT invoices.id, amount, full_name
            FROM invoices
            LEFT JOIN users ON users.id = invoices.user_id
            WHERE invoices.id = :invoiceId'
        );

        $smtp->execute(['invoiceId' => $invoiceId]);

        $invoice = $smtp->fetch();

        return $invoice ? $invoice : [];
    }
}

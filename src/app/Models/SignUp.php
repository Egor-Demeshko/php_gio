<?php

declare(strict_types=1);

namespace App\Models;

class SignUp extends \App\Model
{
    public function __construct(protected User $user, protected Invoice $invoice)
    {
        parent::__contruct();
    }

    public function register(array $userCredentials, array $invCredentials): int
    {

        try {
            $this->db->beginTransaction();

            $userId     = $this->user->create(
                $userCredentials['email'],
                $userCredentials['name']
            );

            $invoiceId  = $this->invoice->create(
                $invCredentials['amount'],
                $userId
            );

            $this->db->commit();
        } catch (\Throwable $e) {
            var_dump($e->getMessage());
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }
        }

        return $invoiceId;
    }
}

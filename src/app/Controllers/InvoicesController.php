<?

declare(strict_types=1);

namespace App\Controllers;

use App\View;

class InvoicesController
{
    public function index(): string
    {
        return View::make('invoices/index')->render();
    }

    public function create(): string
    {
        return View::make('invoices/create')->render();
    }

    public function store(): void
    {
        $amount = $_POST['amount'] ?? 0;
        var_dump($amount);
    }
}

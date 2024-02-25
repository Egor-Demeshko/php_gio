<?

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Models\User;
use App\Models\Invoice;
use App\Models\SignUp;

class HomeController
{

    public function index(): string
    {
        $email = 'john11525@doe.com';
        $name = 'John1155 Doe';
        $amount = 25;

        $userModel      = new User();
        $invoiceModel   = new Invoice();

        $invoiceId = (new SignUp($userModel, $invoiceModel))->register(
            [
                'email' => $email,
                'name' => $name
            ],
            [
                'amount' => $amount
            ]
        );

        return View::make('index', ['invoice' => $invoiceModel->find($invoiceId)])->render();
    }
}

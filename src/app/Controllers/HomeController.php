<?

declare(strict_types=1);

namespace App\Controllers;

use PDO;
use App\View;
use PDOException;

class HomeController
{

    public function index(): string
    {
        try {
            $db = new PDO('mysql:host=db;dbname=my_db;', 'root', 'root');
        } catch (\PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode());
        }

        $email = 'john@doe.com';
        $name = 'John Doe';
        $amount = 25;

        try {

            $db->beginTransaction();

            $newUserSmtp = $db->prepare(
                'INSERT INTO users (email, full_name, is_active, created_at)
                VALUES (?, ?, 1, NOW())'
            );

            $newInvoiceSmtp = $db->prepare(
                'INSERT INTO invoice (amount, user_id)
                VALUES (?, ?)'
            );

            $newUserSmtp->execute([$email, $name]);

            $userId = (int)$db->lastInsertId();

            $newInvoiceSmtp->execute([$amount, $userId]);

            $db->commit();
        } catch (\Throwable $e) {
            if ($db->inTransaction()) {
                $db->rollBack();
            }
        }

        $fetchSmtp = $db->prepare(
            'SELECT invoices.id as invoice_id, amount, user_id, full_name
            FROM invoices
            INNER JOIN users ON users.id = user_id
            WHERE email = ?'
        );

        $fetchSmtp->execute([$email]);

        echo '<pre>';
        var_dump($fetchSmtp->fetch(PDO::FETCH_ASSOC));
        echo '</pre>';

        return View::make('index', ['foo' => 'bar'])->render();
    }
}

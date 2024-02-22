<?


namespace App\Execptions;

use \Exception;

class ViewNotFoundException extends Exception
{
    protected $message = 'View not found';
}

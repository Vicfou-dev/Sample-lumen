<?php
namespace App\Modules\Users\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log as FacadesLog;

class UserNotFoundException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        //FacadesLog::debug('User not found');
    }
}
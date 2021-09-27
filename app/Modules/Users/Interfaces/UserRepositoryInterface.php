<?php
namespace App\Modules\Users\Interfaces;

interface UserRepositoryInterface 
{
    public function getByEmail(string $email);
}
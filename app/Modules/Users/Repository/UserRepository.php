<?php
namespace App\Modules\Users\Repository;

use Illuminate\Database\Eloquent\Collection;

use App\Repository\BaseRepository;
use App\Modules\Users\Interfaces\UserRepositoryInterface;
use App\Modules\Users\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getByEmail(string $email)
    {
        return $this->model->where('email', $email)->first();
    }
}
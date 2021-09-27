<?php
namespace App\Modules\Users\Services;
use App\Modules\Users\Repository\UserRepository;

class DeleteUserService
{
    /**
     * @var User
     */
    private $user;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function delete()
    {
        return $this->userRepository->delete();
    }
}
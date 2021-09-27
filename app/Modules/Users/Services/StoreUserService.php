<?php
namespace App\Modules\Users\Services;
use App\Modules\Users\Repository\UserRepository;

class StoreUserService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function store(array $data)
    {
        $user = $this->userRepository->create($data);

        $user->save();

        return $user;

    }
}
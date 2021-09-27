<?php
namespace App\Modules\Users\Services;
use App\Modules\Users\Repository\UserRepository;

class UpdateUserService
{
    /**
     * @var UserRepository
     */
    private $user;

    public function __construct(UserRepository $userRepository)
    {
        $this->user = $user;
    }

    public function update(array $data)
    {
        $user = $this->userRepository->update($data);

        $user->save();

        return $user;

    }
}
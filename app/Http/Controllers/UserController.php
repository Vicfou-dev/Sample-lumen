<?php
namespace App\Http\Controllers;

use App\Modules\Users\Services\StoreUserService;
use App\Modules\Users\Services\UpdateUserService;
use App\Modules\Users\Services\FindUserService;
use App\Modules\Users\Requests\StoreUserRequest;
use App\Modules\Users\Requests\UpateUserRequest;
use App\Modules\Users\Repository\UserRepository;
use App\Modules\Users\User;
use App\Http\Responses\Response;

class UserController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function show(User $user) : Response 
    {
        return new Response($user);
    }
    
    public function index() : Response 
    {
        $users = $this->userRepository::all();
        return new Response($users);
    }

    /**
     * Create a new user.
     * 
     * @param StoreUserRequest Custom request to handle user creation
     * @param StoreUserService Component who encapsuled user creation logic
     * @return Response
     */
    public function store(StoreUserRequest $request, StoreUserService $service) : Response
    {
        $data = $request->validated();

        //$user = $service->store($data);

        return new Response($user);
    }

    /**
     * Update an existing user.
     * 
     * @param StoreUserRequest Custom request to handle user modification
     * @param StoreUserService Component who encapsuled user modification logic
     * @return Response
     */
    public function update(UpdateUserRequest $request, UpdateUserService $service) : Response
    {
        $data = $request->validated();

        //$user = $service->update($data);

        return new Response($user);
    }

    /**
     * Delete an existing user.
     * 
     * @param DeleteUserService Component who encapsuled user delation logic
     * @return Response
     */
    public function delete(DeleteUserService $service) : Response
    {
        $result = $service->delete();

        return new Response('User deleted.', 201);
    }
}
<?php
namespace App\Modules\Users\Providers;

use mmghv\LumenRouteBinding\RouteBindingServiceProvider as BaseServiceProvider;
use App\Modules\Users\User;
use App\Modules\Users\Services\UpdateUserService;
use App\Modules\Users\Services\DeleteUserService;
use App\Modules\Users\Services\FindUserService;
use App\Modules\Users\Repository\UserRepository;
use App\Modules\Users\Exceptions\UserNotFoundException;
use Exception;

class UserServiceProvider extends BaseServiceProvider
{
    /**
     * Boot the service provider
     */
    public function boot()
    {
        // The binder instance
        $binder = $this->binder;

        $app = $this->app;

        $app->bind(UserRepository::class, function($app) {
            return new UserRepository(new User);
        });
        
        $binder->bind('user', function($value) use ($app) 
        {
            $user = null;

            $user = $app->make(UserRepository::class)->get($value);

            if($user == null) 
            {
                throw new UserNotFoundException;
            }

            $repository = new UserRepository($user);

            $app->bind(UpdateUserService::class, function() use ($repository)
            {
                return new UpdateUserService($repository);
            });

            $app->bind(DeleteUserService::class, function() use ($repository)
            {
                return new DeleteUserService($repository);
            });

            return $user;
        });

        //$binder->bind('user', 'User@findForRoute');

        // Using a closure
        
        /*
        $binder->bind('user', function($value) {
            return User::where('id', $value)->firstOrFail();

            throw new \NotFoundHttpException;
        });*/

        /*
        $binder->bind('user', 'User', function($e) {
            // We can return a default value if the model not found :
            return new User();
        
            // Or we can throw another exception for example :
            throw new \NotFoundHttpException;
        }); */
        // Here we define our bindings
    }
}
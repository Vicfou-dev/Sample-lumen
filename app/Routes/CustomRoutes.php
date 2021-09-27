<?php

namespace App\Routes;

class CustomRoutes
{
  	protected $app;
      
    public function __construct($router = '')
    {
      $this->app = $router;
    }

    private function parseUri(string $uri)
    {
      	$last_char = substr($uri, -1, 1);
		return $last_char == 's' ? substr($uri, 0, -1) : $uri;
    }
      
    public function apiResource(string $uri, string $controller)
    {
		$param = $this->parseUri($uri);

      	$this->app->get($uri , $controller.'@index');
      	$this->app->post($uri, $controller.'@store');
      	$this->app->get($uri ."/{{$param}}", $controller.'@show');
      	$this->app->put($uri ."/{{$param}}", $controller.'@update');
      	$this->app->delete($uri ."/{{$param}}", $controller.'@destroy');
    }


    public function authResource(string $uri, string $controller)
    {
		$uri = $this->parseUri($uri);

      	$this->app->post($uri . '/register', $controller.'@register');
      	$this->app->post($uri . '/login', $controller.'@login');
     	$this->app->post($uri . '/logout', $controller.'@logout');
     	$this->app->post($uri . '/refresh', $controller.'@refresh');
      	$this->app->post($uri . '/me', $controller.'@me');
    }
}
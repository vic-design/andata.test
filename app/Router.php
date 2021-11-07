<?php


namespace App;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

class Router
{
    public function __invoke(RouteCollection $routes)
    {
        //get contents and set params from request
        $context = new RequestContext();
        $context->fromRequest(Request::createFromGlobals());

        //matching
        $matcher = new UrlMatcher($routes, $context);
        try {
            $matcher = $matcher->match($_SERVER['REQUEST_URI']);

            // set string params as int
            array_walk($matcher, function (&$param) {
                if (is_numeric($param)) {
                    $param = (int)$param;
                }
            });

            $className = '\\App\\Controllers\\' . $matcher['controller'];
            $classInstance = new $className();

            // merge params with routes to show
            $params = array_merge(array_slice($matcher, 2, -1), ['routes' => $routes]);

            // run needed method
            call_user_func_array([$classInstance, $matcher['method']], $params);

        } catch (MethodNotAllowedException $e) {
            echo 'Route method is not allowed.';
        } catch (ResourceNotFoundException $e) {
            echo 'Route does`t exists.';
        }
    }
}

$router = new Router();
$router($routes);
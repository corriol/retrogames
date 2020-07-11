<?php
declare(strict_types=1);

namespace App\Core;

use App\Exception\AuthorizationException;
use App\Exception\NotFoundException;


/**
 * Class Router
 */
class Router
{
    /**
     * @var array
     */
    private $routes = [];

    /**
     * @param $route
     * @param $class
     * @param $method
     * @param array $params
     * @param string $role
     */
    public function addPost($route, $class, $method, array $params = [], string $role = 'ROLE_ANONYMOUS')
    {
        $this->routes["POST"][$route] = ["class" => $class,
            "method" => $method,
            "params" => $params,
            "role" => $role
        ];
    }

    /**
     * @param $route
     * @param $class
     * @param $method
     * @param array $params
     * @param string $role
     */
    public function addGet($route, $class, $method, array $params = [], string $role = 'ROLE_ANONYMOUS')
    {
        $this->routes["GET"][$route] = ["class" => $class,
            "method" => $method,
            "params" => $params,
            "role" => $role
        ];
    }


    /**
     * @param Request $request
     * @return string
     * @throws AuthorizationException
     * @throws NotFoundException
     */
    public function route(Request $request): string
    {
        // $path serà la ruta sol·licitada per l'usuari
        $path = $request->getPath();
        $requestMethod = $request->getRequestMethod();

        // patró de la ruta serà -> article/show/:id => [ controller, method, params]
        //                                        expressió regular \d+
        // ruta sol·licitada -> article/show/17

        foreach ($this->routes[$requestMethod] as $route => $data) {
            $regexRoute = $this->getRegexRoute($route, $data);
            if (preg_match("@^$regexRoute$@", $path)) {
                $role = $data['role'];
                if (!Security::isUserGranted($role))
                    throw new AuthorizationException('No tens els permisos per a accedir');

                $class = "App\\Controller\\" . $data["class"];
                $method = $data["method"];
                $params = $this->extractParams($route, $path);
                $instance = new $class();
                return call_user_func_array([$instance, $method], $params);
            }
        }
        throw new NotFoundException("No s'ha trobat la ruta indicada ($requestMethod, $path)");
    }

    /**
     * @param $route
     * @param $data
     * @return string
     */
    private function getRegexRoute($route, $data): string
    {
        if (count($data["params"]) > 0) {
            foreach ($data["params"] as $name => $type) {
                $route = str_replace(":$name", "\d+", $route);
            }
        }

        return $route;
    }

    /**
     * @param string $route
     * @param string $path
     * @return array
     */
    private function extractParams(string $route, string $path)
    {
        $params = [];

        $pathParts = explode("/", $path);
        $routeParts = explode("/", $route);

        foreach ($routeParts as $key => $routePart) {
            if (strpos($routePart, ':') === 0) {
                $name = substr($routePart, 1);
                $params[$name] = (int)$pathParts[$key];
            }
        }

        return $params;
    }

    /**
     * @param string $path
     */
    public function redirect(string $path)
    {
        header('Location: ' . $path);
        exit();
    }

    /**
     * @param string $route
     * @param string $class
     * @param string $method
     * @param array $params
     * @param string $role
     */
    public function addPut(string $route, string $class, string $method, array $params = [], string $role = 'ROLE_ANONYMOUS')
    {
        $this->routes["PUT"][$route] = ["class" => $class,
            "method" => $method,
            "params" => $params,
            "role" => $role
        ];
    }

    /**
     * @param string $route
     * @param string $class
     * @param string $method
     * @param array $params
     * @param string $role
     */
    public function addDelete(string $route, string $class, string $method, array $params = [], string $role = 'ROLE_ANONYMOUS')
    {
        $this->routes["DELETE"][$route] = ["class" => $class,
            "method" => $method,
            "params" => $params,
            "role" => $role
        ];
    }
}

<?php


namespace App\Core;


use App\Exception\NotFoundException;

/**
 * Class Security
 * @package App\Core
 */
class Security
{

    /**
     * @param string $minRole
     * @return bool
     * @throws NotFoundException
     * @throws NotFoundException
     */
    public static function isUserGranted(string $minRole): bool
    {
        if ($minRole === 'ROLE_ANONYMOUS')
            return true;
        $user = App::get('user');
        if ($user === null) {
            App::get('router')->redirect('/login');
        } else
            $userRole = $user->getRole();

        $roles = App::get("config")["security"]["roles"];
        $userRoleValue = $roles[$userRole]; //ROLE_USER => 2
        $minRoleValue = $roles[$minRole]; //ROLE_ADMIN => 3

        return ($userRoleValue >= $minRoleValue);
    }

    public static function encode(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function checkPassword(string $password, string $userPassword): bool
    {
        return password_verify($password, $userPassword);
    }

    public static function checkPasswordPolicy(string $password): bool
    {
        if (strlen($password) < 4)
            return false;
        return true;
    }
}
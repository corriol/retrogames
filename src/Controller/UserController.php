<?php

namespace App\Controller;

use App\Core\AppException;
use App\Core\Controller;
use App\Core\App;
use App\Core\Security;
use App\Entity\User;
use App\Exception\NotFoundException;
use App\Model\UserModel;


/**
 * Class DefaultController
 * @package App\Controller
 */
class UserController extends Controller
{
    /**
     * @return string
     * @throws AppException
     */
    public function index(): string
    {
        $userModel = App::getModel(UserModel::class);
        $users = $userModel->findAll();
        return $this->getResponse()->renderView('user/index', 'default', compact('users'));
    }

    /**
     * @return string
     * @throws AppException
     */
    public function create(): string
    {
        $user = new User();
        return $this->getResponse()->renderView('user/create', 'default', compact('user'));
    }

    /**
     * @return string
     * @throws AppException
     * @throws NotFoundException
     */
    public function processCreate(): string
    {
        $errors = [];
        $userModel = App::getModel(UserModel::class);
        $user = new User();

        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $role = filter_input(INPUT_POST, 'role');

        // Obtenim el FlashMessage
        $flash = App::get('flash');
        // validació bàsica
        if (strlen($username) < 4) {
            $errors["username"] = "El nom d'usuari és massa curt o inexistent";
        }

        // comprovem que el password compleix la política de passwords
        if (!Security::checkPasswordPolicy($password)) {
            $errors["password"] = "La contrasenya no compleix la política de constrasenyes";
        }
        // comprovem que el rol és vàlid.
        if (!in_array($role, ["ROLE_USER", "ROLE_ADMIN"])) {
            $errors["role"] = "El rol és invàlid";
        }

        if (count($errors) === 0) {
            $user->setUsername($username);
            $user->setRole($role);
            $user->setPassword(Security::encode($password));
            $userModel->save($user);
            $flash->success("L'usuari <strong>". $user->getUsername() ."</strong> s'ha creat correctament", '/admin/users');

        }
        else {
            foreach ($errors as $field=>$error) {
                $flash->error("$field: $error");
            }

            return $this->getResponse()->renderView('user/create', 'default',
                compact('errors','user'));

        }
        return "";
    }

    /**
     * Mostra el formulari d'edició
     * @param int $id
     * @return string
     * @throws AppException
     *
     */
    public function update(int $id): string
    {
        $userModel = App::getModel(UserModel::class);
        $user = $userModel->find($id);
        return $this->getResponse()->renderView('user/update', 'default', compact('user'));
    }

    /**
     * Processa el formulari d'edició
     * @param int $id
     * @return string
     * @throws AppException
     * @throws NotFoundException
     */
    public function processUpdate(int $id): string
    {
        $errors = [];
        $userModel = App::getModel(UserModel::class);
        $user = $userModel->find($id);

        $username = filter_input(INPUT_POST, 'username');
        $role = filter_input(INPUT_POST, 'role');

        // Obtenim el FlashMessage
        $flash = App::get('flash');
        // validació bàsica
        if (strlen($username) < 4) {
            $errors["username"] = "El nom d'usuari és massa curt o inexistent";
        }

        // comprovem que el rol és vàlid.
        if (!in_array($role, ["ROLE_USER", "ROLE_ADMIN"])) {
            $errors["role"] = "El rol és invàlid";
        }

        if (count($errors) === 0) {
            $user->setUsername($username);
            $user->setRole($role);
            $userModel->update($user);
            $flash->success("L'usuari <strong>". $user->getUsername() ."</strong> s'ha actualitzat correctament", '/admin/users');

        }
        else {
            foreach ($errors as $field=>$error) {
                $flash->error("$field: $error");
            }

            return $this->getResponse()->renderView('user/update', 'default', compact('user'));
        }

        return "";
    }


}
<?php

namespace App\Controllers;


use Ramsey\Uuid\Uuid;
use App\Infrastructure\Database\DatabaseConnection;
use App\School\Entities\User;
use App\School\Services\UserService;
use App\School\Repositories\IUserRepository;

class addUserController
{

    public function storeUser()
    {
        $username = $_POST['username'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $dni = $_POST['dni'];
        $type = $_POST['type'];


        if (empty($username) || empty($lastname) || empty($email) || empty($pass) || empty($dni) || empty($type)) {
            echo "Error: Todos los campos son obligatorios."; // TODO Mejorar manejo de errores y vistas de error
            return;
        }

        function uuid()
        {
            return Uuid::uuid4()->toString();
        }


        $user = new User(
            $uuid = uuid(),
            $username,
            $lastname,
            $email,
            $pass,
            $dni,
            $type
        );


        $db = DatabaseConnection::getConnection(); // Pillo DB
        $iuserRepository = new IUserRepository($db); // Instancio el repo(a través de la interfaz) CON la conexion
        $userService = new UserService($iuserRepository); //Instanciar el servicio CON el repo

        // Guardo el usuario usando el servicio, y me quedo con el lastinsert
        try {
            $lastInsertId = $userService->save($user);
            echo "Usuario agregado correctamente."; // TODO Mejorar esta parte, esto deberia ir en vista, o a una pagina
        } catch (\Exception $e) {
            echo "Error al guardar el usuario: " . $e->getMessage(); // TODO Lo mismo de arriba
        }
    }
}

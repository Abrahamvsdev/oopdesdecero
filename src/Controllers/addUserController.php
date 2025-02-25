<?php

namespace App\Controllers;



use Ramsey\Uuid\Uuid;
use App\School\Entities\User;
use App\School\Services\UserService;
use App\School\Repositories\ITeacherRepository;
use App\School\Repositories\IUserRepository;
use App\School\Repositories\IStudentRepository;
use App\Infrastructure\Database\DatabaseConnection;
use App\Infrastructure\Persistence\TeacherRepository;
use App\Infrastructure\Persistence\UserRepository;
use App\Infrastructure\Persistence\StudentRepository;

class addUserController
{

    public function storeUser()
    {   
        // 1. Recoger datos del formulario (POST)
        $username = $_POST['username'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $dni = $_POST['dni'];
        $type = $_POST['type'];
        $enrollmentYear = $_POST['enrollment_year']?? null;

        // 2. "Validacion"
        if (empty($username) || empty($lastname) || empty($email) || empty($pass) || empty($type)) {
            echo "Error: Todos los campos son obligatorios."; // TODO Mejorar manejo de errores y vistas de error
            return;
        }

        // 3. Crear UUID
        function uuid()
        {
            return Uuid::uuid4()->toString();
        }

        // 4. Crear Entidad User
        $user = new User(
            $uuid = uuid(),
            $username,
            $lastname,
            $email,
            $pass,
            //$dni,
            $type
        );

        // 5. Instanciar Servicios y Repositorio (Obtener conexión y repositorio correctamente (NO Interface))
        $db = DatabaseConnection::getConnection(); // Pillo DB
        $userRepository = new UserRepository($db); // Instancio el repo CONCRETO UserRepository
        $teacherRepository = new TeacherRepository($db); 
        $studentRepository = new StudentRepository($db);
        $userService = new UserService($userRepository,$teacherRepository,$studentRepository); // El orden importa, si estan en el orden incorrecto no es que esté mal, si no desordenados

        //6. Guardo el usuario usando el servicio, y me quedo con el lastinsert
        try {
            $lastInsertId = $userService->save($user);
            echo "Usuario agregado correctamente."; // TODO Mejorar esta parte, esto deberia ir en vista, o a una pagina
        } catch (\Exception $e) {
            echo "Error al guardar el usuario: " . $e->getMessage(); // TODO Lo mismo de arriba
        }
    }
}

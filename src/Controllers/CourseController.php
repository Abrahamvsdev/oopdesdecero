<?php

namespace App\Controllers;

use App\School\Entities\Course;
use App\School\Services\CourseService;
use App\Infrastructure\Persistence\CourseRepository; 
use App\Infrastructure\Database\DatabaseConnection;
use App\School\Entities\Department;

class CourseController{
    private CourseService $courseService;

    // 1. Recoger datos del form
    function storeCourse()
    {
        $courseName = $_POST['name'];
    

    // 2. Validación
    if(empty($courseName))
    {
        echo "Error: El nombre del curso es obligatorio.";
        return;
    }

    // 3. Crea la entidad Course
    $course = new Course($courseName);

    // 4. Instanciar servicios y repositorios (Obtener conexión y repositorio correctamente (NO Interface)
    $db = DatabaseConnection::getConnection();
    $courseRepository = new CourseRepository($db);
    $courseService = new CourseService($courseRepository);

    //5. Guardo el curso usando el servicio
        try{

            $courseId = $courseService->save($course);
            echo "Curso agregado correctamente " . $courseId; // TODO Si consigo poner la vista de exito con el boton de añadir más, ponerla tambien aquí
        }catch (\Exception $e) {
            echo "Error al guardar el curso: " . $e->getMessage(); // TODO Lo mismo de arriba
        }
    }
        function addCourseForm()
        {
            echo view('/addCourse'); // Formulario para añadir curso
        }
    }
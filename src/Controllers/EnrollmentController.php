<?php

namespace App\Controllers;


use App\School\Entities\Enrollment;
use App\School\Services\EnrollmentService;
use App\Infrastructure\Database\DatabaseConnection;
use App\Infrastructure\Persistence\UserRepository;
use App\Infrastructure\Persistence\StudentRepository;
use App\Infrastructure\Persistence\TeacherRepository;
use App\Infrastructure\Persistence\EnrollmentRepository;
use App\School\Services\CourseService; // Para obtener la lista de cursos
use App\School\Services\UserService; // Para obtener la lista de estudiantes
use App\Infrastructure\Persistence\CourseRepository; // Preguntar si es curse o subject

class EnrollmentController{
    protected EnrollmentService $enrollmentService;
    protected UserService $userService; // Yo no tengo servicios de student ni teacher
    protected CourseService $courseService;
    

    function enrollStudent(){ // Como si fuera el store
        // 1. Recoger los datos del form
        $studentId = $_POST['student_id'] ?? null;
        $courseId = $_POST['course_id'] ?? null;

        // 2. Validación
        if(!$studentId || !$courseId){
            echo "Error: Por favor, selecciona un estudiante y un curso."; // TODO: Mejor manejo de errores
            return;
        }

        // 3. Crear la entidad Enrollment
        $enrollment = new Enrollment($studentId,$courseId,$id =null,$enrollmentDate=null);

        //4. Instanciamos servicios de repositorios(Obtener conexión y repositorio correctamente (NO Interface)
        $db = DatabaseConnection::getConnection();
        $enrollmentRepository = new EnrollmentRepository($db);
        $studentRepository = new StudentRepository($db);
        $courseRepository = new CourseRepository($db);
        $enrollmentService = new EnrollmentService($studentRepository, $enrollmentRepository, $courseRepository);
        $userService = new UserService(new UserRepository($db), new TeacherRepository($db), new StudentRepository($db));
        $courseService = new CourseService(new CourseRepository($db));
        
        // 5. Guardo enrollment usando los servicio
        try{
            $enrollmentId = $this->enrollmentService->enrollStudentInCourse($studentId,$courseId);
            echo "Estudiante inscrito en el curso correctamente. Enrollment ID: " . $enrollmentId; // TODO: Vista de éxito
        }catch(\Exception $e){
            echo "Error al inscribir al estudiante: " . $e->getMessage(); // TODO: Mejor manejo de errores
        }
    }


    function enrollStudentForm(){
        $students = $this->userService->findAllStudents(); // TODO: Implementar findAllStudents en UserService o StudentService
        $courses = $this->courseService->findAll(); // Obtener todos los cursos

        $data = [
            'students' => $students,
            'courses' => $courses,
        ];
        echo view('/enrollmentForm');
    }











    
        
    

    
}
<?php

define('VIEWS',__DIR__.'/src/views');
require __DIR__.'/vendor/autoload.php';
$dotenv=Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

    use App\Controllers\CourseController;
    use App\Controllers\addUserController;
    use App\Controllers\HomeController;
    use App\Controllers\DepartmentController;
    use App\Infrastructure\Database\DatabaseConnection;
    use App\Infrastructure\Routing\Router;
    
    use App\Infrastructure\Persistence\EnrollmentRepository;
    use App\Controllers\EnrollmentController;
    use App\School\Services\Services;
    

    //carga de servicios siguiendo dependencias
    $db=DatabaseConnection::getConnection();
    $services=new Services();
    $services->addServices('db',fn()=>$db);
    $db=$services->getService('db');
    $services->addServices('enrollmentRepository',fn()=>new EnrollmentRepository($db));

    $router=new Router();
    $router->addRoute('GET','/',[new HomeController(),'index'])
            ->addRoute('GET','/teachers',[new HomeController(),'teachers'])
            ->addRoute('GET','/addUser',[new HomeController(),'addUser'])
            ->addRoute('POST','/addUser',[new addUserController(),'storeUser']) // 'storeUser' será el nombre del método
            ->addRoute('GET','/addUserSuccess',[new HomeController(),'index'])
            ->addRoute('GET','/addDepartment',[new DepartmentController(),'addDepartmentForm']) // Añadir
            ->addRoute('POST','/storeDepartment',[new DepartmentController(),'storeDepartment']) // Guardar
            ->addRoute('GET','/addCourse',[new CourseController(),'addCourseForm']) // Formulario para añadir curso
            ->addRoute('POST','/storeCourse',[new CourseController(),'storeCourse']) // Guardar courso
            ->addRoute('GET','/enrollment',[new EnrollmentController(),'showEnrollmentForm']) // Formulario de enrollment
            ->addRoute('POST','/enrollment',[new EnrollmentController(),'enrollStudent']);

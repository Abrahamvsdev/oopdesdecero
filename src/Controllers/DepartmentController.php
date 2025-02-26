<?php

namespace App\Controllers;

use App\School\Entities\Department;
use App\School\Services\DepartmentService;
use App\Infrastructure\Persistence\DepartmentRepository; 
use App\Infrastructure\Database\DatabaseConnection; 

class DepartmentController{
    private DepartmentService $departmentService;

    // 1. Recoger datos del form
    function storeDepartment(){ 
        $departmentName = $_POST['department_name'] ?? ''; 

        
        
        // 2. Validación
        if(empty($departmentName)){
            echo "Error: El nombre del departamento es obligatorio."; // TODO Mejorar manejo de errore
            return; // Aquí deberia llevarme a una vista como en el otro lado imagino con su header("Location: 'tal'"), preguntar
        }
        
        // 3. Crear la entidad Department
        $department = new Department($departmentName);
        
        //4. Instanciar servicios y repo(Obtener conexión y repositorio correctamente (NO Interface)
        $db = DatabaseConnection::getConnection();
        $departmentRepository = new DepartmentRepository($db);
        $departmentService = new DepartmentService($departmentRepository);
        
        //5. Guardo el dept usando el servicio
        try{

            $departmentService->save($department); // Guardar el departamento usando el servicio
            echo "Departamento agregado correctamente"; // TODO Si consigo poner la vista de exito con el boton de añadir más, ponerla tambien aquí
        }catch (\Exception $e) {
            echo "Error al guardar el usuario: " . $e->getMessage(); // TODO Lo mismo de arriba
        }

    } 
    
    function addDepartmentForm()
    {
        echo view('/addDepartment'); 
    }
    
}

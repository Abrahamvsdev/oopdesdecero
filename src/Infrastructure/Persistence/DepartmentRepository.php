<?php

namespace App\Infrastructure\Persistence;

use App\School\Entities\Department;
use App\School\Repositories\IDepartmentRepository;
use App\Infrastructure\Persistence\ITeacherRepository;


class DepartmentRepository implements IDepartmentRepository{
    private \PDO $db;
    
    function __construct(\PDO $db){
        $this->db=$db;
    }
    

    public function save(Department $department)
    {
        $stmt = $this->db->prepare("INSERT INTO departments(name) VALUES (:name)");
        $stmt->execute([
            'name'=> $department->getName() 
        ]);
    }

    public function findById($id){
        $stmt = $this->db->prepare("SELECT * FROM departments WHERE id=:id");
        $stmt->execute(['id'=>$id]);
        return $stmt->fetchObject(Department::class);
    }

    
}
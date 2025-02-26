<?php

namespace App\School\Services;

use App\School\Entities\Department;
use App\School\Repositories\IDepartmentRepository;

class DepartmentService{
    protected IDepartmentRepository $departmentRepository;

    public function __construct(IDepartmentRepository $departmentRepository){
        $this->departmentRepository = $departmentRepository;
    }

    public function save(Department $department){
        return $this->departmentRepository->save($department);
         // TODO 
    }

    public function findById($id){
        return $this->departmentRepository->findById($id);
    }

    public function findAll(){
        return $this->departmentRepository->findAll();
    }
}
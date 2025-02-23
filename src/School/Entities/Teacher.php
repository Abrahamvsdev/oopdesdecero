<?php

    namespace App\School\Entities;

    use App\School\Trait\Timestampable;
    use App\School\Entities\User;
    use App\School\Entities\Department;


    class Teacher extends User{
        use Timestampable;

        
        protected $department;

        function __construct($uuid = null,$username,$lastname,$email,$password,$dni,$type){
            parent::__construct($uuid, $username, $lastname, $email, $password, $dni, $type);
            $this->updateTimestamps();// Preguntar
        }

        public function addToDepartment(Department $dept){
            $this->department=$dept;
        }
    }
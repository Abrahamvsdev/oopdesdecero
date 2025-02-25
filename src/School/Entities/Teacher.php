<?php

    namespace App\School\Entities;

    use App\School\Trait\Timestampable;
    use App\School\Entities\User;
    use App\School\Entities\Department;


    class Teacher extends User{
        use Timestampable;
        protected $user_id = 0;
        
        protected $department_id = 0;

        function __construct($user_id,$uuid= "",$username,$lastname,$email,$password,$type,$dni,$department_id){
            parent::__construct($uuid, $username, $lastname, $email, $password,$dni, $type);
            $this->updateTimestamps();// Preguntar
            $this->department_id = $department_id;
            $this->user_id = $user_id;
        }

        public function getUserId()
        {
            return $this->user_id;
        }

        public function addToDepartment(Department $department){
            $this->department_id=$department;
        }
    }
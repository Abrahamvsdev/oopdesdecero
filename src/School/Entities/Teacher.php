<?php

    namespace App\School\Entities;

    use App\School\Trait\Timestampable;
    use App\School\Entities\User;
    use App\School\Entities\Department;


    class Teacher extends User{
        use Timestampable;
        protected $user_id = 0;
        
        protected $department;

        function __construct($user_id,$uuid= "",$username,$lastname,$email,$password,$type,$department){
            parent::__construct($uuid, $username, $lastname, $email, $password, $type);
            $this->updateTimestamps();// Preguntar
            $this->department = $department;
            $this->user_id = $user_id;
        }

        public function getUserId()
        {
            return $this->user_id;
        }

        public function addToDepartment(Department $dept){
            $this->department=$dept;
        }
    }
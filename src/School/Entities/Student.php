<?php

    namespace App\School\Entities;

    use App\School\Entities\User;

    use App\School\Trait\Timestampable;

    class Student extends User {
        use Timestampable;

        protected $enrollments=[];
        private $enrollmentYear = 0;
        private $user_id = 0; // Esto se usa para "store" el user_id

        function __construct($user_id,$uuid, $username, $lastname, $email, $password, $dni, $type, $enrollmentYear=null){
            parent::__construct($uuid, $username, $lastname, $email, $password, $dni, $type);
            $this->enrollmentYear = $enrollmentYear; 
            $this->user_id = $user_id;
            $this->updateTimestamps();
        }

        public function getUserId() // Si no añado este metodo, no puedo pillar el id de user para estudent
        {
            return $this->user_id;
        }


        public function getEnrollmentYear()
    {
        return $this->enrollmentYear;
    }

    }
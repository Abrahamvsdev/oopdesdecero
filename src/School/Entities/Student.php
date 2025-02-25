<?php

    namespace App\School\Entities;

    use App\School\Entities\User;

    use App\School\Trait\Timestampable;

    class Student extends User {
        use Timestampable;

        protected $enrollments=[];
        private $enrollmentYear;
        private $userId; // Esto se usa para "store" el user_id (Uuid)

        function __construct($uuid, $username, $lastname, $email, $password, $dni, $type, $enrollmentYear=null){
            parent::__construct($uuid, $username, $lastname, $email, $password, $type);
            $this->enrollmentYear= $enrollmentYear; 
            $this->updateTimestamps();
        }

        public function getUserId() // Si no añado este metodo, no puedo pillar el Uuid de user para estudent
        {
            return $this->userId;
        }


        public function getEnrollmentYear()
    {
        return $this->enrollmentYear;
    }

    }
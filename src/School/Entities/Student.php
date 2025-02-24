<?php

    namespace App\School\Entities;

    use App\School\Entities\User;

    use App\School\Trait\Timestampable;

    class Student extends User {
        use Timestampable;

        protected $enrollments=[];
        private $enrollmentYear = null;

        function __construct($uuid = null, $username, $lastname, $email, $password, $dni, $type, $enrollmentYear = null){
            parent::__construct($uuid, $username, $lastname, $email, $password, $dni, $type);
            $this->enrollmentYear= $enrollmentYear;  // TODO Implementar, de momento null
            $this->updateTimestamps();
        }


        public function getEnrollmentYear()
    {
        return $this->enrollmentYear;
    }

    }
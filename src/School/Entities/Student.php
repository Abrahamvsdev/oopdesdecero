<?php

    namespace App\School\Entities;

    use App\School\Entities\User;

    use App\School\Trait\Timestampable;

    class Student extends User {
        use Timestampable;

        protected $enrollments=[];

        function __construct($uuid = null, $username, $lastname, $email, $password, $dni, $type){
            parent::__construct($uuid, $username, $lastname, $email, $password, $dni, $type);
            $this->updateTimestamps();
        }

    }
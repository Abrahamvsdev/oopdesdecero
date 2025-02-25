<?php

    namespace App\School\Entities;
    use Ramsey\Uuid\Uuid;

    class User{
    

        private string $email;
        private string $username;
        private string $lastname;
        private string $password;
        private string $dni="";
        private string $uuid;
        private string $type;
        private ?\DateTime $createdAt=null;
        private ?\DateTime $updatedAt=null;


        function __construct($uuid = null,$username, $lastname,$email,$password,$dni,$type){
            $this->uuid = $uuid ?? Uuid::uuid4()->toString();
            $this->email=$email;
            $this->username=$username;
            $this->lastname=$lastname;
            $this->password=$password;
            $this->dni=$dni;
            $this->type=$type;
        }
        
        public function getUuid(){
            return $this->uuid;
        }

        public function getUsername()
        {
                return $this->username;
        }

        public function getLastName(){
            return $this->lastname;
        }
        
        function getEmail(){
            return $this->email;
        }
        
        public function getPassword()
        {
                return $this->password;
        }
        public function getDni()
        {
                return $this->dni;
        }

        public function getType(){
            return $this->type;
        }

        
        function setUserName(string $username){
            $this->username=$username;
            return $this;
        }
        
        function setLastName(string $lastName){
            $this->lastname=$lastName;
            return $this;
        }
        
        function setEmail(string $email){
            $this->email=$email;
            return $this;
        }

        function setPassword(string $password){
            $this->password=$password;
            return $this;
        }

        function setDni(string $dni){
            $this->dni=$dni;
            return $this;
        }

        function setType(string $type){
            $this->type=$type;
            return $this;
        }

    
    }
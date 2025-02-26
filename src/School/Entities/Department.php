<?php 

    namespace App\School\Entities;

    class Department{
        protected $name;
        protected $id = null;
        

        function __construct($name, $id = null)
        {
            $this->name = $name;
            $this->id = $id;
            
        }

        public function getId() {
            return $this->id;
        }

        

        public function getName(){
            $this->name;
        }

        public function setName(string $name){
            $this->name= $name;
            return $this;
        }
    }
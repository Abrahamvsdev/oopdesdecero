<?php 

    namespace App\School\Entities;

    class Department{
        protected $name;
        
        

        function __construct($name)
        {
            $this->name = $name;
            
        }

        // TODO Voy por aquí, estoy obteniendo la lógica de cómo pillar el ID de la DB, lastinsertid pinta bien

        public function getName(){
            $this->name;
        }

        public function setName(string $name){
            $this->name= $name;
            return $this;
        }
    }
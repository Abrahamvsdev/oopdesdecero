<?php

    namespace App\School\Trait;


    trait Timestampable{

        public function updateTimestamps(){
            $now= new \DateTime();
            $this->updatedAt=$now;
            if(isset($this->createdAt) && !$this->createdAt){
                $this->createdAt=$now;
            }
        }
    }
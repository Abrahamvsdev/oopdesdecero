<?php 

    namespace App\School\Entities;
    use App\School\Entities\Subject;

    class Course{

        protected $id = null;
        protected $name;
        protected $subjects = [];
        protected $degreeId = null;

        function __construct($name, $degreeId = null, $id = null)
        {
            $this->name=$name;
            $this->degreeId = $degreeId;
            $this->id = $id;
        }

        public function getId() 
        {
            return $this->id;
        }

        public function getName()
        {
            return $this->name;
        }
    
        public function setName($name)
        {
            $this->name = $name;
        }

        public function getDegreeId()
        {
            return $this->degreeId;
        }
    
        public function setDegreeId($degreeId){
            $this->degreeId = $degreeId;
        }

        function addSubject(Subject $subject)
        {
            $this->subjects[]=$subject;
            return $this;
        }

    }
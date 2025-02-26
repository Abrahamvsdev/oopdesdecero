<?php
        namespace App\School\Entities;



        class Enrollment{
        private $id = null;
        private Student $student;
        protected $studentId;
        protected Course $course;
        protected $subjectId = null;
        protected  $enrollmentDate;
        
        public function __construct($studentId,$subjectId = null, $id = null, $enrollmentDate = null) {
                $this->studentId = $studentId;
                $this->subjectId = $subjectId;
                $this->id = $id;
                $this->enrollmentDate = $enrollmentDate ?? 0;
                
        }
        
        public function getStudent()
        {
                return $this->student;
        }

        public function getStudentId()
        {
                return $this->studentId;
        }

        public function getId()
        {
                return $this->id;
        }

        public function getSubjectId()
        {
                return $this->subjectId;
        }
        
        public function getEnrollmentDate()
        {
                return $this->enrollmentDate;
        }
}
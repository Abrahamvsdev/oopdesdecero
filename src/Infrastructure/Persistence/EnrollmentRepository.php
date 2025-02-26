<?php

    namespace App\Infrastructure\Persistence;


    use App\School\Entities\Enrollment;
    use App\School\Repositories\IEnrollmentRepository;

    class EnrollmentRepository implements IEnrollmentRepository{
        private \PDO $db;
        
        function __construct(\PDO $db){
            $this->db=$db;
        }

        function save(Enrollment $enrollment){
            $stmt=$this->db->prepare("INSERT INTO enrollments(student_id, subject_id, enrollment_date) VALUES(:student_id, :subject_id, :enrollment_date)");
            $stmt->execute([
                'student_id'=>$enrollment->getStudentId(),
                'subject_id'=>$enrollment->getSubjectId(),
                'enrollment_date'=>$enrollment->getEnrollmentDate()
            ]);
            return $this->db->lastInsertId();
        }
        
        function findById($id){
            $stmt=$this->db->prepare("SELECT * FROM enrollments WHERE id=:id");
            $stmt->execute(['id'=>$id]);
            return $stmt->fetchObject(Enrollment::class);
            
        }
    }
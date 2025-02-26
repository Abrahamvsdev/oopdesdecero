<?php

namespace App\Infrastructure\Persistence;

use App\School\Entities\Student;
use App\School\Repositories\IStudentRepository;

class StudentRepository implements IStudentRepository {
    private \PDO $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    public function save(Student $student)
    {
        $stmt = $this->db->prepare("INSERT INTO students(user_id, dni, enrollment_year) VALUES (:user_id, :dni, :enrollment_year)");
        $stmt->execute([
        'user_id' => $student->getUserId(),
        'dni' => $student->getDni(),
        'enrollment_year' => $student->getEnrollmentYear()?? null 
        ]);
    }

    public function findById($id):?Student{
        $stmt=$this->db->prepare("SELECT * FROM students WHERE id=:id");
        $stmt->execute(['id'=>$id]);
        return $stmt->fetchObject(Student::class);
    }

    public function findByDni($dni):?Student{
        $stmt=$this->db->prepare("SELECT * FROM students WHERE dni=:dni");
        $stmt->execute(['dni'=>$dni]);
        return $stmt->fetchObject(Student::class);
    }

}
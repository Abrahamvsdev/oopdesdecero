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
        $sql = "INSERT INTO students(user_id, dni, enrollment_year) VALUES (:user_id, :dni, :enrollment_year)";
        var_dump("Prepared SQL Query:", $sql);
        var_dump("Parameter Array:", [
            'user_id' => $student->getUuid(), // <--- CORRECTO: Usar $student->getUserId()
            'dni' => $student->getDni(),
            'enrollment_year' => $student->getEnrollmentYear()
        ]);
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'user_id' => $student->getUuid(), // <--- Sigue usando $student->getUserId() para execute() también
            'dni' => $student->getDni(),
            'enrollment_year' => $student->getEnrollmentYear()
        ]);
    }

    public function findById($id):?Student{
        $stmt=$this->db->prepare("SELECT * FROM students WHERE id=:id");
        $stmt->execute(['id'=>$id]);
        return $stmt->fetchObject(Student::class);
    }

}
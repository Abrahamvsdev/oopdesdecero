<?php

namespace App\Infrastructure\Persistence;

use App\School\Entities\Teacher;
use App\School\Repositories\ITeacherRepository;

class TeacherRepository implements ITeacherRepository {
    private \PDO $db;
    

    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    public function save(Teacher $teacher)
    {
        $stmt = $this->db->prepare("INSERT INTO teachers(user_id,department_id) VALUES (:user_id, :department_id)");
        $stmt->execute([
            'user_id' => $teacher->getUserId(),
            'department_id'=> $teacher->getDepartmentId()
        ]);
    }

    public function findById($id):?Teacher{
        $stmt=$this->db->prepare("SELECT * FROM teachers WHERE id=:id");
        $stmt->execute(['id'=>$id]);
        return $stmt->fetchObject(Teacher::class);
    }


    
}
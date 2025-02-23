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
        $stmt = $this->db->prepare("INSERT INTO teachers(user_id) VALUES (:user_id)");
        $stmt->execute([
            'user_id' => $teacher->getUuid(), // TODO Revisar esta lógica, uso el uuid para las foráneas en las entities, pero el lastinsertid tambien
        ]);
    }

    public function findById($id):?Teacher{
        $stmt=$this->db->prepare("SELECT * FROM teachers WHERE id=:id");
        $stmt->execute(['id'=>$id]);
        return $stmt->fetchObject(Teacher::class);
    }


    
}
<?php

namespace App\Infrastructure\Persistence;

use App\School\Entities\Course;
use App\School\Repositories\ICourseRepository;

class CourseRepository implements ICourseRepository{
    private \PDO $db;

    public function __construct(\PDO $db){
        $this->db=$db;
    }

    public function save(Course $course): int{
        $stmt=$this->db->prepare("INSERT INTO courses(name, degree_id) VALUES(:name, :degree_id)");
        $stmt->execute([
            'name'=>$course->getName(),
            'degree_id'=>$course->getDegreeId() // Puede ser null
        ]);
        return $this->db->lastInsertId();
    }

    public function findById($id){
        $stmt=$this->db->prepare("SELECT * FROM courses WHERE id=:id");
        $stmt->execute(['id'=>$id]);
        $courseData = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($courseData === false) {
            return null; 
        }
        return new Course($courseData['name'], $courseData['degree_id'], $courseData['id']);
    }

    public function findAll(){
        $stmt = $this->db->query("SELECT * FROM courses");
        $coursesData = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $courses = [];
        foreach ($coursesData as $courseData) {
            $courses[] = new Course($courseData['name'], $courseData['degree_id'], $courseData['id']);
        }
        return $courses;
    }
}
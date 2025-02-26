<?php

namespace App\School\Services;

use App\School\Entities\Course;
use App\School\Repositories\ICourseRepository;

class CourseService{
    private ICourseRepository $courseRepository;

    public function __construct(ICourseRepository $courseRepository){
        $this->courseRepository = $courseRepository;
    }

    public function save(Course $course)
    {
        return $this->courseRepository->save($course);
    }

    public function findById($id)
    {
        return $this->courseRepository->findById($id);
    }

    public function findAll()
    {
        return $this->courseRepository->findAll();
    }
}
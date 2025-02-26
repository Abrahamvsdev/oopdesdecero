<?php 

    namespace App\School\Services;

use App\Infrastructure\Persistence\CourseRepository;
use App\School\Entities\Student;
    use App\School\Entities\Course;
    use App\Infrastructure\Persistence\StudentRepository;
    use App\Infrastructure\Persistence\EnrollmentRepository;
    use App\School\Entities\Enrollment;

    class EnrollmentService{
        private StudentRepository $studentRepository;
        private EnrollmentRepository $enrollmentRepository;
        private CourseRepository $courseRepository;

        function __construct(StudentRepository $studentRepo, EnrollmentRepository $enrollmentRepo, CourseRepository $courseRepository)
        {
            $this->studentRepository=$studentRepo;
            $this->courseRepository = $courseRepository;
            $this->enrollmentRepository=$enrollmentRepo;
        }

        function enrollStudentInCourse ($studentId,$courseId){
            $student=$this->studentRepository->findById($studentId);
            $course=$this->courseRepository->findById($courseId);

            if(!$student || !$course){
                throw new \Exception("Course or Student not found");
            }
            $enrollment=new Enrollment(null,$student,$course);
            $this->enrollmentRepository->save($enrollment);
        }

        function findEnrollmentById($id)
        {
            return $this->enrollmentRepository->findById($id);
        }
    }
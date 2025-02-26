<?php 


namespace App\School\Services;



use App\School\Entities\User;
use App\School\Entities\Teacher;
use App\School\Entities\Student;
use App\School\Repositories\IUserRepository;
use App\School\Repositories\ITeacherRepository;
use App\School\Repositories\IStudentRepository;




class UserService{
        private IUserRepository $iuserRepository;
        private IStudentRepository $istudentRepository;
        private ITeacherRepository $iteacherRepository;
        
        
        public function __construct(IUserRepository $iuserRepository,ITeacherRepository $iteacherRepository,IStudentRepository $istudentRepository){
            $this->iuserRepository = $iuserRepository;
            $this->iteacherRepository = $iteacherRepository;
            $this->istudentRepository = $istudentRepository;
        }
        
        public function save(User $user){
            
            
            $lastInsertId = $this->iuserRepository->save($user); // Guarda el User en la tabla 'users'
            $userType = $user->getType();
            $user_id = $lastInsertId;


            if ($userType === 'teacher') {
                $teacher = new Teacher(
                    $user_id,
                    $user->getUuid(),
                    $user->getUsername(),
                    $user->getLastName(),
                    $user->getEmail(),
                    $user->getPassword(),
                    $user->getDni(),
                    $user->getType(),
                    $_POST['department_id']?? 0 
                );
                $this->iteacherRepository->save($teacher);
                
            } elseif ($userType === 'student') {
                $student = new Student(
                $user_id,
                $user->getUuid(),
                $user->getUsername(),
                $user->getLastName(),
                $user->getEmail(),
                $user->getPassword(),
                $user->getDni(),
                $user->getType(),
                $_POST['enrollment_year']?? 0 
            );
            $this->istudentRepository->save($student);
        }
    }
        public function findByDni(String $dni):?User{
            return $this->iuserRepository->findByDni($dni);
        }



}
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
        
        
        public function __construct(IUserRepository $iuserRepository){
            $this->iuserRepository = $iuserRepository;
        }
        
        public function save(User $user){
            $this->iuserRepository->save($user);
            
            $userType = $user->getType();
            if ($userType === 'teacher') {
                $teacher = new Teacher(
                    $user->getUuid(),
                    $user->getUsername(),
                    $user->getLastName(),
                    $user->getEmail(),
                    $user->getPassword(),
                    $user->getDni(),
                    $user->getType()
                );
                $this->iteacherRepository->save($teacher);
            }elseif ($userType === 'student') {
            $student = new Student(
                $user->getUuid(),
                $user->getUsername(),
                $user->getLastName(),
                $user->getEmail(),
                $user->getPassword(),
                $user->getDni(),
                $user->getType()
            );
            $this->istudentRepository->save($student);
        }
    }
        public function findByDni(String $dni):?User{
            return $this->iuserRepository->findByDni($dni);
        }



}
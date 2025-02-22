<?php 


namespace App\School\Services;



use App\School\Entities\User;
use App\School\Repositories\IUserRepository;





class UserService{
    
        private IUserRepository $iuserRepository;
    
        public function __construct(IUserRepository $iuserRepository){
            $this->iuserRepository = $iuserRepository;

        }

        public function save(User $user){
            $this->iuserRepository->save($user);
        }

        public function findByDni(String $dni):?User{
            return $this->iuserRepository->findByDni($dni);
        }



}
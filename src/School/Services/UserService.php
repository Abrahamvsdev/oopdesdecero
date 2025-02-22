<?php 


namespace App\School\Services;

use IUserRepository;



class UserService{
    
        private IUserRepository $iuserRepository;
    
        public function __construct(IUserRepository $iuserRepository){
            $this->iuserRepository = $iuserRepository;
        }

}
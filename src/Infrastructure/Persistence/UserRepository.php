<?php
    namespace App\Infrastructure\Persistence;

    
    use App\School\Entities\User;
    use App\School\Repositories\IUserRepository;
    
    class UserRepository implements IUserRepository{
        private \PDO $db;

        function __construct(\PDO $db){
            $this->db=$db;
        }

        function save(User $user){
            $stmt=$this->db->prepare("INSERT INTO users(uuid, username, lastname, email, password, dni, type) VALUES(:uuid,:username,:lastname,:email,:password,:dni,:type)");
            $stmt->execute([
                'uuid'=>$user->getUuid(),
                'username'=>$user->getUsername(),
                'lastname'=>$user->getLastName(),
                'email'=>$user->getEmail(),
                'password'=>$user->getPassword(),
                'dni'=>$user->getDni()?? "",
                'type'=>$user->getType()
            ]);

            $lastInsertId = $this->db->lastInsertId();
            return $lastInsertId;

        }

        function findByDni(string $dni):?User{
            $stmt=$this->db->prepare("SELECT * FROM users WHERE dni=:dni");
            $stmt->execute(['dni'=>$dni]);
            return $stmt->fetchObject(User::class);
        }
    }
<?php 

namespace App\School\Repositories;

use App\School\Entities\Enrollment;

interface IEnrollmentRepository{
    function save(Enrollment $enrollment);
    function findById($id);
}
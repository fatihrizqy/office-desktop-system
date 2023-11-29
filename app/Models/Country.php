<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Country extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getData()
    {
        $query = "SELECT * FROM `countries` WHERE STATUS = 1";

        $result = DB::select($query);
        return $result;
    }

    public function tambahCountry($a, $b, $c, $d = 1)
    {
        $query = "INSERT INTO `countries`(`CountryName`, `Continent`, `Currency`, `status`)
                  VALUES ('$a','$b','$c','$d')";

        DB::select($query);
    }

    public function ambilCountry($id)
    {
        $query = "SELECT * FROM `countries` WHERE CountryId = $id";

        $result = DB::select($query);
        return $result;
    }

    public function updateCountry($id, $negara, $benua, $singkatan)
    {
        $query = "UPDATE `countries`
                  SET `CountryName`='$negara', `Continent`='$benua', `Currency`='$singkatan'
                  WHERE `CountryId`='$id'";

        DB::select($query);
    }

    public function getDep($id)
    {
        $query = "SELECT DepartementId id FROM `departments` WHERE CountryId = $id";

        return DB::select($query);
    }

    public function detelesEmploye($id)
    {
        $query = "UPDATE `employees` SET `status` = 0 WHERE DeptId = $id";

        DB::select($query);
    }

    public function deletesDepartment($id)
    {
        $query = "UPDATE `departments` SET `status`= 0 WHERE CountryId = $id";

        DB::select($query);
    }

    public function deletesCountry($id)
    {
        $query = "UPDATE `countries` SET `status`= 0 WHERE CountryId = $id";
        
        DB::select($query);
    }

    public function deteleEmploye($id)
    {
        $query = "DELETE FROM `employees` WHERE DeptId = $id";

        DB::select($query);
    }

    public function deleteDepartment($id)
    {
        $query = "DELETE FROM `departments` WHERE CountryId = $id";

        DB::select($query);
    }

    public function deleteCountry($id)
    {
        $query = "DELETE FROM `countries` WHERE CountryId = $id";

        DB::select($query);
    }
}

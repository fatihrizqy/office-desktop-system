<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Folder extends Model
{
    use HasFactory;

    public function getdata()
    {
        $query = "SELECT a.*, b.EmpName from folders a join employees b on a.EmpId = b.EmpID where a.status = 1 order by a.FolderId ASC";

        $results = DB::select($query);

        return $results;
    }

    public function getEmploye()
    {
        $query = "SELECT a.EmpID id, a.EmpName nama FROM employees a WHERE status = 1";

        $result = DB::select($query);
        return $result;
    }

    public function tambahCountry($nama, $id, $akses, $status = 1)
    {
        $query = "INSERT INTO `folders`(`FolderName`, `EmpId`, `AccessType`, `status`) VALUES ('$nama','$id','$akses','$status')";

        DB::select($query);
    }

    public function ambilFolder($id)
    {
        $query = "SELECT * FROM `folders` WHERE FolderId = $id;";

        $result = DB::select($query);
        return $result;
    }

    public function updateFolder($id, $nama, $akses)
    {
        $query = "UPDATE `folders`
                  SET `FolderName`='$nama', `AccessType`='$akses'
                  WHERE FolderId = $id";

        DB::select($query);
    }

    public function detelesFolder($id)
    {
        $query = "DELETE FROM `folders` WHERE FolderId = $id";

        DB::select($query);
    }

    public function deteleFolder($id)
    {
        $query = "DELETE FROM `folders` WHERE FolderId = $id";

        DB::select($query);
    }
}

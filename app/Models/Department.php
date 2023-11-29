<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Department extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'DepartementId',
        'DeptName',
        'CountryId',
        'status'
    ];

    public function getdata()
    {
        $query = "SELECT * FROM `departments` WHERE status=1";

        $results = DB::select($query);

        return $results;
    }
}

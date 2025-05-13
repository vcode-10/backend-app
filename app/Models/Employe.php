<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employe extends Model
{
    use HasFactory;

    protected $table = 'employes';

    protected $fillable = [
        'nik',
        'name',
        'email',
        'phone',
        'address',
    ];

    protected static function getEmploye()
    {
        return Employe::paginate(10);
    }

    protected static function getEmployeById($id)
    {
        return Employe::find($id);
    }
    protected static function createEmploye($data)
    {
        return Employe::create($data);
    }
    protected static function updateEmploye($data, $id)
    {
        return Employe::find($id)->update($data);
    }
    protected static function deleteEmploye($id)
    {
        return Employe::find($id)->delete();
    }
}

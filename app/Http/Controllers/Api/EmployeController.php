<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeResource;


class EmployeController extends Controller
{

    public function index()
    {
      try {
        $data = new EmployeResource(true, 'List Data Employe', Employe::getEmploye());
       return response()->json($data, 200);
      } catch (\Throwable $th) {
        return response()->json($th->getMessage(), 400);
      }
    }

    public function store(Request $request)
    {
        try {
            $result = Employe::createEmploye($request->all());

            if ($result) {
                $data = new EmployeResource(true, 'Data Employe Berhasil Ditambahkan!', $result);
            } else {
                $data = new EmployeResource(false, 'Data Employe Gagal Ditambahkan!', $result);
            }
            return $data;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 400);
        }
    }

    public function show($id)
    {
        try {
            $data = new EmployeResource(true, 'Detail Data Employe!', Employe::getEmployeById($id));
            return $data;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // $result = Employe::getEmployeById($id)->update($request->all());
            $result = Employe::updateEmploye($request->all(), $id);
            if ($result) {
                $data = new EmployeResource(true, 'Data Employe Berhasil Diubah!', $result);
            } else {
                $data = new EmployeResource(false, 'Data Employe Gagal Diubah!', $result);
            }
            return $data;
        }catch (\Throwable $th) {
            return response()->json($th->getMessage(), 400);
        }
    }
    public function destroy($id)
    {
        try {
            $result = Employe::deleteEmploye($id);
            if ($result) {
                $data = new EmployeResource(true, 'Data Employe Berhasil Dihapus!', $result);
            } else {
                $data = new EmployeResource(false, 'Data Employe Gagal Dihapus!', $result);
            }
            return $data;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 400);
        }
    }
}

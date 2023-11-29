<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;
use DB;
class FolderController extends Controller
{
    public function index()
    {
        $model = new Folder();
        $folder = $model->getdata();

        return view('Folder.index', compact('folder'));
    }

    public function tambahFolder()
    {
        /**Get employee from db employee use :
         * $model = new Folder();
         * $employe = $model->getEmploye();
         * 
         * return view('Folder.create', compact('employe'));
         */
        return view('Folder.create');
    }

    public function insertFolder(Request $request)
    {
        $model = new Folder();

        #get employe from user login
        $id = auth()->user()->name;
        $data = DB::select("SELECT EmpID FROM employees WHERE EmpName='{$id}'")[0]->EmpID;

        $nama = $request->folder;
        $akses = $request->akses;

        $model->tambahCountry($nama, $data, $akses);

        return redirect()->route('folder')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function editFolder(Request $request)
    {
        $model = new Folder();

        $id = $request->id;
        $folder = $model->ambilFolder($id);

        return view('Folder.edit', compact('folder'));
    }

    public function updateFolder(Request $request)
    {
        $modal = new Folder();

        $id = $request->id;
        $nama = $request->nama;
        $akses = $request->akses;

        $modal->updateFolder($id, $nama, $akses);

        return redirect()->route('folder')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function deletesFolder(Request $request)
    {
        $modal = new Folder();
        
        $id = $request->id;
        $modal->detelesFolder($id);

        return redirect()->route('folder')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function deleteFolder(Request $request)
    {
        $modal = new Folder();
        
        $id = $request->id;
        $modal->deteleFolder($id);

        return redirect()->route('folder')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

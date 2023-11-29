<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use DB;
class CountryController extends Controller
{
    public function index()
    {
        $model = new Country();
        $country = $model->getdata();
        $id = auth()->user()->name;
        $data = DB::select("SELECT DeptID FROM employees WHERE EmpName='{$id}'")[0]->DeptID;
        $cid = DB::select("SELECT CountryId FROM departments WHERE DepartementId='{$data}'")[0]->CountryId;
        return view('Country.country', compact('country','cid'));
    }
    public function createCountry()
    {
        return view('Country.create');
    }

    public function tambahCountry(Request $request)
    {
        $negara = $request->negara;
        $benua = $request->benua;
        $singkatan = $request->singkatan;

        $modal = new Country();
        $modal->tambahCountry($negara, $benua, $singkatan);

        return redirect()->route('indexCountry')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function editCountry(Request $request)
    {
        $modal = new Country();
        $id = $request->id;
        $country = $modal->ambilCountry($id);

        return view('Country.edit', compact('country'));
    }

    public function updateCountry(Request $request)
    {
        $modal = new Country();

        $id = $request->id;
        $negara = $request->negara;
        $benua = $request->benua;
        $singkatan = $request->singkatan;

        $modal->updateCountry($id, $negara, $benua, $singkatan);

        return redirect()->route('indexCountry')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function deletesCountry(Request $request)
    {
        $modal = new Country();
        
        $id = $request->id;
        $getDep = $modal->getDep($id);
        $dataDep = [];
        foreach ($getDep as $key){
            array_push($dataDep, $key->id);
        }

        #delete on db employee
        foreach ($dataDep as $key){
            $modal->detelesEmploye($key);
        }

        #detele on db department
        $modal->deletesDepartment($id);

        #delete on db countries
        $modal->deletesCountry($id);

        return redirect()->route('indexCountry');
    }

    public function deleteCountry(Request $request)
    {
        $modal = new Country();
        
        $id = $request->id;
        $getDep = $modal->getDep($id);
        $dataDep = [];
        foreach ($getDep as $key){
            array_push($dataDep, $key->id);
        }

        #delete on db employee
        foreach ($dataDep as $key){
            $modal->deteleEmploye($key);
        }

        #detele on db department
        $modal->deleteDepartment($id);

        #delete on db countries
        $modal->deleteCountry($id);

        return redirect()->route('indexCountry');
    }
}

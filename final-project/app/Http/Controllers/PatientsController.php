<?php

namespace App\Http\Controllers;
use App\Models\Patients;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    # mendapatkan semua data patients
    # method index
    public function index(){
        # menggunakan model patients untuk select data
        $patients = Patients::all();

        if($patients){
            $data = [
                'message' => 'Get all Patients',
                'data' => $patients
            ];

            # mengembalikan data (json) dan code 200
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Patients is Empty'
            ];

            # mengembalikan data (json) dan code 200
            return response()->json($data, 200);
        }
    }

    # menambahkan resource patients
    # membuat method store
    public function store(Request $request){
        # menangkap data request
        $validateData = $request->validate([
            # kolom => rules|rules
            'name' => 'required',
            'phone' => 'numeric|required',
            'address' => 'required',
            'status' => 'required',
            'in_date_at' => 'required',
            'out_date_at' => 'required'
        ]);

        # menggunakan model Patients untuk insert data
        $patients = Patients::create($validateData);
        $data = [
            'message' => 'Patients is Created Succesfully',
            'data' => $patients
        ];

        # mengembalikan data (json) status code 201
        return response()->json($data, 201);
    }

    # mencari id patients
    # membuat method show
    public function show($id){
        # cari id Patients yang ingin didapatkan
        $patients = Patients::find($id);

        if($patients){
            $data = [
                'message' => 'Get Detail Patients',
                'data' => $patients
            ];

            # mengembalikan data (json) dan code 200
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Patients not found'
            ];

            # mengembalikan data (json) dan code 404
            return response()->json($data, 404);
        }
    }

    # mengubah resource patients
    # membuat method update
    public function update(Request $request, $id){
        # cari id patients yang ingin diupdate
        $patients = Patients::find($id);

        if($patients){
            # menangkap data request
            $input = [
                'name' => $request->name ?? $patients->name,
                'phone' => $request->phone ?? $patients->phone,
                'address' => $request->address ?? $patients->address,
                'status' => $request->status ?? $patients->status,
                'in_date_at' => $request->in_date_at ?? $patients->in_date_at,
                'out_date_at' => $request->out_date_at ?? $patients->out_date_at
            ];

            # melakukan update data
            $patients->update($input);

            $data = [
                'message' => 'Patients is updated',
                'data' => $patients
            ];

            # mengembalikan data (json) status code 200
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Patients is not found'
            ];

            # mengembalikan data (json) dan code 404
            return response()->json($data, 404);
        }
    }

    # menghapus resource patients
    # membuat method destroy
    public function destroy($id){
        # cari id patients yang ingin dihapus
        $patients = Patients::find($id);

        if($patients){
            # hapus data patients
            $patients->delete();

            $data = [
                'message' => 'Patients is deleted'
            ];

            # mengembalikan data (json) status code 200
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Patients not found'
            ];

            # mengembalikan data (json) dan code 404
            return response()->json($data, 404);
        }
    }

    # mencari resource patients berdasarkan name
    # membuat method search
    public function search($name){
        # cari data Patients yang ingin didapatkan
        $patients = Patients::where('name', $name)->get();

        if(count($patients)){
            $data = [
                'message' => 'Get Search Patients',
                'data' => $patients
            ];

            # mengembalikan data (json) dan code 200
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Patients not found'
            ];

            # mengembalikan data (json) dan code 404
            return response()->json($data, 404);
        }
    }

    # mencari resource patients berdasarkan status positive
    # membuat method positive
    public function positive(){
        # cari data Patients positive yang ingin didapatkan
        $patients = Patients::where('status', 'positive')->get();

        if(count($patients)){
            $data = [
                'message' => 'Get Positive Patients',
                'data' => $patients
            ];

            # mengembalikan data (json) dan code 200
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Positive Patients not found'
            ];

            # mengembalikan data (json) dan code 404
            return response()->json($data, 404);
        }
    }

    # mencari resource patients berdasarkan status recovered
    # membuat method recovered
    public function recovered(){
        # cari data Patients recovered yang ingin didapatkan
        $patients = Patients::where('status','recovered')->get();

        if(count($patients)){
            $data = [
                'message' => 'Get Recovered Patients',
                'data' => $patients
            ];

            # mengembalikan data (json) dan code 200
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Recovered Patients not found'
            ];

            # mengembalikan data (json) dan code 404
            return response()->json($data, 404);
        }
    }

    # mencari resource patients berdasarkan status dead
    # membuat method dead
    public function dead(){
        # cari data Patients dead yang ingin didapatkan
        $patients = Patients::where('status', 'dead')->get();

        if(count($patients)){
            $data = [
                'message' => 'Get Dead Patients',
                'data' => $patients
            ];

            # mengembalikan data (json) dan code 200
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Dead Patients not found'
            ];

            # mengembalikan data (json) dan code 404
            return response()->json($data, 404);
        }
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    # method index - get all resource
    public function index(){
        # menggunakan model Student untuk select data
        $students = Student::all();

        $data = [
            'message' => 'Get all students',
            'data' => $students
        ];

        # menggunakan response json laravel
        # otomatis set header content type json
        # otomatis mengubah data array ke JSON
        # mengatur status code
        return response()->json($data, 200);
    }

    # menambahkan resource student
    # membuat method store
    public function store(Request $request){
        # menangkap data request
        $validateData = $request->validate([
            # kolom => rules|rules
            'nama' => 'required',
            'nim' => 'numeric|required',
            'email' => 'email|required',
            'jurusan' => 'required'
        ]); 

        # menggunakan model Student untuk insert data
        $student = Student::create($validateData);
        $data = [
            'message' => 'Student is created succesfully',
            'data' => $student
        ];

        # mengembalikan data (json) status code 201
        return response()->json($data, 201);
    }

    # mengubah resource student
    # membuat method update
    public function update(Request $request, $id){
        # cari id student yang ingin diupdate
        $student = Student::find($id);

        if($student){
            # menangkap data request
            $input = [
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan
            ];

            # melakukan update data
            $student->update($input);

            $data = [
                'message' => 'Student is updated',
                'data' => $student
            ];

            # mengembalikan data (json) status code 200
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Student is not found'
            ];

            return response()->json($data, 404);
        }
    }

    # menghapus resource student
    # membuat method destroy
    public function destroy($id){
        # cari id student yang ingin dihapus
        $student = Student::find($id);

        if($student){
            # hapus data student
            $student->delete();

            $data = [
                'message' => 'Student is deleted'
            ];

            # mengembalikan data (json) status code 200
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
        }
    }

    # mendapatkan detail resource student
    # membuat method show
    public function show($id){
        # cari id student yang ingin didapatkan
        $student = Student::find($id);

        if ($student){
            $data = [
                'message' => 'Get detail student',
                'data' => $student
            ];

            # mengembalikan data (json) dan code 200
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Student not found'
            ];

            # mengembalikan data (json) dan code 404
            return response()->json($data, 404);
        }
    }
}

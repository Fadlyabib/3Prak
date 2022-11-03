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
            'data' => $students,
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
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];

        # menggunakan Student untuk insert data
        $student = Student::create($input);
        $data = [
            'message' => 'Student is created succesfully',
            'data' => $student,
        ];

        # mengembalikan data (json) status code 201
        return response()->json($data, 201);
    }

    # mengubah resource student
    # membuat method update
    public function update(Request $request, $id){
        # mengubah data student
        $student = Student::where("id", $request->id)
        ->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ]);

        # menampilkan bahwa data berhasil di update
        $data = [
            'message' => 'Student is updated succesfully',
        ];

        # mengembalikan data (json) status code 201
        return response()->json($data, 201);
    }

    # menghapus resource student
    # membuat method destroy
    public function destroy($id){
        # menghapus data berdasarkan id
        $students = Student::where('id', $id)->delete();

        #menampilkan bahwa data berhasil dihapus
        $data = [
            'message' => 'Student is deleted succesfully',
        ];
        
        # mengembalikan data (json) status code 200
        return response()->json($data, 200);
    }
}

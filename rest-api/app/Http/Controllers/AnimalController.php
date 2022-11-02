<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = ["Kucing","Ayam","Ikan"];
    public function index(){
        echo "Menampilkan data Animal: "."\n";
        foreach($this->animals as $animal){
            echo "- ". $animal ."\n";
        }
    }

    public function store(Request $request){
        echo "Menambahkan data baru"."\n";
        $data = $request->only('animal');
        array_push($this->animals, $data['animal']);
        $this->index();
    }

    public function update(Request $request, $id){
        echo "Mengubah Data Hewan index ke-".$id."\n";
        $data = $request->only("animal");
        $this->animals[$id] = $data["animal"];
        $this->index();
    }

    public function destroy($id){
        echo "Menghapus data hewan index ke-".$id."\n";
        unset($this->animals[$id]);
        $this->index();
    }

}

<?php
# membuat class Animal
class Animal{
    # property animals
    public $animals;

    # method constructor - mengisi data awal
    # parameter: data hewan (array)
    public function __construct($data){
        $this->animals = $data;
    }

    # method index - menampilkan data animals
    public function index(){
        # gunakan foreach untuk menampilkan data animals (array)
        $animals = $this->animals;
        foreach ($animals as $animal){
            echo $animal.'<br>';
        }
    }

    # method store - menambahkan hewan baru
    # parameter: hewan baru
    public function store($data){
        # gunakan method array_push untuk menambahkan data baru
        $animals = $this->animals;
        array_push($animals, $data);
        foreach ($animals as $animal){
            echo $animal.'<br>';
        }
    }

    # method update - mengupdate hewan
    # parameter: index dan hewan baru
    public function update($index, $data){
        $animals = $this->animals;
        $new = $data;
        $animals[$index]= $new;
        foreach ($animals as $animal){
            echo $animal.'<br>';
        }
    }

    # method delete - menghapus hewan
    # parameter: index
    public function destroy($index){
        # gunakan method unset atau array_splice untuk menghapus data array
        $animals = $this->animals;
        unset($animals[$index]); // Unset
        foreach ($animals as $animal){
            echo $animal.'<br>';
        }
    }
}

# membuat object
# kirimkan data hewan (array) ke constructor
$animal = new Animal(["Ayam", "Ikan"]);

echo "Index - Menampilkan seluruh hewan <br>";
$animal->index();
echo "<br>";

echo "Store - Menambahkan hewan baru <br>";
$animal->store('Burung');
echo "<br>";

echo "Update - Mengupdate hewan <br>";
$animal->update(0, 'Kucing Anggora');
echo "<br>";

echo "Destroy - Menghapus hewan <br>";
$animal->destroy(1);
echo "<br>";

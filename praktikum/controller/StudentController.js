// import data student
const students = require("../data/students.js")

// membuat class studentcontroller
class StudentController{
    index(req, res){
        const data = {
            message: "Menampilkan semua students",
            data: students
        };

        res.json(data);
    }

    store(req, res){
        const {nama} = req.body;
        students.push(nama);
        const data = {
           message: `Menambahkan data students: ${nama}`,
           data: students
        };

        res.json(data);
    }

    update(req, res){
        const {id} = req.params;
        const {nama} = req.body;
        students[id] = nama;
        const data = {
            message: `Mengedit students id ${id}, nama ${nama}`,
            data: students
        };

        res.json(data);
    }

    destroy(req, res){
        const {id} = req.params;
        students.splice(id, 1);
        const data = {
            message: `Menghapus students id ${id}`,
            data: students
        };

        res.json(data);
    }
}

// membuat object studentcontroller
const object = new StudentController();

// export object studentcontroller
module.exports = object;
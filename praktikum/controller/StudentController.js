// import data student
// const students = require("../data/students.js");

// import model student
const Student = require("../models/Student");

// membuat class studentcontroller
class StudentController{
    // index(req, res){
    //     // memanggil method static all
    //     Student.all(function(students){ 
    //         const data = {
    //             message: "Menampilkan semua students",
    //             data: students,
    //         };
    //         res.json(data);
    //     });
    // }

    // menambahkan keyword async untuk memberitahu proses asynchronous
    async index(req, res){
        // memanggil method static all dengan async await
        const students = await Student.all();
        const data = {
            message: "Menampilkan semua students",
            data: students,
        };
        res.json(data);
    }

    async store(req, res){
        /**
         * method create mengembalikan data yang baru diinsert
         * kembalikan data dalam bentuk json
         */
        const students = await Student.create(req.body);
        const data = {
           message: "Menambahkan data students",
           data: students
        };
        res.json(data);
    }

    update(req, res){
        const {id} = req.params;
        const {nama} = req.body;
        Student[id] = nama;
        const data = {
            message: `Mengedit students id ${id}, nama ${nama}`,
            data: Student
        };

        res.json(data);
    }

    destroy(req, res){
        const {id} = req.params;
        Student.splice(id, 1);
        const data = {
            message: `Menghapus students id ${id}`,
            data: Student
        };

        res.json(data);
    }
}

// membuat object studentcontroller
const object = new StudentController();

// export object studentcontroller
module.exports = object;
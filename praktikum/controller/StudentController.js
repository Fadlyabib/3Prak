// import data student
// const students = require("../data/students.js");

// import model student
const Student = require("../models/Student");

// membuat class studentcontroller
class StudentController{
    // menambahkan keyword async untuk memberitahu proses asynchronous
    async index(req, res){
        // memanggil method static all dengan async await
        const students = await Student.all();

        // jika data array lebih dari 0
        if(students.length > 0){
            const data = {
                message: "Menampilkan semua students",
                data: students,
            };
            return res.status(200).json(data);
        }
        // else {
        const data = {
            message: "Student is Empty",
        };
        return res.status(404).json(data);
        // }
    }

    // solution with callback
    async store(req, res){
        /**
         * validasi sederhana
         * handle jika salah satu data tidak dikirim
         */

        // destructing object req.body 
        const {nama, nim, email, jurusan} = req.body;

        // jika data undefined maka kirim response error
        if(!nama || !nim || !email || !jurusan){
            const data = {
                message: "Semua data harus dikirim"
            };
            return res.status(422).json(data);
        }

        // else
        const student = await Student.create(req.body);
        const data = {
            message: "Menambahkan data students",
            data: student
        };
        return res.status(201).json(data);
    }

    async update(req, res){
        const {id} = req.params;
        // cari id student yang ingin di update
        const student = await Student.find(id);

        if(student){
            // melakukan update data
            const student = await Student.update(id, req.body);
            const data = {
                message: `Mengedit data students`,
                data: student
            };
            res.status(200).json(data);
        }else{
            const data = {
                message: `Student not Found`
            };
            res.status(404).json(data);
        }
    }

    async destroy(req, res){
        const {id} = req.params;
        const student = await Student.find(id);

        if(student){
            // menghapus data berdasarkan id
            await Student.delete(id);
            const data = {
                message: `Menghapus data students`,
            };
            res.status(200).json(data);
        }else{
            const data = {
                message: `Student not Found`
            };
            res.status(404).json(data);
        }
    }

    async show(req, res){
        const {id} = req.params;
        // cari student berdasarkan id
        const student = await Student.find(id);

        if(student){
            const data ={
                message: "Menampilkan detail students",
                data: student
            };
            res.status(200).json(data);
        }else{
            const data = {
                message: "Student not Found"
            };
            res.status(404).json(data);
        }
    }
}

// membuat object studentcontroller
const object = new StudentController();

// export object studentcontroller
module.exports = object;
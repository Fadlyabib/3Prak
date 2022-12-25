// import database
const db = require("../config/database");

// membuat class student
class Student{
    // solution with callback
    // static all(callback){
    //     const query = "Select * from students";
    //     /**
    //      * melakukan query menggunakan method query
    //      * menerima 2 params: query dan callback
    //      */
    //     db.query(query, (err, results) => {
    //         callback(results);
    //     });
    // }

    // solution with promise and async await
    static all(){
        return new Promise((resolve, reject) => {
            const query = "SELECT * FROM students";
            /**
            * melakukan query menggunakan method query
            * menerima 2 params: query dan callback
            */
            db.query(query, (err, results) => {
                resolve(results);
            });
        })
    }

    static create(req){
        /**
         * method menerima parameter data yang akan di insert
         * method mengembalikan data student yang baru di insert
         */
        return new Promise((resolve, reject) => {
            const query = `INSERT INTO students (nama, nim, email, jurusan) values (${req})`;
            db.query(query, (err, results) => {
                resolve(results);
            });
        });
    }
}

// export class student
module.exports = Student;
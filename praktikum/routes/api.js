// import studentcontroller
const StudentController = require("../controller/StudentController");

const express = require("express");
const router = express.Router();

/**
 * membuat routing
 */
// router.get("/", (req, res) => {
//     res.send("Hello Express JS");
// });

// routing student
router.get("/students", StudentController.index);
router.post("/students", StudentController.store);
router.put("/students/:id", StudentController.update);
router.delete("/students/:id", StudentController.destroy);

// export router
module.exports = router;
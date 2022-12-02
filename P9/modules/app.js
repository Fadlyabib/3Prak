// import fruitcontroller
// melakukan destructing object
const {index, store} = require("./FruitController.js");

const main = () => {
    index();
    store("Melon");
};

main();
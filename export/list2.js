import { list1 } from "./list1.js";  // import first list

let list2 = [
  { name: "Ali", age: 22, number: 14, code: "C3", class: "History" },
  { name: "Sara", age: 19, number: 15, code: "D4", class: "Art" }
];

// combine both lists
let allStudents = [...list2, ...list1];

export { list2, allStudents };

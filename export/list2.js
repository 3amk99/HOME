import { list1 } from "./list1.js";  // import first list

let list2 = [
  { name: "Ali", age: 22, number: 14, code: "C3", class: "History" },
  { name: "Sara", age: 19, number: 15, code: "D4", class: "Art" }
];


let allStudents = [...list2, ...list1];


let container = document.getElementById("list2");

allStudents.forEach(student => {
  let div = document.createElement("div");
  div.innerHTML = `
    <strong>Name:</strong> ${student.name} |
    Age: ${student.age} |
    Number: ${student.number} |
    Code: ${student.code} |
    Class: ${student.class}
  `;
  container.appendChild(div);
});

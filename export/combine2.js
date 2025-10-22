import { allStudents } from "./list2.js";

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

import { list1 } from "./list1.js";

let container = document.getElementById("list1");

list1.forEach(student => {
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

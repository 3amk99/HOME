export { list1 };
let students =  [];

      function renderStudents() {
        let container = document.getElementById("list");
        container.innerHTML = ""; 
        students.forEach(item => 
        {
             let div = document.createElement("div");
             div.innerHTML = `
              <strong>Name:</strong> ${item.title}<br>
              <strong>Class:</strong> ${item.code}<br>
              <strong>Note:</strong> ${item.autor}<br>
              <strong>Numbers:</strong> ${item.year}<br>
               <strong>Numbers:</strong> ${item.price}<br>
             <strong>Numbers:</strong> ${item.possibility}<br>
              <strong>fpoto:</strong>  <img src="${item.FOTO22}" width="100"><br>

             `;
             container.appendChild(div);
        });
        }
  
  
  
      
      document.getElementById("addBtn").addEventListener("click", function() {
        let title1 = document.getElementById("title").value;
        let code1 = document.getElementById("code").value;
        let autor1 = document.getElementById("autor").value;
        let year1 = document.getElementById("year").value;
        let price1 = document.getElementById("price").value;
        let possibility1 = document.getElementById("possibility").value;
        let input = document.getElementById('photo').files[0];

        if (title1 && code1 && autor1 && year1 && price1  &&  possibility1 && input ) {
         
          let newStudent = {
            title: title1,
            code: code1,
            autor: autor1 ,
            year: year1  ,
            price: price1,
            possibility: possibility1,
            FOTO22 : URL.createObjectURL(input)
          };

          students.push(newStudent);
        

          renderStudents();
  
         


          document.getElementById("title").value = "";
          document.getElementById("code").value = "";
          document.getElementById("autor").value = "";
          document.getElementById("year").value = "";
          document.getElementById("price").value = "" ;
          document.getElementById("possibility").value = "" ;
          document.getElementById('photo').value = "" ;

        } else 
        {
          alert("Please fill all fields!");
        }
      });
  
  
  
  
  
     
      renderStudents();
  
  
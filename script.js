let library = 
  [
    { title: "Ab Rani Ab Fakir", code: 1 , author: "Li" , year: "2021" , price: 22 , status: "not borrowed", photo: "lawla.jpg" , message : "sorry....1"},
    { title: "BOK11", code: 2 , author: "John" , year: "2009" , price: 20 , status: "borrowed", photo: "tanya.jpg" , message : "sorry....2"},
    { title: "MalconW", code: 3 , author: "jack" , year: "1995" , price: 30 , status: "not borrowed", photo: "talta.jpg", message : "sorry....3"},
  ];
  
let jami3 = document.getElementById("list");

let people = JSON.parse(localStorage.getItem("peopleList")) || [];

library.push(...people);

function renderlibrary(list = library) {
  jami3.innerHTML = '';

  list.forEach((item,index) => {
    let ibn = document.createElement("div");
    ibn.classList.add("card");

    let tswira = document.createElement("img");
    tswira.src = item.photo;
    tswira.alt = item.message;
    
    let title_A = document.createElement("p");
    title_A.classList.add("title_A");
    title_A.innerHTML = `<span style="color: black;">Title :</span> ${item.title}`

    let code_A = document.createElement("p");
    code_A.classList.add("code_A");
    code_A.innerHTML = `<span style="color: black;">the N° :</span> ${item.code}`

    let author_A = document.createElement("p");
    author_A.classList.add("author_A");
    author_A.innerHTML = `<span style="color: black;">the author :</span> ${item.author}`

    let year_A = document.createElement("p");
    year_A.classList.add("year_A");
    year_A.innerHTML = `<span style="color: black;">the year</span> : ${item.year}`

    let price_A = document.createElement("p");
    price_A.classList.add("price_A");
    price_A.innerHTML = `<span style="color: black;">the price :</span> ${item.price}DH`

    let status_A = document.createElement("p");
    status_A.classList.add("status_A");
    status_A.innerHTML = `<span style="color: black;">the posibility :</span> ${item.status}`  

    let botona = document.createElement("button");
    botona.classList.add("botona");
    botona.innerHTML = "delete" ;
    



  if (item.status === "borrowed") 
  {
    ibn.style.backgroundColor = "rgb(255, 176, 176)";
  } 
  else if (item.status === "not borrowed") 
  {
    ibn.style.backgroundColor = "rgb(255, 255, 255)";
  }





    let botona_ON = document.createElement("button");
    botona_ON.classList.add("botona_ON");
    botona_ON.innerHTML = "TAKE" ;

    botona_ON.addEventListener('click', function() {
     item.status = "borrowed";
     renderlibrary();
     updateFooter();
    });




    let botona_OFF = document.createElement("button");
    botona_OFF.classList.add("botona_OFF");
    botona_OFF.innerHTML = "return" ;

    botona_OFF.addEventListener('click', function() {
      item.status = "not borrowed";
      renderlibrary();
      updateFooter();
    });





    botona.addEventListener("click", function() {
      library.splice(index, 1);
      renderlibrary();
      updateFooter();
    });





    ibn.appendChild(tswira);
    ibn.appendChild(title_A);
    ibn.appendChild(code_A);
    ibn.appendChild(author_A);
    ibn.appendChild(year_A);
    ibn.appendChild(price_A);
    ibn.appendChild(status_A);
    ibn.appendChild(botona);
    ibn.appendChild(botona_ON);
    ibn.appendChild(botona_OFF);


    jami3.appendChild(ibn);
  });
}




let searchBar = document.getElementById("searchBar");
searchBar.addEventListener("input", function() 
{
  let searchText = searchBar.value.toLowerCase();

  let filtered = library.filter(book =>
    book.title.toLowerCase().includes(searchText) ||
    String(book.code).toLowerCase().includes(searchText)

  );

  renderlibrary(filtered);
});





function updateFooter() {
  let foter = document.getElementById("foter_number");
  foter.innerHTML = '';

  let count = 0 ;
  library.forEach(item => {
    if(item.status === "not borrowed" )
    {
      count++;
    }
  });

  let total_price = library.reduce((sum, item) => sum + Number(item.price), 0);
  let Average = (total_price / library.length).toFixed(2);
  let Expensive = library.reduce((a,b) => Number(a.price) > Number(b.price) ? a : b);


  let number_available =  document.createElement("p");
  number_available.classList.add("number_available");
  number_available.innerHTML = `<span style="color: black;">the total books availables is :</span> ${count}` ; 

  let number_total =  document.createElement("p");
  number_total.classList.add("number_total");
  number_total.innerHTML = `<span style="color: black ;">the total is :</span> ${library.length}` ; 

  let number_all_prices =  document.createElement("p");
  number_all_prices.classList.add("number_all_prices");
  number_all_prices.innerHTML = `<span style="color: black ;">the total pricesis :</span> ${total_price}DH` ; 
   
  let Average_price =  document.createElement("p");
  Average_price.classList.add("Average_price");
  Average_price.innerHTML = `<span style="color: black ;">the Average prices is :</span> ${Average}DH` ; 

  let max_price =  document.createElement("p");
  max_price.classList.add("max_price");
  max_price.innerHTML = `<span style="color: black ;">the expensive books is :</span> ${Expensive.price}DH` ; 

  foter.appendChild(max_price);
  foter.appendChild(Average_price);
  foter.appendChild(number_all_prices);
  foter.appendChild(number_available);
  foter.appendChild(number_total);

  
}


function clearAllBooks() 
{
  localStorage.removeItem("peopleList");
  location.reload(); // Refresh page
}



updateFooter();
renderlibrary();



let beblio = [] ;






let collection = JSON.parse(localStorage.getItem("gohst")) || [];
beblio.push(...collection);
function beblio_fun(list = beblio)
{
 let container = document.getElementById("result");
 container.innerHTML = ``;
 list.forEach((item,index) => function()
 {uyg
 let ibn = document.createElement("p");
 ibn.innerHTML = ``;
 let name_1 = document.createElement("p");
 name_1.classList.add("name_1");
 name_1.innerHTML = `the name is ${item.name}`;
 let possibility_1 = document.createElement("p");
 possibility_1.classList.add("possibility_1");
 possibility_1.innerHTML = `the possibility is ${item.possibility}`;
 let price_1 = document.createElement("p");
 price_1.classList.add("price_1");
 price_1.innerHTML = `the price is ${item.price}`;
 let photo_1 = document.createElement("img");
 photo_1.classList.add("photo_1");
 photo_1.src = item.photo
 photo_1.width = 100 ;
 let botona = document.createElement("button");
 botona.classList.add("botona");
 botona.innerHTML = `delete`;
 botona.addEventListener("click",function()
 {
   beblio.splice(index,1);
   localStorage.setItem("gohst",JSON.stringify(beblio));
   beblio_fun();
   tamane();
 });
 let botona_ON = document.createElement("button");
 botona_ON.classList.add("botona_ON");
 botona_ON.innerHTML = `botona_ON`;
 botona_ON.addEventListener("click",function()
 {
   item.possibility = "kayn";
   beblio_fun();
   tamane();
 });
 let botona_OFF = document.createElement("button");
 botona_OFF.classList.add("botona_OFF");
 botona_OFF.innerHTML = `botona_OFF`;
 botona_OFF.addEventListener("click",function()
 {
   item.possibility = "makaynch";
   beblio_fun();
   tamane();
 });
 if( item.possibility === "makaynch")
 {
    ibn.style.backgroundColor = "rgb(255, 168, 168)";
 }
 else if(item.possibility === "kayn")
 {
    ibn.style.backgroundColor = "rgb(160, 255, 168)";
 }
 ibn.appendChild(name_1);
 ibn.appendChild(possibility_1);
 ibn.appendChild(photo_1);
 ibn.appendChild(price_1);
 ibn.appendChild(botona);
 ibn.appendChild(botona_OFF);
 ibn.appendChild(botona_ON);
 container.appendChild(ibn);
 });
}


let sraech_bar = document.getElementById("bar");
sraech_bar.addEventListener("input", function()
{
  let searsh_bar_txt = sraech_bar.value.toLowerCase();
  let resulta = beblio.filter(item => item.name.toLowerCase().include(searsh_bar_txt) );
  beblio_fun(resulta);
});

function tamane()
{
    let taman = document.getElementById("taman_1");
    taman.innerHTML = ``;
    let total_prices = beblio.reduce((item,sum) => sum + Number(item.price) , 0);
    let max_prices = beblio.reduce((item1,item2) => Number(item1.price) > Number(item2.price) ? item1 : item2 );
    let average_prices = (total_prices/beblio.length).toFixed(2);
    let count = 0 ;
    beblio.forEach(item => {
        if(item.possibility === "kayn")
        {
          count++;
        }
    });
    let Total = document.createElement("p");
    Total.classList.add("Total");
    Total.innerHTML = `the Total price is ${total_prices}`;
    let Max_Prices = document.createElement("p");
    Max_Prices.classList.add("Max_Prices");
    Max_Prices.innerHTML = `the Max price is ${max_prices.price}`;
    let Average_prices = document.createElement("p");
    Average_prices.classList.add("Average_prices");
    Average_prices.innerHTML = `the Average price is ${Average_prices}`;
    let POSSIBLE_BOOK = document.createElement("p");
    POSSIBLE_BOOK.classList.add("POSSIBLE_BOOK");
    POSSIBLE_BOOK.innerHTML = `the Possible book now is ${count}`;
    taman.appendChild(Total);
    taman.appendChild(Max_Prices);
    taman.appendChild(Average_prices);
    taman.appendChild(POSSIBLE_BOOK);
}
beblio_fun();
tamane();
let bebeliotica = [] ;
let collector = JSON.parse(localStorage.getItem("gohst")) || [] ;
bebeliotica.push(...collector);
function my_bebeliotica( list = bebeliotica )
{
    let result = document.getElementById("result");
    result.innerHTML = "";
    list.forEach((element,index) => {
        let ibn = document.createElement("div");
        ibn.classList.add("ibn");
        let name_1 = document.createElement("p");
        name_1.classList.add("name_1");
        name_1.innerHTML = ` name :${element.name}`;
        let Author_1 = document.createElement("p");
        Author_1.classList.add("Author_1");
        Author_1.innerHTML = `Author : ${element.Author}`;
        let Year_1 = document.createElement("p");
        Year_1.classList.add("Year_1");
        Year_1.innerHTML = `Year :${element.Year}`;
        let Price_1 = document.createElement("p");
        Price_1.classList.add("Price_1");
        Price_1.innerHTML = `Price : ${element.Price}`;
        let Possibility_1 = document.createElement("p");
        Possibility_1.classList.add("Possibility_1");
        Possibility_1.innerHTML = `Possibility : ${element.Possibility}`;
        let Photo_1 = document.createElement("img");
        Photo_1.classList.add("Photo_1");
        Photo_1.src = element.Photo ;
        Photo_1.width = 100 ;
        Photo_1.alt = "sorry" ;
        let botona_delete = document.createElement("button");
        botona_delete.classList.add("botona_delete");
        botona_delete.innerHTML = `delete`;
        botona_delete.addEventListener("click",function()
        {
          list.splice(index,1);
          localStorage.setItem("gohst",JSON.stringify(list));
          my_bebeliotica();
          tamane();
        });
        let botona_QUICK = document.createElement("button");
        botona_QUICK.classList.add("botona_QUICK");
        botona_QUICK.innerHTML = `RETURN`;
        botona_QUICK.addEventListener("click",function()
        {
          element.Possibility = "SOLD_OUT!" ;
          my_bebeliotica();
          tamane()
        });
        let botona_JOIN = document.createElement("button");
        botona_JOIN.classList.add("botona_JOIN");
        botona_JOIN.innerHTML = `ADD`;
        botona_JOIN.addEventListener("click",function()
        {
          element.Possibility = "AVAILEBEL!" ;
          my_bebeliotica();
          tamane();
        });
        if(element.Possibility === "SOLD_OUT!")
        {
          ibn.style.backgroundColor = "rgb(255, 154, 154)";
        }
        else if(element.Possibility === "AVAILEBEL!")
        {
          ibn.style.backgroundColor = "rgb(160, 255, 168)";
        }
        ibn.appendChild(name_1);
        ibn.appendChild(Author_1);
        ibn.appendChild(Year_1);
        ibn.appendChild(Price_1);
        ibn.appendChild(Possibility_1);
        ibn.appendChild(Photo_1);
        ibn.appendChild(botona_delete);
        ibn.appendChild(botona_QUICK);
        ibn.appendChild(botona_JOIN);
        result.appendChild(ibn);
    });
}

let bar_search = document.getElementById("bar");
bar_search.addEventListener("input",function()
{
 let bar_search_txt = bar_search.value.toLowerCase();
 let peace = bebeliotica.filter(item => item.name.toLowerCase().includes(bar_search_txt) || String(item.year).toLowerCase().includes(bar_search_txt) );
 my_bebeliotica(peace);
});


function tamane()
{
    let taman_1 = document.getElementById("taman");
    taman_1.innerHTML = ``;
    
    let TOTAL_PRICES = bebeliotica.reduce((item,sum) => Number(sum + item.price) , 0);
    let MAX_PRICE = bebeliotica.reduce((item1,item2) => Number(item1.price) >  Number(item2.price) ? item1 : item2 );
    let AVERAGE_prices = (TOTAL_PRICES/bebeliotica.length).toFixed(2);
    let count = 0 ;
    bebeliotica.forEach( item => {
       if(item.Possibility === "AVAILEBEL!")
       {
         count++;
       }
    });   
    let  TOTAL_PRICES_1 = document.createElement("p");
    TOTAL_PRICES_1.innerHTML = `${TOTAL_PRICES}` ;
    let  MAX_PRICE_1 = document.createElement("p");
    MAX_PRICE_1.innerHTML = `${MAX_PRICE.price}` ;
    let  AVERAGE_prices_1 = document.createElement("p");
    AVERAGE_prices_1.innerHTML = `${AVERAGE_prices}` ;
    let  TOTAL_AVAILEBEL_1 = document.createElement("p");
    TOTAL_AVAILEBEL_1.innerHTML = `${count}` ;
    taman_1.appendChild(TOTAL_PRICES_1);
    taman_1.appendChild(MAX_PRICE_1);
    taman_1.appendChild(AVERAGE_prices_1);
    taman_1.appendChild(TOTAL_AVAILEBEL_1);


}




my_bebeliotica();
tamane();
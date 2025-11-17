let bebeliotica = [] ;

let el_owner = document.getElementById("result");
let Storage_1 = JSON.parse(localStorage.getItem("ghost")) || [];
bebeliotica.push(...Storage_1);
function function_bebeliotica()
{
    el_owner.innerHTML = ``;
    list.forEach((index,element) => 
    {
        let card = document.createElement("div");
        card.classList.add("card");
        card.innerHTML = ``;
        let name_1 = document.createElement("p");
        name_1.classList.add("name_1");
        name_1.innerHTML = `the name is ${element.name}`;
        let price_1 = document.createElement("p");
        price_1.classList.add("price_1");
        price_1.innerHTML = `the name is ${element.price}`;
        let possibility_1 = document.createElement("p");
        possibility_1.classList.add("possibility_1");
        possibility_1.innerHTML = `the name is ${element.possibility}`;
        let photo_1 = document.createElement("p");
        photo_1.classList.add("photo_1");
        photo_1.innerHTML = `the name is ${element.photo}`;
        let butona = document.createElement("button");
        butona.classList.add("butona");
        butona.innerHTML = `delete`;
        butona.addEventListener("click",function()
        {
           list.splice(index,1);
           localStorage.setItem("ghost",JSON.stringify(bebeliotica));
           function_bebeliotica();
           taman();
        });
        let butona_ON = document.createElement("button");
        butona_ON.classList.add("butona_ON");
        butona_ON.innerHTML = `ON`;
        butona_ON.addEventListener("click",function()
        {
           item.possibility = "kayn";
           function_bebeliotica();
           taman();
        });
        let butona_OFF = document.createElement("button");
        butona_OFF.classList.add("butona_OFF");
        butona_OFF.innerHTML = `OFF`;
        butona_OFF.addEventListener("click",function()
        {
           item.possibility = "makaynch";
           function_bebeliotica();
           taman();
        });
        if(item.possibility === "kayn")
        {
            card.style.background = "rgb(203, 255, 196)";
        }
        else if(item.possibility === "makaynch")
        {
            card.style.background = "rgb(255, 168, 168)";
        }
        card.appendChild(name_1);
        card.appendChild(price_1);
        card.appendChild(possibility_1);
        card.appendChild(butona);
        card.appendChild(butona_ON);
        card.appendChild(butona_OFF);
        card.appendChild(photo_1);
        el_owner.appendChild(card);
    });
    
}

let search_bar = document.getElementById("bar");
search_bar.addEventListener("input",function()
{
  let searsh_bar_txt = search_bar.value.toLowerCase();
  let filter_1 = bebeliotica.filter(item => item.name.toLowerCase().include(searsh_bar_txt));
  function_bebeliotica(filter_1);
});

function taman()
{
    let tamann_1 = document.getElementById("tamann");
    tamann_1.innerHTML = ``;
    let max_price = bebeliotica.reduce((a,b) => Number(a.price) > Number(b.price) ? a : b)
    let total = bebeliotica.reduce((sum , item ) => sum + Number(item.price) , 0 )
    let average = (total / bebeliotica.length).toFixed(2);
    let count_kayn = 0 ;
    bebeliotica.forEach(item => {
        if( item.possibility === "makaynch")
        {
            count_kayn++;
        }
    });
    let max_price_1 = document.getElementById("p");
    max_price_1.classList.add("max_price_1");
    max_price_1.innerHTML = `the max price is ${max_price.price}`;
    let total_1 = document.getElementById("p");
    total_1.classList.add("total_1");
    total_1.innerHTML = `the total price is ${total}`;
    let average_1 = document.getElementById("p");
    average_1.classList.add("average_1");
    average_1.innerHTML = `the average price is ${average}`;
    tamann_1.appendChild(max_price_1);
    tamann_1.appendChild(total_1);
    tamann_1.appendChild(average_1);
}
function_bebeliotica();
taman();
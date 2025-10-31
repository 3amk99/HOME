let bebeliotica = [] ;

let Container = document.getElementById("Boss");
let collection = JSON.parse(localStorage.getItem("taker")) || [] ;

bebeliotica.push(...collection);
function my_bebeliotica()
{
    Container.innerHTML = '' ;
    bebeliotica.forEach((item,index) => 
    {
        let container = document.createElement("div");
        container.classList.add("container");

        let name_ = document.createElement("p");
        name_.classList.add("name");
        name_.innerHTML = `the name is ${item.name}`;

        let last_name_ = document.createElement("p");
        last_name_.classList.add("last_name");
        last_name_.innerHTML = `the name is ${item.last_name}`;

        let class_ = document.createElement("p");
        class_.classList.add("classe");
        class_.innerHTML = `the name is ${item.classe}`;

        let tax_ = document.createElement("p");
        tax_.classList.add("tax_");
        tax_.innerHTML = `the tax is ${item.Monney}`;

        let possibility_ = document.createElement("p");
        possibility_.classList.add("possibility_");
        possibility_.innerHTML = ` ${item.possibility}`;

        let photo_ = document.createElement("img");
        photo_.classList.add("photo");
        photo_.src = item.photo;
        photo_.width = 100 ;

        let boton = document.createElement("button");
        boton.classList.add("boton");
        boton.innerHTML = `Delete`;
        
        boton.addEventListener("click" , 
        function()  
        {
            bebeliotica.splice(index,1);
            localStorage.setItem("taker",JSON.stringify(bebeliotica));
            my_bebeliotica();
        }
        );

        let botona_OFF = document.createElement("button");
        botona_OFF.classList.add("botona_OFF");
        botona_OFF.innerHTML = "Quick" ;

        botona_OFF.addEventListener("click" , 
        function()  
        {
            item.possibility = "not qualifeid";
            my_bebeliotica();
        }
        );


        let botona_ON = document.createElement("button");
        botona_ON.classList.add("botona_ON");
        botona_ON.innerHTML = "Join" ;

        botona_ON.addEventListener("click" , 
        function()  
        {
            item.possibility = "qualifeid";
            my_bebeliotica();
        }
        );

        container.appendChild(name_);
        container.appendChild(last_name_);
        container.appendChild(class_);
        container.appendChild(photo_);
        container.appendChild(boton);
        container.appendChild(possibility_);
        container.appendChild(tax_);
        container.appendChild(botona_ON);
        container.appendChild(botona_OFF);



        Container.appendChild(container);
     
    });
}

function prices()
{
    let total_taxes = bebeliotica.reduce( (sum , item) => sum + Number(item.Monney) , 0 );
    let max_taxes = bebeliotica.reduce((item1 , item2) => Number(item1.Monney) > Number(item2.Monney) ? item1 : item2);
    let average = (total_taxes / bebeliotica.length).toFixed(2) ;
}

my_bebeliotica();


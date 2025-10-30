let bebeliotica = [] ;
let Container = document.getElementById("Boss");
let collection = JSON.parse(localStorage.getItem("taker")) || [] ;
bebeliotica.push(...collection);
function my_bebeliotica()
{
    Container.innerHTML = '' ;
    bebeliotica.forEach(item => 
    {
        let container = document.createElement("div");
        container.classList.add("container");

        let name_ = document.createElement("p");
        name_.classList.add("name");
        name_.innerHTML = `the name is ${name.item}`;

        let last_name_ = document.createElement("p");
        last_name_.classList.add("last_name");
        last_name_.innerHTML = `the name is ${last_name.item}`;

        let class_ = document.createElement("p");
        class_.classList.add("classe");
        class_.innerHTML = `the name is ${classe.item}`;

        let photo_ = document.createElement("img");
        photo_.classList.add("photo");
        photo_.innerHTML = `the name is ${photo.item}`;

        let boton = document.createElement("button");
        boton.classList.add("boton");
        boton.innerHTML = `Delete`;
        
        boton.addEventListener("click" , 
        function()  
        {
            bebeliotica.splice(index,1);
            my_bebeliotica();
        }
        );
     
    });
}
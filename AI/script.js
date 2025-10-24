let library = [
  { title: "Ab Rani Ab Fakir", code: 1, autor: "Li", year: "2021", price: 22, possibility: "not borrowed", photo: "lawla.jpg", message: "sorry....1" },
  { title: "BOK11", code: 2, autor: "John", year: "2009", price: 20, possibility: "borrowed", photo: "tanya.jpg", message: "sorry....2" },
  { title: "MalconW", code: 3, autor: "Jack", year: "1995", price: 30, possibility: "not borrowed", photo: "talta.jpg", message: "sorry....3" },
];


let jami3 = document.getElementById("list");

function renderlibrary() {
  jami3.innerHTML = "";

  library.forEach((item, index) => {
    let ibn = document.createElement("div");
    ibn.classList.add("card");

    let tswira = document.createElement("img");
    tswira.src = item.photo;
    tswira.alt = item.message;

    let title_A = document.createElement("p");
    title_A.classList.add("title_A");
    title_A.innerHTML = `Title: ${item.title}`;

    let code_A = document.createElement("p");
    code_A.innerHTML = `Code: ${item.code}`;

    let author_A = document.createElement("p");
    author_A.innerHTML = `Author: ${item.autor}`;

    let year_A = document.createElement("p");
    year_A.innerHTML = `Year: ${item.year}`;

    let price_A = document.createElement("p");
    price_A.innerHTML = `Price: ${item.price} DH`;

    let status_A = document.createElement("p");
    status_A.innerHTML = `Status: ${item.possibility}`;

    let botona = document.createElement("button");
    botona.innerHTML = "Delete";
    botona.addEventListener("click", function () {
      library.splice(index, 1);
      renderlibrary();
      updateFooter();
    });

    ibn.append(tswira, title_A, code_A, author_A, year_A, price_A, status_A, botona);
    jami3.appendChild(ibn);
  });
}

function updateFooter() {
  let foter = document.getElementById("foter_number");
  foter.innerHTML = "";

  let availableCount = library.filter(item => item.possibility === "not borrowed").length;
  let total_price = library.reduce((sum, item) => sum + item.price, 0);
  let average = (total_price / library.length).toFixed(2);
  let expensive = library.reduce((a, b) => (a.price > b.price ? a : b));

  foter.innerHTML = `
    <p>Total books: ${library.length}</p>
    <p>Available books: ${availableCount}</p>
    <p>Total price: ${total_price} DH</p>
    <p>Average price: ${average} DH</p>
    <p>Most expensive: ${expensive.title} (${expensive.price} DH)</p>
  `;
}

renderlibrary();
updateFooter();

function openPopup() {
    document.getElementById("overlay").style.display = "block";
  }

  function closePopup() {
    document.getElementById("overlay").style.display = "none";
  }

  function addPerson() {
    let name = document.getElementById("name").value;
    let family = document.getElementById("family").value;

    if (name && family) {
      let resultDiv = document.getElementById("result");
      resultDiv.innerHTML += `<p><strong>${name}</strong> ${family}</p>`;
      closePopup();
      document.getElementById("name").value = "";
      document.getElementById("family").value = "";
    } else {
      alert("Please enter both name and family name.");
    }
  }
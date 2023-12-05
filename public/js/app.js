
document.addEventListener('DOMContentLoaded', () => {

    console.log("Y - Clon de Twitter");

    const tabs = document.querySelectorAll('.tabs');

    if(tabs.length > 0) {
        M.Tabs.init(tabs, {swipeable:true});
    }

    //mostrarSpinner(true);
    getTweetsByUser("frangv");

});

const mostrarSpinner = (param) => {
    if(param) {
        document.getElementById("spinner").style.display = "block"; 
    } else {
        document.getElementById("spinner").style.display = "none";
    }
}

const getTweetsByUser = (userName) => {
    mostrarSpinner(true);
    fetch(`http://localhost:8000/${userName}/tweets/`).then(res => {
        mostrarSpinner(false);
        res.json().then(data => {
            console.log(data);
        });
    }).catch(error => {
      mostrarSpinner(false);
      console.error("error en la consulta: " + error);
    });
}

const countCharacters = (idInput, idCounter, maxChars) => {
    let currentInput = document.getElementById(idInput);
    let currentCounter = document.getElementById(idCounter);
    let numOfEnteredChars = currentInput.value.length;
    let counter = maxNumOfChars - numOfEnteredChars;
    currentCounter.textContent = counter;
};
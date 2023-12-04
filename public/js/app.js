
document.addEventListener('DOMContentLoaded', () => {

    console.log("Y - Clon de Twitter");

    const tabs = document.querySelectorAll('.tabs');

    if(tabs.length > 0) {
        M.Tabs.init(tabs, {});
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
        console.log(data);
        res.json().then(data => {
            console.log(data);
        });
    }).catch(error => {
      mostrarSpinner(false);
      console.error("error en la consulta: " + error);
    });
  }
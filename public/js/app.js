
document.addEventListener('DOMContentLoaded', () => {

    console.log("Y - Clon de Twitter en " + location.origin);

    const tabs = document.querySelectorAll('.tabs');

    if(tabs.length > 0) {
        M.Tabs.init(tabs, {});
    }

    //mostrarSpinner(true);
    //getTweetsByUser("frangv");
    countCharacters();

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
    fetch(`${location.origin}/${userName}/tweets`)
    .then(res => {
        return res.json();
    }).then(data => {
        mostrarSpinner(false);
        console.log(data);
    }).catch(error => {
      mostrarSpinner(false);
      console.error("error en la consulta: " + error);
    });
}

const countCharacters = () => {
    let currentInput = document.getElementById("tweet-input");
    let currentCounter = document.getElementById("char-counter");
    let enteredChars = currentInput.value.length;
    if(enteredChars)
    currentCounter.textContent = enteredChars + "/280";
    if(enteredChars >= 280) {
        currentCounter.style.color = "red";
    } else {
        currentCounter.style.color = "inherit";
        if(enteredChars > 0) {
            document.getElementById("post-btn").disabled = false;
        } else {
            document.getElementById("post-btn").disabled = true;
        }
    }
};

const addTweet = () => {
    if(!document.getElementById("tweet-input").value
    || (document.getElementById("tweet-input").value
    && document.getElementById("tweet-input").value.trim()  === "")) {
        return;
    }
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    mostrarSpinner(true);
    fetch(`${location.origin}/postTweet`, {
        method: "POST",
        body: JSON.stringify({
            content: document.getElementById("tweet-input").value
        }),
        headers: {
            "Content-type": "application/json; charset=UTF-8",
            "X-CSRF-TOKEN": csrfToken
        }
    })
    .then((response) => response.json())
    .then((data) => {
        mostrarSpinner(false);
        console.log(data)
        let htmlText = document.getElementById("my-tweets").innerHTML;
        console.log(htmlText);
        let addElems = "";
        addElems += `<li class="collection-item">
                        <p>${data.content}</p>
                        <small>Publicado: ${data.created_at}</small>
                    </li>`;
        addElems += htmlText;
        document.getElementById("my-tweets").innerHTML = addElems;
        document.getElementById("value-input").value = "";
    })
    .catch(error => {
        mostrarSpinner(false);
        console.error("error en la consulta: " + error);
    });
    // fetch(`${location.origin}/postTweet`)
    // .then(res => {
    //     return res.json();
    // })
    // .then(data => {
    //     console.log(data);
    //     
    // })
    // .catch(error => {
    //     console.error("error en la consulta: " + error);
    // });
}





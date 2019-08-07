const getAllMessagesButton = document.getElementById("getallmessages");
getAllMessagesButton.addEventListener("click", getDataAllMessages);

function getAllMessages() {
    getData();
}
async function getDataAllMessages() {
    let api = `http://localhost:8888/api.php`;
    let response = await axios.get(api);
    searchMessagesInAPI(response);
}

function searchMessagesInAPI(messages) {
    let messageData = messages.data;
    for (let i = 0; i < messageData.length; i++) {
        insertMessageDataToDom(messageData[i].message_text);
    }
}

function insertMessageDataToDom(domElements) {
    let messageDisplayParagraph = document.querySelector(".allmessages");
    var para = document.createElement("p");
    var newPara = messageDisplayParagraph.appendChild(para);
    newPara.innerHTML = domElements;
}

const getSpecificMessageButton = document.querySelector(".getspecificmessage");
getSpecificMessageButton.addEventListener("click", getDataSpecificMessage);

async function getDataSpecificMessage() {
    let api = `http://localhost:8888/api.php`;
    let response = await axios.get(api);
    console.log(response);
    searchSpecificMessageApi(response);
}

function searchSpecificMessageApi(messages) {
    let searchTitle = document.querySelector(".specificmessagetitle").value;
    if (searchTitle === "") {
        console.log("fill in your title");

    } else {
        for (let i = 0; i < messages.data.length; i++) {
            if (messages.data[i].title === searchTitle) {
                insertSpecificMessageDataToDom(messages.data[i].message_text);
                return;
            } else {
                displayErrorMessage();
                return;
            }
        }
    }
}

function insertSpecificMessageDataToDom(specificMessage){
    let messageHolder = document.querySelector(".specificmessage");
    let para = document.createElement("p");
    para.className = "dynamicalspecificmessage";
    let newPara = messageHolder.appendChild(para);
    newPara.innerHTML = specificMessage;
}

function displayErrorMessage(){
    let messageHolder = document.querySelector(".specificmessage");
    let para = document.createElement("p");
    para.className = "dynamicalspecificmessage"
    let newPara = messageHolder.appendChild(para);
    newPara.innerHTML = "This title does not exist";
}
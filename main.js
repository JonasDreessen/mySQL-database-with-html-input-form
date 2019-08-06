const getAllMessagesButton = document.getElementById("getallmessages").addEventListener("click", getAllMessages);
function getAllMessages(){
    getData();
}

async function getData() {
    let api = `http://localhost:8888/servercommunication.php`;
    let response = await axios.get(api);
    searchMessagesInAPI(response);
}

function searchMessagesInAPI(messages){
    let messageData = messages.data;
    for (let i = 0; i < messageData.length; i++){
        insertMessageDataToDom(messageData[i].message_text);
    } 
}

function insertMessageDataToDom(domElements){
    let messageDisplayParagraph = document.querySelector(".allmessages");
    var para = document.createElement("p");
    var newPara = messageDisplayParagraph.appendChild(para);
    newPara.innerHTML = domElements;

}

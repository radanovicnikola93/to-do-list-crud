 // pridobi objekt datuma
let today = new Date();

// pridobi dan 
let day = today.getDate();
// v kolikor je dan < 10 dodamo pred tem 0, da bi se ujemalo z standardi formata datum
if (day < 10) {
    day = '0'+day;
}

// pridobi mesec
let month = today.getMonth()+1;
if (month < 10) {
    month = '0'+month;
}

// pridobi leto
let year = today.getFullYear();

// ustvarimo datum z ustreznim formatom
const date = year + "-" + month + "-" + day;

// DOM
// v nove spremenljike dodamo najden input datuma z ustreznim id-jem
let min = document.getElementById("date");
let value = document.getElementById("date");

// dodamo danasnji datum pod ustrezne atribute
let changeMin = min.setAttribute("min", date);
let changeValue = min.setAttribute("value", date);

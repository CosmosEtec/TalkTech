
var myInput = document.getElementById("SenhaCadastro");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

function verificar() {
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.style.color = "green";
  } else {
    letter.style.color = "white";
  }

  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.style.color = "green";
  } else {
    capital.style.color = "white";
  }

  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.style.color = "green";
  } else {
    number.style.color = "white";
  }

  if(myInput.value.length >= 8) {
    length.style.color = "green";
  } else {
    length.style.color = "white";
  }
}
verificar();
myInput.addEventListener('keyup', verificar);

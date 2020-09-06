var cards = document.querySelectorAll(".card");
var i = 0;
var j = 0;
var k = 0;
let count = 0;
let matches = 0;
let moves = 0;
var counter = 0;
let modal = document.getElementById("popup1");
var isclicked = false;
let timer;
let closeicon = document.querySelector(".close");
var flag = true;
var arr = [
  "gold",
  "white",
  "orange",
  "pink",
  "navy",
  "red",
  "blue",
  "grey",
  "yellow",
  "cyan",
  "green",
  "ruby",
  "gold",
  "white",
  "orange",
  "pink",
  "navy",
  "red",
  "blue",
  "grey",
  "yellow",
  "cyan",
  "green",
  "ruby",
];
//console.log(cards);
var underprocess = false;
var firstclicked, secondclicked;
var toggled = [];
var limit = 120;
// function to shuffle the cards
const shuffle = (array) => {
  for (let i = array.length - 1; i > 0; i--) {
    let j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
  return array;
};
//console.log(arr);
//window.onload = startGame();
startGame();
function startGame() {
  arr = shuffle(arr);
  console.log(arr);

  for (var i = 0; i < cards.length; i++) {
    card = cards[i];
    card.addEventListener("click", clickFunction);
    card.classList.add(arr[i]);
  }
}
function clickFunction() {
  flag = false;
  if (underprocess) return;
  if (firstclicked === this)
    // handling if the same card when clicked again
    return;
  myPlay();
  this.className = this.className.replace("hidden", "");
  console.log(this);
  count++;
  if (!isclicked) {
    isclicked = true;
    firstclicked = this;
    return;
  }
  secondclicked = this;
  //console.log(secondclicked);
  if (count == 2) {
    isclicked = false;
    underprocess = true;
    setTimeout(() => {
      check();
      //   console.log(toggled[0][0].id);
      count = 0;
      //  toggled = [];
      underprocess = false;
      firstclicked = "";
      secondclicked = "";
    }, 1100);
  }
}

const check = () => {
  // console.log(firstclicked.classList[2],secondclicked.classList[2]);
  if (firstclicked.classList[1] == secondclicked.classList[1]) {
    myWin();
    firstclicked.removeEventListener("click", clickFunction);
    secondclicked.removeEventListener("click", clickFunction);
    matches++;
    console.log(matches);
    changescore(matches);
    if (matches == 12) {
      congo();
      return;
    }
    // console.log(matches);
  } else {
    error();
    firstclicked.classList.add("hidden");
    secondclicked.classList.add("hidden");
  }
  moves++;
  let score = moves * 10;
  let ele = document.getElementById("score").innerHTML;
  ele = "score";
  underprocess = false;
};
function startcountdown() {
  timer = document.getElementById("timer");
  var rem = 120 - k;
  if (rem == 0) {
    congo();
    return;
  }
  timer.innerHTML = rem;
  k++;
}

startcountdown = setInterval(startcountdown, 1000);

//audio functions
function myPlay() {
  var audio = new Audio("button.mp3");
  audio.play();
}
function myWin() {
  var audio = new Audio("win.mp3");
  audio.play();
}
function error() {
  var audio = new Audio("erro.mp3");
  audio.play();
}
function changescore(matches) {
  var element = document.getElementById("scores");
  element.innerHTML = matches * 10;
  console.log(element.innerHTML);
}
function congo() {
  // console.log("here");
  clearInterval(startcountdown);
  var finalTime = timer.innerHTML;
  //console.log(finalTime);
  modal.classList.add("show");
  if (matches != 12) {
    document.getElementById(
      "message"
    ).innerHTML = `Oops! You were not able to get all the matches! Tap Play Again.`;
  }
  //closeicon on modal
  closeModal();
}
function closeModal() {
  closeicon.addEventListener("click", function (e) {
    modal.classList.remove("show");
  });
  // modal.classList.remove("show");
  restart();
}

function restart() {
  for (var i = 0; i < cards.length; i++) {
    card = cards[i];
    card.addEventListener("click", clickFunction);

    console.log("here");
    card.className = "card hidden";
  }
  timer.innerHTML = 120;
  var element = document.getElementById("scores");
  element.innerHTML = 0;
  matches = 0;
  isclicked = false;
  firstclicked = "";
  secondclicked = "";
  startGame();
} 
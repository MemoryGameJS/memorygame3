<html>

<title>Memory game</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<link rel="stylesheet" href="style.css"></link>
</head>
<body>
<image class="background" src="theme.jpg"></image>
<?php 
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
  
    echo'
 
    <h1>welcome '.$_SESSION['naam'].'</h1>
';}
else{
 echo'
<h1>no username</h1>;
        ';
    }


?>
<section class="full-page">

<!---------------------------------left-div starts ---------------------------------------------------->
<div class="left-div">
<h1>MEMORY GAME</h1>
<div class="btns">
<!-- <button><a href="login">MENU</a></button> -->
</div>
</div>
<!---------------------------------left-div ends--------- ---------------------------------------------------->



<!----------------------------------cards part starts  -------------------------------------------------------------------->
<div class="cards-box">
<div class="top-div">
    <div id="cc" class="card hidden" ></div>
    <div id="cc" class="card hidden" ></div>
    <div id="cc" class="card hidden" ></div>
    <div id="cc" class="card hidden" > </div>
    <div id="cc" class="card hidden" ></div>
    <div id="cc" class="card hidden"  ></div>
</div>
<div class="top-div">
    <div id="cc" class="card hidden" ></div>
    <div id="cc" class="card hidden" ></div>
    <div id="cc" class="card hidden" ></div>
    <div id="cc" class="card hidden" ></div>
    <div id="cc" class="card hidden" ></div>
    <div id="cc" class="card hidden" > </div>
</div>
<div class="top-div">
<div id="cc" class="card hidden" ></div>
<div id="cc" class="card hidden" ></div>
<div id="cc" class="card hidden" ></div>
<div id="cc" class="card hidden" ></div>
<div id="cc" class="card hidden" ></div>
<div id="cc" class="card hidden" ></div>
</div>
<div class="top-div">
    <div id="cc" class="card hidden" > </div>
    <div id="cc" class="card hidden"></div>
    <div id="cc" class="card hidden" ></div>
    <div id="cc" class="card hidden" ></div>
    <div id="cc" class="card hidden" ></div>
    <div id="cc" class="card hidden" ></div>
</div>
<!----------------------------------popup-winning starts  -------------------------------------------------------------------->
<div id="popup1" class="overlay">
    <div class="popup">
        <h2>Congratulations!🎉 You have finished the game.</h2>
        <a class="close" href=# >×</a>
        <div class="content-1">
       <p id="message">Congratulations you're a winner 🎉🎉</p>
        </div>
        <button id="play-again" onclick="closeModal()">
            Play again 😄</a>
        </button>
    </div>
</div>

<!----------------------------------popup-winning ends  -------------------------------------------------------------------->

<!----------------------------------popup-loosing starts  -------------------------------------------------------------------->
<div class="popup-loosing">
<h1>TRY AGAIN!!</h1>
<p>your score is : <span id="score">00</span><p>
</div>
</div>
<!----------------------------------popup-loosing starts  ------------------------------------------------------------------->

<!----------------------------------cards part ends  -------------------------------------------------------------------->

<!----------------------------------right div starts  -------------------------------------------------------------------->
<div class="right-div">
<h1>SCORE:-</h1>
<p id="scores">00<p>
<div class="time">
<h1 >TIME:-</h1>
<h4 id="timer">120</h4>
</div>
<button  id="logout" s><a href="logout.php"> LOGOUT</a></button>
</div>

<!----------------------------------right div ends  -------------------------------------------------------------------->
</div>


<script type="text/javascript" src="jquery-3.5.1.min.js.js"></script>
    <script src="script.js"></script>
</script>
</body>

</body>
</html>
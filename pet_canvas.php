<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        html, body
        {
            height: 100%;
            margin:0;
            padding:0;
        }

        .canvas
        {
            position:relative;
            height: 100%;
            width: 100%;
        }
        div img 
        {
            position:absolute;
            top:30%;
            left:0;
            right:0;
            bottom:0;
            margin:auto;
            width:10%;
        }

        #face
        {
            bottom: 65%;
            right: 0.5%;
            width: 13%;
        }
        #ears
        {
            top: -60%;
            width:13%;
        }
        #blush
        {
            top:-20%;
            left:0.5%;
            width:15%;
            display:none;
        }
        #playgif
        {
            bottom:10%;
            left: 101%;
        }
        .buttons a, .menu-buttons a {
        display: inline-block;
        font-size: 40px;
        background-color: transparent;
        border: 2px solid #131313;
        padding: 10px 20px;
        margin: 100px 20px 0px 20px;
        transition: background-color .1s;
        text-decoration: none;
        color: #131313;
        font-weight: 300;
        font-family: Arial, Helvetica, sans-serif;
        transition: background-color .1s, color .1s;
        }

        .buttons a:hover, .menu-buttons a:hover {
        background-color: #131313;
        color: #fafafa;
        }

        .buttons, .menu-buttons {
        width: 100%;
        text-align: center;
        }
    </style>

    <script>
        $(document).ready(function () {
            $("#playgif").hide();
        });
    </script>
</head>

<body>
    <div class='canvas' id='canvas' name='canvas'>
        <img src='images/neutral/neutral_body.png' id='body'/>
        <div class='head' id='head' name='head'>
            <img src='images/neutral/neutral_face.png' id='face' />
            <img src='images/neutral/neutral_ears.png' id='ears'/>
            <img src='images/blush.png' id='blush'/>
        </div>
    </div>
    <div class='playgif' id='playgif' name='playgif'>
        <img class='playgif' src='images/neutral/pet_neutral.gif' id='playgif' />
    </div>
    <div class='buttons' id='buttons' name='buttons'>
        <a href="#" id="action-play">Play</a>
    </div>
</body>

<script>
    const playBtn = document.querySelector("#action-play");

    const maxPlay = 50;
    let day = 20;

    var left = false;

    function Tamagotchi()
    {
        this.play = maxPlay;
    }
    Tamagotchi.prototype.actionPlay = function() 
    {
        this.play+=8 / (day * 2)
    //INSTEAD ANIMATE GIF SLIDING ONTO SCREEN< IDLY PAUSING< SLIDING AWAY
        $('#blush').fadeIn(3000);
        $('#blush').fadeOut(3000);

        if(left == false)
        {
            $('#playgif').show();
            $('.playgif').animate({left:'-110%'},5000);
            left = true;
        }
        else{
            $('#playgif').show();
            $('.playgif').animate({right:'-220%'},5000);
            left = false;
        }
    };


    let tmgch = new Tamagotchi();

    playBtn.addEventListener("click", function() 
    {
        tmgch.actionPlay();
    });
</script>
</html>
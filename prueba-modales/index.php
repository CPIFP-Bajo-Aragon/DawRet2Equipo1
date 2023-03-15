<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/modal.css">
    <title>Document</title>
</head>
<body>
    


<div class="container">

    <div class="flex-box">
        <div class="pauta activa"><button name="0" onclick="change_conclusion(this)">C.1</button></div>
        <div class="pauta"><button name="1" onclick="change_conclusion(this)">C.2</button></div>
        <div class="pauta"><button name="2" onclick="change_conclusion(this)">C.3</button></div>
        <div class="pauta"><button name="3" onclick="change_conclusion(this)">C.4</button></div>
        <div class="pauta"><button name="4" onclick="change_conclusion(this)">C.5</button></div>


    </div>

    <div id="conclusion_0" class="ventana">

        <h1>Titulo 1</h1>

        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam deserunt laudantium labore, enim non aliquid, perspiciatis consequatur a explicabo, delectus architecto sequi in nisi iure cum expedita possimus quae! Velit!</p>

    </div>

    <div id="conclusion_1" class="oculto">

        <h1>Titulo 2</h1>

        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam deserunt laudantium labore, enim non aliquid, perspiciatis consequatur a explicabo, delectus architecto sequi in nisi iure cum expedita possimus quae! Velit!</p>

    </div>

    <div id="conclusion_2" class="oculto">

        <h1>Titulo 3</h1>

        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam deserunt laudantium labore, enim non aliquid, perspiciatis consequatur a explicabo, delectus architecto sequi in nisi iure cum expedita possimus quae! Velit!</p>

    </div>

    <div id="conclusion_3" class="oculto">

        <h1>Titulo 4</h1>

        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam deserunt laudantium labore, enim non aliquid, perspiciatis consequatur a explicabo, delectus architecto sequi in nisi iure cum expedita possimus quae! Velit!</p>

    </div>

    <div id="conclusion_4" class="oculto">

        <h1>Titulo 5</h1>

        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam deserunt laudantium labore, enim non aliquid, perspiciatis consequatur a explicabo, delectus architecto sequi in nisi iure cum expedita possimus quae! Velit!</p>

    </div>


</div>


<script>

    function change_conclusion(element){

        objetivo = element.name;
        
        pauta = document.getElementsByClassName("activa");
        pauta[0].classList.remove("activa");
        element.classList.add("activa");


        conclusion = document.getElementsByClassName("ventana");
        alert(conclusion[0]);
        conclusion[0].classList.remove("ventana");
        conclusion[0].classList.add("oculto");

        alert(objetivo);

        actual = document.getElementById("conclusion_"+objetivo);
        actual.classList.add("ventana");
        actual.classList.remove("oculto");
        


    }





</script>





</body>
</html>
<?php
// my key  7e283755e6548ac83457f1ccdae6f1f4  

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>

    <!-- jquerylink -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body style="color:red; background-color:aquamarine" >
    <input type="text" id="in">
    <button type="submit" onclick="findip()"></button>
    <div id="out">

    </div>

    <!-- displaying the city wheather tempreture  -->
 <div class="container">
        <p> city ::<span id="city"></span></p>
        <p>wheather::<span id="wheather"></span></p>
        <p>tempreture::<span id="temp"></span> </p>

    </div>


    <script>
        var city = '';

        //  code for geeting device ip address   


        $.get("https://ipapi.co/json", function(data) {
            document.getElementById("out").innerHTML = "ip:" + data.ip + "city:" + data.city;

            city = data.city;

            // openweather api 

            var api_url = "https://api.openweathermap.org/data/2.5/weather?q=" + city + ',IN' + "&units=metric&appid=7e283755e6548ac83457f1ccdae6f1f4";


            // getting data from json file 

            $.getJSON(api_url, function(wdata) {
                var myweather = wdata.weather[0].description;
                var tempreture = wdata.main.temp;


                // updating the displayed vlue as per ip address 

                $('#wheather').text(myweather);
                $('#temp').text(tempreture);
                $('#city').text(city);

       //background-color according to tempreture

                var body = $('body');
                if(tempreture>30){
                    body.css('background-color','orange');
                }


              

            })

           



        })

        
    </script>




</body>

</html>


































?>

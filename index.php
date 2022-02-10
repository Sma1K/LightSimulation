<!DOCTYPE HTML>
<html>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<button style="margin: 24px;" class="btn btn-success" onclick="countdownTimeStart()">Start Timer</button>
<h3 style="margin-left: 24px;" id="countdown"></h3>
<h3 style="margin-left: 24px;" id="php_test">SCORE 0:0</h3>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">time</th>
        <th scope="col">side</th>
        <th scope="col">player</th>
        <th scope="col">event</th>
    </tr>
    </thead>
    <tbody id="tbody_soc">

    </tbody>
</table>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    var score1 = 0;
    var score2 = 0;
    function countdownTimeStart(){
        var timer2 = "1:00";
        var interval = setInterval(function() {
            var timer = timer2.split(':');
            var minutes = parseInt(timer[0], 10);
            var seconds = parseInt(timer[1], 10);
            --seconds;
            minutes = (seconds < 0) ? --minutes : minutes;
            if (minutes < 0) clearInterval(interval);
            seconds = (seconds < 0) ? 59 : seconds;
            seconds = (seconds < 10) ? '0' + seconds : seconds;
            $('#countdown').html(minutes + ':' + seconds);
            if (minutes < 0) clearInterval(interval);
            if ((seconds <= 0) && (minutes <= 0)) clearInterval(interval);
            timer2 = minutes + ':' + seconds;
            getSoccerData()
        }, 1000);
    }

    function getSoccerData(){
        $.ajax({
            url: "soccer.php",
            cache: false,
            // если всё хорошо, отправляем ответ от сервера на страницу в блок content
            success: function(html){
                $("#tbody_soc").append(html);

                if((html.indexOf('goal') > -1) && (html.indexOf('left_team') > -1)){
                    score1 += 1;
                    $("#php_test").html('SCORE ' +score1 + ':' + score2);
                }
                if((html.indexOf('goal') > -1) && (html.indexOf('right_team') > -1)){
                    score2 += 1;
                    $("#php_test").html('SCORE ' + score1 + ':' + score2);
                }
            }
        });
    }
</script>

</body>
</html>
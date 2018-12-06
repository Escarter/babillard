@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <img src="/img/babillardcm_logo.png" class="img-fluid" alt="">
                    <p class=" m-2  text-center text-secondary" style="font-size:1.7rem !important;" >Site will be available in</p>
                    <h1 id="counter" class=" m-2  text-center" style="font-size:4.7rem !important;"></h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
//Get the server time
var xmlHttp;
function srvTime(){
    try {
        //FF, Opera, Safari, Chrome
        xmlHttp = new XMLHttpRequest();
    }
    catch (err1) {
        //IE
        try {
            xmlHttp = new ActiveXObject('Msxml2.XMLHTTP');
        }
        catch (err2) {
            try {
                xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
            }
            catch (eerr3) {
                //AJAX not supported, use CPU time.
                alert("AJAX not supported");
            }
        }
    }
    xmlHttp.open('HEAD',window.location.href.toString(),false);
    xmlHttp.setRequestHeader("Content-Type", "text/html");
    xmlHttp.send('');
    return xmlHttp.getResponseHeader("Date");
}


    var myDate="07-01-2019";
    myDate=myDate.split("-");
    var newDate=myDate[1]+","+myDate[0]+","+myDate[2];

    // Set the date we're counting down to
    var countDownDate = new Date(newDate).getTime();

    // Update the count down every 1 second
    var x = setInterval(function () {

        var st = srvTime();
        // Get todays date and time
        var now = new Date(st).getTime();
        // console.log(now)

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("counter").innerHTML = days + "d:  " + hours + "h: " +
            minutes + "m:  " + seconds + "s  ";

        // // If the count down is over, write some text
        // if (distance < 0) {
        //     //clearInterval(x);
        //     location.href = '/employee/dashboard';
        //     document.getElementById("counter").innerHTML = "Redirect....";
        // }
    }, 1000);
</script>
@stop

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Waiting...</title>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-103077197-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-103077197-2');
    </script>
  </head>
  <body>

      <div class="container">


          <div class="offset-md-3 col-md-6">

              <div class="spacer">

                  <h1 class="question-text">... is it over 9000?</h1>


                  <h1 id="welcome-text" class="welcome-text">Nope</h1>

                  <h1 id="current-price" class="current-price-below"></h1>

                  <h1 class="description-text">Price is updated every 9001 milliseconds (9.1 seconds), sound clip will play when price is over $9000.</h1>


              </div>

          </div>

          <div class="footer">

              <h1 class="footer-text footer-right-space"><a href="https://twitter.com/thatguyastro" style="color: white"><i class="fa fa-twitter"></i> @ThatGuyAstro</a></h1>
              <h1 class="footer-text"><i class="fa fa-bitcoin"></i> Buy me a coffee: 15aFFZB8HGstcNWvRnZxrMdw3fuAaeg6ZC</h1>

          </div>

      </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- And this is where the magic happens -->
    <script>

        function main() {1

            $.getJSON( "https://api.coindesk.com/v1/bpi/currentprice.json", function( data ) {

                var played = false;

                var price = data.bpi.USD.rate;

                $('#current-price').text("$" + price);

                if(price > 9000) {

                    //It's over 9000!!!!!!
                    document.title = "IT'S OVER 9000!!!!!!!!!!!!";
                    $('#current-price').addClass('current-price-above');
                    $('#welcome-text').text('ITS OVER 9000!!!11!!!!');

                    if(played == false) {

                        var audio = new Audio('{{ asset("resources/over9000.mp3") }}');
                        audio.play();

                        played = true;

                    }

                } else {

                    // :(

                    document.title = "Almost... $" + price;
                    $('#current-price').addClass('current-price-below');
                    $('#welcome-text').text("Nope");


                }

            });
        }

        main();

        (function loop() {
          setTimeout(function () {

                main();


            loop()
        }, 9001);
        }());

    </script>

  </body>
</html>

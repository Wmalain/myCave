<footer>
<div class="divfoot">
<ul class="footlist">
    <li class="lifoot"><i class="fab fa-facebook-f"></i></li>
    <li class="lifoot"><i class="fab fa-twitter"></i></li>
    <li class="lifoot"><i class="fab fa-linkedin-in"></i></li>
</ul>

<!-- <img class="imgfoot" src="./asset/img/bandeau.jpg" alt=""> -->
</div>
<p class="footp">Site factice fait pour un projet de la formation developpeur web fullstack à Talis</p>
</footer>
<script type="text/javascript" src="js/carousel.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script type="text/javascript" src="asset/lib/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script>

$('.carousel').slick({
 
 dots: false,
 infinite: true,
 speed: 300,
 autoplaySpeed: 100,
 slidesToShow: 3,
 slidesToScroll: 1,
 mobileFirst:true,
 
 responsive: [
   {
     breakpoint: 1024,
     settings: {
       slidesToShow: 3,
       slidesToScroll: 1,
       infinite: true,
       dots: false,
     }
   },
   {
     breakpoint: 600,
     settings: {
       slidesToShow: 2,
       slidesToScroll: 1,
       infinite: true,
       dots: false,
     }
   },
   {
     breakpoint: 200,
     settings: {
       slidesToShow: 1,
       slidesToScroll: 1,
       infinite: true,
       dots: false,
     }
   }
   // You can unslick at a given breakpoint now by adding:
   // settings: "unslick"
   // instead of a settings object
 ]
});

</script>

</body>
</html>
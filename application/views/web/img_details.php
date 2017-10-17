<section class="single-gallery">
    <div class="container">

        <div class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> الألبوم</h3>
                </div>
                <div class="panel-body">

                    <?php foreach($records4 as $record):
                        $photo=unserialize($record->img);
                    endforeach ; ?>
                    <div class="col-xs-12 r-sm">
                    <?php  for($x=0;$x<count($photo);$x++){?>
                        <div class="col-sm-4">
                            <img src="<?php echo  base_url()."uploads/images/".$photo[$x];?>"   onclick="openModal();currentSlide(<?php  echo $x?>)" class="hover-shadow r-img">
                        </div>

                        <?php } ?>

                        <div id="myModal" class="modal">
                            <span class="close cursor" onclick="closeModal()">&times;</span>
                            <div class="modal-content">
                                <?php for ($x=0;$x<sizeof($photo);$x++ ) {?>
                                    <div class="mySlides">
                                        <img src="<?php echo  base_url()."uploads/images/".$photo[$x];?>"  class="cente-block r-img-1">
                                    </div>
                                <?php } ?>
                                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                            </div>
                        </div>






                </div>

            </div>






        </div>
    </div>
</section>

<!--------------- up photo -------------->
<script>
    function openModal() {
        document.getElementById('myModal').style.display = "block";
    }
    function closeModal() {
        document.getElementById('myModal').style.display = "none";
    }
    var slideIndex = 1;
    showSlides(slideIndex);
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }
    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
</script>
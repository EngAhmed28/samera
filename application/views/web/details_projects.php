<!-- start news  -->
<section id="projects">
    <div class="container no-padding">
        <h4 class="heading">أخر المشاريع</h4>
        <div class="col-xs-12">
            <div class="col-md-7 col-sm-7 ">
                <a href="">
                    <h3 class="r-h3"><?php echo $result['title']?></h3>
                    <h6 class="r-h6"><?php echo $result['date']?></h6>
                    <?php  $photo=unserialize($result['image']);?>
                    <img src="<?php echo  base_url()."uploads/images/".$photo[0];?>"   alt="" class=" r-img-2">
                </a>
                <p class="r-p"><?php echo $result['content']?> </p>
                <div class="col-xs-12 r-sm">
                    <?php for ($x=1;$x<sizeof($photo);$x++ ) {?>
                        <div class="col-sm-6">
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
            <div class="col-md-1 col-sm-0"></div>
            <div class="col-md-4 col-sm-5">
                <div class="text-center">
                    <h3 class="r-h2"> مشاريع تهمك</h3>
                </div>
                <div class="col-xs-12 box r-xs1">
                    <?php
                    if(!empty($other_projects)):
                    foreach ($other_projects as $row){?>
                        <div class="col-xs-12 r-xs">
                            <div class="r-titel col-md-4 col-sm-4 col-xs-4">
                                <?php  $photo=unserialize($row->image);  ?>
                                <img src="<?php echo  base_url()."uploads/images/".$photo[0];?>"  alt="">
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <a href="<?php echo base_url()."Web/project_details/".$row->id."/".$row->type?>" class="r-a"><?php echo $row->title?></a>
                            </div>
                        </div>
                    <?php }  endif;?>
                </div>
            </div>
        </div>
    </div>
</section>
<!----------------------------->
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
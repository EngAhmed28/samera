<!-- start news  -->
<section class="words">
    <div class="container">
        <div class="">

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">الملف الصحفي</h3>
                </div>
                <div class="panel-body">

                    يعنى هذا الجزء من الموقع بعرض ما ورد عن الجمعية في الصحف المحلية حيث يتم جمعها في مكان واحد ليسهل على القارئ الكريم الاطلاع عليها بسهولة



                </div>
            </div>
        </div>
    </div>
</section>





<section id="news">
    <div class="container no-padding">
        <h4 class="heading">أخر الأخبار</h4>
        <ul id="myList" class="list-unstyled">
            <!------------------------------------------------------------------------------------------------------>
            <?php
            if(isset($records) && $records!=null && !empty($records)){
                foreach($records as $record):
                    $photo=unserialize($record->image);

                    ?>
                    <li class="col-md-4 col-sm-6 col-xs-12 padding-3 ">
                        <div class="news">
                            <div class="col-sm-4 col-xs-12 poster padding-3">
                                <a href="<?php echo  base_url()."Web/details/".$record->id?>">
                                    <img src="<?php echo  base_url()."uploads/images/".$photo[0];?>" alt=""></a>
                            </div>
                            <div class="poster-details col-sm-8 padding-3">
                                <a href="<?php echo  base_url()."Web/details/".$record->id?>"> <h2><?php echo $record->title ?> </h2></a>
                                <p class="date"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $record->date ?> </p>
                                <p> <?php echo word_limiter($record->content,10) ?> </p>
                            </div>
                        </div>
                    </li>

                <?php endforeach;}?>
            <!------------------------------------------------------------------------------------------------------>
        </ul>
        <div class="col-xs-12 text-center">
            <button class="btn btn-load" id="loadMore">مشاهدة أكثر</button>
            <!--<button class="btn btn-load" id="showLess">مشاهدة أقل</button>-->

        </div>
    </div>


</section>


<script>
    $(document).ready(function () {
        $('#myList li').append('<div class="clearfix"></div>');
        size_li = $("#myList li").size();
        x=9;
        $('#myList li:lt('+x+')').show();
        $('#loadMore').click(function () {
            x= (x+6 <= size_li) ? x+6 : size_li;
            $('#myList li:lt('+x+')').show();

        });
        /*
         $('#showLess').click(function () {
         x=(x-4<0) ? 3 : x-4;
         $('#myList li').not(':lt('+x+')').hide();
         });
         */
    });
</script>
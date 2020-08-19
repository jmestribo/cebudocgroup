
<?php foreach($result as $row): ?>


<section class="cid-rgvoOFcX6C" id="image3-1d">
    <figure class="mbr-figure container">
            <div class="image-block" style="width: 66%;">
                <img src="<?php echo base_url();?>assets_healthful/images/<?=$row->image?>" width="1400" alt="" title="">
                
            </div>
    </figure>
</section>

<section class="mbr-section article content1 cid-article-body" id="content1-1f">
    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-12">
                
                <center><h2 class="mbr-fonts-style display-2"><?=$row->title?></h2></center>
                <!--p class="mbr-text mbr-fonts-style">Published : <?=$row->date?></p-->
                
            </div>
        </div>

        <?=$row->content?>

    </div>
</section>

<section class="mbr-gallery mbr-slider-carousel cid-carousel" id="gallery1-1l">
    <?=$row->slider;?>
</section>
<?php endforeach; ?>





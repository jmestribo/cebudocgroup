<?php foreach($result as $row): ?>
<section class="cid-article-picture" id="image2-oy">
    <figure class="mbr-figure container">
        <div class="image-block" style="width: 70%;">
            <img src="<?php echo base_url()?>assets/images/pressrelease/<?=$row->image?>" alt="<?=$row->title?>" title="<?=$row->title?>">
            
        </div>
    </figure>
</section>

<section class="mbr-section content4 cid-content-body" id="content4-oz">
    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="mbr-fonts-style display-2"><?=$row->title?></h2>
                <p class="mbr-text mbr-fonts-style"><small>Published: <?=$row->date;?></small></p>
            </div>
        </div>
    </div>
</section>


<?php echo $row->content; ?>

<section class="mbr-gallery mbr-slider-carousel cid-article-gallery" id="gallery1-p1">
<?php echo $row->slider; ?>
</section>
<?php endforeach; ?>





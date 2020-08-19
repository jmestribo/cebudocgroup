
<section class="mbr-section content5 cid-default-banner" id="content5-o8">

    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(70, 80, 82);">
    </div>

    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">
                    Team Rewards</h2>
                
                
                
            </div>
        </div>
    </div>
</section>

<section class="features11 cid-default-list" id="features11-oa">

<?php foreach($result as $row): ?>
    <div class="container">   
        <div class="col-md-12">
            <div class="media-container-row">
                <div class="mbr-figure" style="width: 35%;">
                    <a href="<?php echo base_url();?>media/view/<?=$row->id;?>"><img src="<?php echo base_url()?>assets/images/<?=$row->bg_image?>" alt="CDG Picture" title=""></a>
                </div>
                <div class=" align-left aside-content">
                    <h2 class="mbr-title pt-2 mbr-fonts-style display-2"><?=$row->title?></h2>
                    <div class="mbr-section-text">
                        <p class="mbr-text mb-5 pt-3 mbr-light mbr-fonts-style display-7">
                            <?=$row->subtitle?>
                            <span class="badge"><a href="<?php echo base_url();?>media/view/<?=$row->id;?>">Read More..</a></span>
                        </p>

                    </div>
                </div>
            </div>
        </div> 
    </div>
<?php endforeach; ?>          
</section>


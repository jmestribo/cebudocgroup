
<section class="mbr-section content5 cid-default-banner" id="content5-o8">

    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(70, 80, 82);">
    </div>

    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">
                    Press Releases</h2>
                
                
                
            </div>
        </div>
    </div>
</section>

<section class="features11 cid-default-list" id="features11-oa">
<?php foreach($result as $row): ?>
    <div class="container">   
        <div class="col-md-12 pb-5">
            <div class="media-container-row">
                <div class="mbr-figure" style="width: 30%;">
                    <a href="<?php echo base_url();?>media/press_release/article/<?=$row->uri_title;?>"><img src="<?php echo base_url()?>assets/images/pressrelease/<?=$row->thumbnail?>" alt="<?=$row->title?>" title="<?=$row->title?>"></a><br>
                </div>
                <div class=" align-left aside-content">
                    <h2 class="mbr-title pt-2 mbr-fonts-style display-5"><a href="<?php echo base_url();?>media/press_release/article/<?=$row->uri_title;?>"><?=$row->title?></a></h2>
                    <p class="mbr-text mbr-fonts-style"><small>Published: <?=$row->date;?></small></p>
                    <div class="mbr-section-text">
                        <p class="mbr-text mbr-fonts-style display-7 text-black">
                            <?php
                                echo implode(' ', array_slice(explode(' ', $row->sub), 0, 20))."...";
                            ?>
                            <span class="badge"><a href="<?php echo base_url();?>media/press_release/article/<?=$row->uri_title;?>">Read More...</a></span>
                        </p>

                    </div>
                </div>
            </div>
        </div> 
    </div>
    <?php endforeach; ?>
        <div class="container">
            <?php if(strlen($pagination)): 
                echo $pagination; 
            endif; ?> 
        </div>
                 
</section>









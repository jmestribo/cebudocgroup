<section class="features11 cid-rgqVBO4rv6 mt-5" id="features11-19">
    <div class="container">
        <h2 class="mbr-title mbr-fonts-style display-5">COMMUNITY</h2>
        <!--start-->
        <div class="row">
            <div class="col-md-9">
            <?php foreach($result as $row): ?>
                <div class="media-container-row pb-5">
                    <div class="mbr-figure" style="width: 40%;">
                        <a href="<?php echo base_url();?>healthful/blog/article/<?=$row->uri_title;?>"><img src="<?php echo base_url();?>assets_healthful/images/<?=$row->thumbnail?>" alt="" title=""></a>
                    </div>
                    <div class="align-left aside-content">
                        <h2 class="mbr-title pt-2 mbr-fonts-style display-5"><a href="<?php echo base_url();?>healthful/blog/article/<?=$row->uri_title;?>"><?=$row->title?></a></h2>
                        <!--p class="mbr-fonts-style"><small>Published: <?=$row->date?></small></p-->
                        <div class="block-content">
                            <div class="card">
                                <div class="card-box">
                                    <p class="block-text mbr-fonts-style display-7">
                                        <?php
                                            echo implode(' ', array_slice(explode(' ', $row->sub), 0, 20))."...";
                                        ?>
                                        <span class="badge"><a href="<?php echo base_url();?>healthful/blog/article/<?=$row->uri_title;?>">Read More</a></span>
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
            </div>
            <!--end-->

            <div class="col-md-3">
                <div class="media-container-row">
                    <div class="block-content pl-1">
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fcebudocgroup&tabs=timeline&width=300&height=700&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="300" height="700" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe><!--500 is the default height-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  <section class="menu cid-rgvoElkTnc" once="menu" id="menu2-1a">

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                  <a href="<?php echo base_url();?>healthful/latest"><img src="<?php echo base_url();?>assets_healthful/images/hfasset-6-574x170.png" alt="healthful" title="healthful" style="height: 5.3rem;"></a>
                </span>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
              <li class="nav-item">
                <a class="nav-link link text-white display-4" href="<?php echo base_url();?>healthful/latest">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link link text-white display-4" href="<?php echo base_url();?>healthful/latest/stories">Stories</a>
              </li>
              <li class="nav-item">
                <a class="nav-link link text-white display-4" href="<?php echo base_url();?>healthful/latest/profiles">Profiles</a>
              </li>
              <li class="nav-item">
                <a class="nav-link link text-white display-4" href="<?php echo base_url();?>healthful/latest/updates">Updates</a>
              </li>
              <li class="nav-item">
                <a class="nav-link link text-white display-4" href="<?php echo base_url();?>healthful/latest/community">Community</a>
              </li>
              <li class="nav-item">
                <a class="nav-link link text-white display-4" href="<?php echo base_url();?>">CebuDoc</a>
              </li>
              <li class="nav-item">
                <a class="nav-link link text-white display-4" href="#" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-search"></i></a>
              </li>
            </ul>
            
        </div>
    </nav>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" style="min-width: 50%;" role="document">
    <div class="modal-content border-0" style="background-color: transparent;">
      <div class="modal-header">
        <h5 class="modal-title display-5 text-white" id="exampleModalLongTitle">Healthful search</h5>
        <a href="#" class="close display-5 text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
        <form>
          <!--input class="form-control" type="search" placeholder="keyword" aria-label="Search" onkeyup="showResult(this.value)">
          <div id="lookingfor" style="background-color: #eee;" class="text-black"></div-->

          <input name="search_data" id="search_data" type="search" class="form-control" placeholder="keyword" onkeyup="ajaxSearch();">
          <div id="suggestions">
            <div id="autoSuggestionsList"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



        <!-- start (JS code) -->
        <script type="text/javascript">
            function ajaxSearch()
            {
                var input_data = $('#search_data').val();

                if (input_data.length === 0)
                {
                    $('#suggestions').hide();
                }
                else
                {

                    var post_data = {
                        'search_data': input_data,
                        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                    };

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>healthful/latest_autocomplete/",
                        data: post_data,
                        success: function (data) {
                            // return success
                            if (data.length > 0) {
                                $('#suggestions').show();
                                $('#autoSuggestionsList').addClass('auto_list');
                                $('#autoSuggestionsList').html(data);
                            }
                        }
                    });

                }
            }
        </script>
        <!-- end (JS code) -->
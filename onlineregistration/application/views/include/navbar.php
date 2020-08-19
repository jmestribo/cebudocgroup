
      <div class="card-body p-0">
       
        <ul class="nav nav-tabs  nav-tabs small" id="custom-content-below-tab" role="tablist">
          <li class="nav-item text-sm text-uppercase">
            <a class="nav-link Lists" href="<?php echo base_url();?>PatientInformation/Lists" aria-selected="false"><span class="fas fa-folder"></span> PATIENT INFORMATION</a>
          </li>
          <li class="nav-item text-sm text-uppercase">
            <a class="nav-link Setting" href="<?php echo base_url();?>PatientInformation/Setting"  aria-selected="false"> <span class="fas fa-cogs"></span> SETTING</a>
          </li>
          <li class="nav-item  ml-auto text-sm text-uppercase">
            <a class="nav-link"  href="<?php echo base_url();?>PatientInformation/" aria-selected="false">  <?php echo $_SESSION['name'];?></a>
          </li>
          <li class="nav-item  text-sm text-uppercase">
            <a class="nav-link"  href="<?php echo base_url();?>PatientInformation/Signout_account" aria-selected="false"> <span class="fas fa-lock"></span> LOGOUT</a>
          </li>
        </ul>
      
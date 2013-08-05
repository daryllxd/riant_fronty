<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>
<a class="brand" href="#" name="top">Riant</a>
<div class="nav-collapse collapse">
    <ul class="nav">
        <li><a href="<?php echo base_url(''); ?>">Home</a></li>
        <li><a href="<?php echo base_url('docu'); ?>">Documentation</a></li>
        <li><a href="<?php echo base_url('survey'); ?>">Post-Test Survey</a></li>
    </ul>

    <ul id="profile-dropdown" class="nav pull-right">
        <li>
            <a id="profile-tab" class="dropdown-toggle" data-toggle="dropdown" href="#<?php // echo base_url('profile');?>" class="pull-right"><?php echo 'Hello, ', $user_name; ?></a>

            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url('profile'); ?>">Profile</a></li>
                <li><a href="<?php echo base_url('logout'); ?>">Log out</a></li>
            </ul>
        </li>

    </ul>



</div>
<!--/.nav-collapse -->
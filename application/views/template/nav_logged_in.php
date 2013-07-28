<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>
<a class="brand" href="#" name="top">Riant</a>
<div class="nav-collapse collapse">
    <ul class="nav">
        <li><a href="<?php echo base_url(''); ?>">Home</a></li>
        <li class="divider-vertical"></li>
        <li class="active"><a href="<?php echo base_url('sign_up'); ?>">Sign up</a></li>
        <li class="divider-vertical"></li>
        <li><a href="<?php echo base_url('docu'); ?>">Documentation</a></li>
        <li class="divider-vertical"></li>
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
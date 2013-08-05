<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>
<a class="brand" href="<?php echo base_url(''); ?>" name="top">Riant</a>
<div class="nav-collapse collapse">
    <ul class="nav">
        <li><a href="<?php echo base_url('docu'); ?>">Documentation</a></li>
    </ul>


    <form action="<?php echo base_url('login'); ?>" method="post" class="navbar-form pull-right">
        <input type="text" name ="user_name" id="username" class="span2" value="<?php  if (isset($user_name)) echo $user_name; ?>" placeholder="Your username">
        <input type="password" name ="user_password" id="password" class="span2" placeholder="Your password">
        <button type="submit" class="btn">User Login</button>
    </form>
</div>
<!--/.nav-collapse -->
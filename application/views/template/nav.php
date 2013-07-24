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


    <form action="<?php echo base_url('login'); ?>" method="post" class="navbar-form pull-right">
        <input type="text" name ="user_name" id="username" class="span2" value="danimoth2" placeholder="Your username">
        <input type="password" name ="user_password" id="password" class="span2" value="daryll" placeholder="Your password">
        <button type="submit" class="btn">User Login</button>
    </form>
</div>
<!--/.nav-collapse -->
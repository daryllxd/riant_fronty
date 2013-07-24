
<section id="sign-up-form" class="container">
    <div class="row">
        <div class="span8">
            <h1>Sign up for Riant</h1>                

            <form action="<?php echo base_url('new_user');?>" method="post" class="form-horizontal">                    

                <div class="control-group">
                    <label class="control-label" for="username">Username</label>
                    <div class="controls">
                        <input type="text" name ="user_name" id="username" placeholder="Your username">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="email">Email</label>
                    <div class="controls">
                        <input type="email" name ="user_email" id="email" placeholder="Your Email">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="confirm_email">Confirm Email</label>
                    <div class="controls">
                        <input type="email" name ="confirm_email" id="confirm_email" placeholder="Re-enter Email">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input type="password" name ="user_password" id="password" placeholder="Your password">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">Sign in</button>
                    </div>
                </div>
            </form>


            <!--<a class="btn btn-orange"><h2>Sign up for free</h2></a>-->
        </div>
    </div>
</section>

<!--
<div class="container">A
    <div class="row team">
        <div class="span2">                
            <h2>Thesis</h2>
        </div>

        <div class="span10">
            <p>
                The introduction of Web 2.0 moved the software development platform from the desktop to the browser(O'Reilly, 2005). Asynchronous JavaScript and XML (AJAX)led to the development of Rich Internet Applications (RIAs), or web applications that behave like desktop applications(Garrett, 2005). This movement was accompanied with an increase in both commercial and academic offerings for web-based code editors, which promise to make code generation and testing viable across different browsers and operating platforms.</p>
            <p>The current web development tools range from theseweb-basedcode editors to What You See Is What You Get (WYSIWYG) website builders. WYSIWYG emphasizes dragging and dropping elements onto a web page.Both of these have their advantages, but compromise in either generating code or style. Web-basedcode editors lack the traditional drag-and-drop interface common to desktop code editors. WYSIWYG editors are extremely limited in their support for JavaScript and data storage. Software that combines both manual coding and WYSIWYG, such as Adobe Dreamweaver, often result in bloated and unreadable code.</p>
        </div>                   
    </div>
</div>-->

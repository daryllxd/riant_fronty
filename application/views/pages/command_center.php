<div id="command-center" class="container">
    <div class="row">
        <section id="current-profile" class="span2">    
            <img src="<?php echo base_url() . IMAGES . $user_profile_picture; ?>" class="img-polaroid" id="main-profile-pic"/>
            <h2 id="current-profile-username"><?php echo $user_name; ?></h2>
            <p><?php echo $user_email; ?></p>

        </section>

        <div id="current-projects" class="span9 offset1">          
            <div id="current-projects-header">
                <h2>Current Projects</h2>
                <a href="#modal-create-project" id="add-project" class="btn">Add New Project</a>
            </div>

            <div id="current-projects-body">

                <table class="table table-hover">                   
                    <tbody>
                        <tr>
                            <td>
                                <h3 class="project-name"><a href="#">Riant</a></h3>
                                <p class="project-description">Web Development Software (charos)</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="project-name"><a href="#">Tagisan ng Talino</a></h3>
                                <p class="project-description">GAMERS OF THE GAMERS</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="project-name"><a href="#">AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</a></h3>
                                <p class="project-description">Web Development Software (charos)</p>
                            </td>
                        </tr>
                    </tbody>


                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="modal-create-project">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title">Create project</h2>
            </div>
            <div class="modal-body">
                <div class="control-group">
                    <label class="control-label" for="project_name">Project Name</label>
                    <div class="controls">
                        <input type="email" name="project_name" id="project_name" placeholder="Limited to 40 characters :)">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="project_description">Description</label>
                    <div class="controls">
                        <input type="password" name="project_description" id="project_description" placeholder="(Not required) What your project is all about.">
                    </div>
                </div>
                
                <a href="#" id="create-project" class="btn">Let's do this!</a>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
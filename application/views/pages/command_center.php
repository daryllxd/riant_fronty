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
                <a href="#modal-create-project" class="btn add-project">Create a Project</a>

            </div>

            <div id="alert-placeholder"></div>

            <table id="current-projects-body" class="table table-hover">                   
                <tbody>

                    <?php if (!isset($resources)) { ?>
                        <tr>
                            <td>
                                <h3 id="create-new-project-text" class="add-project">
                                    <a href="#modal-create-project">You have no projects, create one now!</a>
                                </h3>
                            </td>
                        </tr>
                        <?php
                    } else {
                        ?>

                        <?php
                        foreach ($resources as $resource) {
                            ?>
                            <tr id="project-cell-<?php echo $resource['project_id']; ?>">
                                <td>
                                    <h3 class="project-name"><a href="#"><?php echo $resource['project_name'] ?></a></h3>
                                    <p class="project-description"><?php echo $resource['project_description'] ?></p>
                                </td>
                                <td>
                                    <div class="project-options">
                                        <a href="#modal-create-project" class="btn edit-project-<?php echo $resource['project_id'] ?>" >Edit</a>
                                        <a href="<?php echo base_url('download_project/'. $resource['project_id']); ?>" class="download-project btn" data-project-id="<?php echo $resource['project_id'] ?>" >Download</a>
                                        <a class="delete-project btn" data-project-name="<?php echo $resource['project_name'] ?>" data-project-id="<?php echo $resource['project_id'] ?>">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>




                </tbody>

            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="modal-create-project" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title">Create project</h2>
            </div>
            <div class="modal-body">
                <div class="control-group">
                    <label class="control-label" for="create-project-name">Project Name</label>
                    <div class="controls">
                        <input type="text" name="project_name" id="create-project-name" placeholder="Limited to 40 characters :)">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="create-project-description">Description</label>
                    <div class="controls">
                        <input type="text" name="project_description" id="create-project-description" placeholder="(Not required) What your project is all about.">
                    </div>
                </div>

                <a href="#" id="create-project" class="btn">Let's do this!</a>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal -->
<div class="modal" id="modal-delete-project" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title">Delete project</h2>
            </div>
            <div class="modal-body">

                <p>Are you absolutely sure? You cannot undo this.</p>
                <p><strong>If you really want to delete this project, then we strongly recommend that you download it first.</strong></p>
                <div class="control-group">
                    <label class="control-label" for="delete-project-name">To delete this project, type its name here:</label>

                    <input type="text" name="delete-project-name" id="delete-project-name" class="" placeholder="Enter the name">
                </div>
                <a id="delete-project-button" class="btn btn-danger btn-large">Delete</a>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


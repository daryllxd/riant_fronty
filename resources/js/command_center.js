var cc = {
    init: function(){
        $('.add-project').on('click', function(){
            $('#modal-create-project').modal('show');
        })
        
        $('#create-project').on('click', function(){
            var new_project = [];
            new_project['project_name'] = $('#create-project-name').val();
            new_project['project_description'] = $('#create-project-description').val();
            cc.create_project(new_project);
        });        
        
        $('.delete-project').on('click', function(){
            var project_id = $(this).attr('data-project-id');
            var project_name = $(this).attr('data-project-name');
            cc.show_modal_for_delete(project_id, project_name);
            
        //            if (cc.delete_project(project_id)){
        //                $('#project-cell-' + project_id).fadeOutAndRemove('fast');
        //            };
        })
        
            
        
    },
    create_project: function(new_project){
        $.post(riant.host + 'new_project',{                
            project_name: new_project['project_name'],
            project_description: new_project['project_description']            
        }, function (data) {
            //            Create new div at the bottom and append shit there
            $('#modal-create-project').modal("hide");
            e.stopPropagation();
            $('#current-projects-header').fadeOutAndRemove('fast');
                
            alert(data);
            alert("I am supposed to redirect at this time");
        }
        );
        return true;
    },
    delete_project :function(project_id){
        $.post(riant.host + 'delete_project',{
            project_id: project_id
        }, function (data) {
            //            return true;
            }
            );
        
    },
    show_modal_for_delete : function(project_id, project_name){
        $('#modal-delete-project').modal('show');
        $('#delete-project-button').off('click').on('click', function(){
            if ($('#delete-project-name').val() == project_name){
                cc.delete_project(project_id);
                $('#project-cell-' + project_id).fadeOutAndRemove('fast');
                $('#delete-project-name').val('');
                $('#modal-delete-project').modal('hide');                
                cc.bootstrap_alert('<strong>'+ project_name + ' has been deleted.</strong>');
            }else{
                $('#delete-project-button').shake();
            }
        });
    },    
    bootstrap_alert : function(message){
        $('#alert-placeholder').html('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><span>'+ message +'</span></div>');
    }
    
}





$(document).ready(cc.init());
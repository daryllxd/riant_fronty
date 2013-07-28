var cc = {
    init: function(){
        $('#modal-create-project').modal();
        
        $('#add-project').on('click', function(){
            $('#modal-create-project').modal('show');
        })
        
        
    }
    
}





$(document).ready(cc.init());
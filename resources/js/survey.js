var survey = {
    init: function(){
        $('.tooltipper').tooltip();
        
        $('#form-survey input, #myform form-survey').not([type="submit"]).addClass('required');
        
        $('#submit-survey').on('click', function(){            
            if (survey.helper.is_valid_survey()){                
                survey.prepare_survey()
            }else{
                $('#submit-survey').shake();
            }
            
        });
    },
    prepare_survey: function(){      
        var survey_answers = {
            user_information:{
                years_experience: $('input[name=survey-years-experience]').val(),
                profession: $('input[name=survey-profession]:checked').val(),
                tools_used: survey.helper.fix_text_box(($('input[name=survey-tools-used]:checked')))   
            },
            question_answers: []
        };
        
        //        For some reason I am also passing element 0 wth  
        var counter = $('td[class^=question]').length;
        for (var i = 1; i <= counter; i++){
            survey_answers['question_answers'][i] = $('input[name=survey-question-'+ i +']:checked').val();
        }
        
        survey.ajax_submit_survey(survey_answers);        
        
    },
    ajax_submit_survey: function(data_to_be_submitted){
        $.post(riant.host + 'submit_survey', {
            user_information: data_to_be_submitted['user_information'],
            question_answers: data_to_be_submitted['question_answers']
            
        }, function(){
            setTimeout(function() {
                window.location.href = riant.host;
            }, 1000);
        });
    }
}

survey.helper = {
    is_valid_survey: function(){
        return $('#form-survey').valid();  
    },
    fix_text_box : function(group_of_text_boxes){
        var ret = [];
        $.each((group_of_text_boxes),
            function(){
                ret.push($(this).val());
            });            
        return ret.join();
    }

}


$(document).ready(survey.init());
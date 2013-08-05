var survey = {
    init: function(){
        $('.tooltipper').tooltip();
        
        $('#submit-survey').on('click', function(){
            survey.submit_survey()
        });
        
        
    },
    submit_survey: function(){
        //        For some reason I am also passing element 0 wth
        var counter = $('td[class^=question]').length;
        var to_pass = [];
        
        to_pass['user_information']['years_experience'] = $('input[name=survey-years-experience]').val();
        to_pass['user_information']['profession'] = $('input[name=survey-profession]:checked').val();
        to_pass['user_information']['tools_used'] = [];
        
        
        $.each(($('input[name=survey-tools-used]:checked')),
            function(){
                to_pass['tools_used'].push($(this).val());
            });
            
        to_pass['tools_used'] = to_pass['tools_used'].join();            
        
        for (var i = 1; i <= counter; i++){
            to_pass['question_answers'][i] = $('input[name=survey-question-'+ i +']:checked').val();
        }        
        $.post(riant.host + 'submit_survey', {
            user_information: to_pass['user_information'],
            question_answers: to_pass['question_answers']
            
        }, function(data){
            console.log(data);
            alert(data);
        });
        
    }
    
}





$(document).ready(survey.init());
/*
 * The riant object (and riant.js) will be used by all pages of 
 * the site.
 */

var riant = {
    host: 'http://localhost/riant_fronty/',
    shake : {
        count : 3,
        distance: 5,
        duration: 300
    }
}

$.fn.shake = function(intShakes, intDistance, intDuration) {
    this.each(function() {
        intShakes = typeof intShakes !== 'undefined' ? intShakes : riant.shake.count;
        intDistance = typeof intDistance !== 'undefined' ? intDistance : riant.shake.distance;
        intDuration = typeof intDuration !== 'undefined' ? intDuration : riant.shake.duration;
        
        
        $(this).css("position","relative"); 
        for (var x=1; x<=intShakes; x++) {
            $(this).animate({
                left:(intDistance*-1)
            }, (((intDuration/intShakes)/4)))
            .animate({
                left:intDistance
            }, ((intDuration/intShakes)/2))
            .animate({
                left:0
            }, (((intDuration/intShakes)/4)));
        }
    });
    return this;
};

jQuery.fn.fadeOutAndRemove = function(speed){
    $(this).fadeOut(speed,function(){
        $(this).remove();
    })
}
function MatchLocation() {

}

// Mengganti input type hidden untuk boolean-input

$('.boolean-input').each(function(){
    elem = $(this);
    newBtn = $('<button></button>');
    newBtn.addClass('btn btn-boolean');
    newBtn.attr('data-target',$(this).attr('id'));
    childMark = $('<div></div>');
    childMark.addClass('btn-mark');
    newBtn.append(childMark);
    elem.before(newBtn);
});

$('.btn-boolean').click(function(ev){
    ev.preventDefault();
    if($(this).hasClass('active')){
        $(this).find('.btn-mark').animate({'left':'0px'},150);
        $('#'+$(this).attr('data-target')).val(0);
    }
    else{
        $(this).find('.btn-mark').animate({'left':'32px'},150);
        $('#'+$(this).attr('data-target')).val(1);
    }
    $(this).toggleClass('active');
});

$(".dropdown-menu").find("a").click(function(e){
    e.preventDefault();
});

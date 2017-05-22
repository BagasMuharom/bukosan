
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': Bukosan.csrfToken
        }
});

function MatchLocation() {

}

function url(path){
    return window.Bukosan.baseUrl + '/' + path;
}

// Mengganti input type hidden untuk boolean-input

$('.boolean-input').each(function(){
    elem = $(this);
    newBtn = $('<button type="button"></button>');
    newBtn.addClass('btn btn-boolean');
    newBtn.attr('data-target',$(this).attr('id'));
    childMark = $('<div></div>');
    childMark.addClass('btn-mark');
    newBtn.append(childMark);
    elem.before(newBtn);
    if($(this).val() == 1){
        childMark.css('left','32px');
        newBtn.addClass('active');
    }
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

function dropdownAction(elem){
    var parent = elem.parent().parent().parent();
    var button = parent.find('button').eq(0);
    var target = parent.attr('target');
    $(target).val(elem.attr('data-value'));
    button.html(elem.text() + '&nbsp;&nbsp;<span class="caret"></span>');
}

$('.dropdown-menu').find('a').click(function(e){
    e.preventDefault();
    dropdownAction($(this));
});

$('.dropdown-menu').find('.autocomplete').on('keyup',function(e){
    e.preventDefault();
    var keyword = $(this).val();
    var list = $(this).parent().find('li');
    list.each(function(){
        if($(this).text().toLowerCase().indexOf(keyword.toLowerCase()) !== -1){
            $(this).show();
        }
        else{
            $(this).hide();
        }
    });
});

function AjaxKelurahan(elem){
    var kecamatan = elem.attr('data-value');
    var dropdown = $('#kelurahan-drop').find('.dropdown-menu');
    $.ajax({
        url : url('daftar/kelurahan/' + kecamatan),
        type : 'get',
        success : function(result){
            dropdown.find('li').remove();
            var response = JSON.parse(result);
            for(x in response){
                var li = $('<li></li>');
                var a = $('<a href="#"></a>');
                a.text(response[x].nama);
                a.attr('data-value',response[x].nama);
                a.click(function(e){
                    e.preventDefault();
                    dropdownAction($(this));
                });
                li.append(a);
                dropdown.append(li);
            }
        }
    });
}


function AjaxKecamatan(elem){
    var kotakab = elem.attr('data-value');
    var dropdown = $('#kecamatan-drop').find('.dropdown-menu');
    $.ajax({
        url : url('daftar/kecamatan/' + kotakab),
        type : 'get',
        success : function(result){
            dropdown.find('li').remove();
            var response = JSON.parse(result);
            for(x in response){
                var li = $('<li></li>');
                var a = $('<a href="#"></a>');
                a.text(response[x].nama);
                a.attr('data-value',response[x].nama);
                a.click(function(e){
                    e.preventDefault();
                    AjaxKelurahan($(this));
                    dropdownAction($(this));
                });
                li.append(a);
                dropdown.append(li);
            }
        }
    });
}

$('#provinsi-drop').find('a').click(function(e){
    e.preventDefault();
    var provinsi = $(this).attr('data-value');
    var dropdown = $('#kotakab-drop').find('.dropdown-menu');
    $.ajax({
        url : url('daftar/kotakab/' + provinsi),
        type : 'get',
        success : function(result){
            dropdown.find('li').remove();
            var response = JSON.parse(result);
            for(x in response){
                var li = $('<li></li>');
                var a = $('<a href="#"></a>');
                a.text(response[x].nama);
                a.attr('data-value',response[x].nama);
                a.click(function(e){
                    e.preventDefault();
                    AjaxKecamatan($(this));
                    dropdownAction($(this));
                });
                li.append(a);
                dropdown.append(li);
            }
        }
    });
});


$('.form-search').submit(function (e) {
    e.preventDefault();
});

$('.favorit').click(function(){
    var id = $(this).attr('data-fav');
    var elem = $(this);
    $.ajax({
        url : url('favorit'),
        type : 'post',
        data : 'id=' + id,
        success : function(result){
            var response = JSON.parse(result);
            if(response.status == 'deleted'){
                elem.removeClass('fa-star favorited').addClass('fa-star-o');
            }
            else if(response.status == 'saved'){
                elem.addClass('fa-star favorited').removeClass('fa-star-o');
            }
        }
    });
});

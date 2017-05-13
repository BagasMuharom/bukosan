
/**
 * Memanipulasi tampil input type=file
 */
$('.btn-chooser').click(function(){
    var real = $(this).attr('data-input');
    $(real).click();
});

/**
 * Mengunggah gambar setelah memilih gambar
 */
$('.file-upload').find('input[type="file"]').change(function () {
    if(($(this)[0].files.length + $("#image-show").find('img').length) <= 4) {
        $(this).parent().submit();
    }
    else{
        alert('Jumlah gambar tidak boleh lebih dari 4 !');
        $(this).val('');
    }
});

/**
 * Melakukan Ajax untuk mengunggah file
 */
$('.file-upload').ajaxForm({
    beforeSend: function () {
        console.log('Mulai mengunggah');
    },
    uploadProgress: function (event, position, total, percentComplete) {
        console.log(percentComplete);
    },
    success: function (response) {
        var result = JSON.parse(response);
        var fullurl = result.fullurl;
        var name = result.name;
        for(image in fullurl){
            var newimage = $('<img class="img-responsive col-lg-3"/>');
            newimage.attr('src',fullurl[image]);
            $("#image-show").append(newimage);
        }
        $("#image").val(name.join());
    }
});

$('#jeniskosan-drop').find('a').click(function(e){
    e.preventDefault();
    if($(this).attr('data-value') == 'keluarga'){
        $('#jeniskelamin-form').hide();
    }
    else{
        $('#jeniskelamin-form').show();
    }
});

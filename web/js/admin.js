/**
 * Created by admin on 13.12.2016.
 */

$('#img').on('filesorted', function (event, params) {
    $.post('', {images: params.stack, action: 'reorder'});
    console.log('File sorted ', params.previewId, params.oldIndex, params.newIndex, params.stack);
});

$(document).ready(function() {
    $('.file-drop-zone-title').text('asdasdasd');
});

/*$('#buttonPushForm').on('click', function(){

});*/


$(document).ready(function () {
    $('body').on('beforeSubmit', '#send-push', function () {
        var form = $(this);
        // return false if form still have some validation errors
        if (form.find('.has-error').length) {
            return false;
        }
        console.log(form.serialize());

        // submit form
        $.ajax({
            url    : form.attr('action'),
            type   : 'post',
            data   : form.serialize(),
            success: function (response) {
                $('.pushForm').html(response);
            },
            error  : function () {

            }
        });
        return false;
    });
});

function checkForm(form)
{
    for (var i = 0; i < form.elements.length; i++){
        var name =  form.elements[i].name;
        if(name == "SendPushNow"){
            continue;
        }
        $("#title").css("border","");
        $("#body").css("border","");
        if (form.elements[i].value == '')
        {
            $("#" + name).css("border","1px solid red");
            return false;
        }
    }
    return true;
}

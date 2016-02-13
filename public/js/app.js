function ImgPreview(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(input).parent().find('img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function Add(){

    var html;
    html += '<div class="image">';
    html +=  '<input type="file" name="images[]" accept="image/*" onchange="ImageUpload(this)">';
    html +=  '<img class="preview" />';
    html += '</div>';


    $('#image-upload').find('.image:last').after(html);


};


function ImageUpload(ele) {
  var imgId = $(ele).parent().find('img').attr('id');
  var pathname = window.location.pathname;
  var ajax =   $.ajax({
      method : 'POST',
      url : pathname+'/ajax',
      data : {
        pro_id : '',
        path : '',
        action : 'upload',
        _token : $('input[name=_token]').val(),
        },
      success : function(data) {
        alert(data);
      },
      },"JSON");

  ajax.done(function( ){
    ImgPreview(ele);
  });
  ajax.fail(function () {
    alert(pathname+'/ajax');
  });

}
function ImageDestroy(ele) {
  var imgId = ele.find('img').attr('id');

  $.ajax({
    method : 'POST',
    url : '/admin/product/ajax',
    data : {
      img_id : '',
      path : ' ',
      action : 'destroy',
    }
  })
  .done(function( ){
    a
  })

}

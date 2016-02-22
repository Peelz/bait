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

    var html = '' ;
    html += '<div class="image">';
    html +=  '<input type="file" name="images[]" accept="image/*" onchange="ImgPreview(this)">';
    html +=  '<img class="preview" src="/img/no-images.png"  />';
    html +=  '<span class="icon destroy_img" onclick="Destroy(this)"><i class="material-icons">close</i> </span>';
    html += '</div>';


      $('#image-upload').append(html);

}
function Destroy(ele) {
  var id = $(ele).parent().find('img').attr('id') ;
  if (id == undefined ){
      $(ele).parent().remove();
  }else{
    $.ajax({
      type :  "post",
      url : window.location.pathname+'/ajax/destroy' ,
      data : {
        _token : $('form').find( 'input[name=_token]' ).val(),
        id : id,
      } ,
      success : function (data) {
      console.log(data);
        $(ele).parent().remove();
      }
    });
  }

  /*

    */



}

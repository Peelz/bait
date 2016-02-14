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
  $.ajax({
      type : 'post',
      url : pathname,
      dataType: 'json',
      data : {
        id : imgId,
        file : ele ,
        path : '',
        action : 'upload',
      },
      success : function(data){
        vat action = data['action'] ;
        if (action == 'update') {
          $(ele).find('img').attr('src',data['path']);
        }else if (action == 'new'){
          $(ele).find('img').attr('src',data['path']);
        }


      },
  });

}

function Upload(){
  $.ajax({
    url: 'test',
    type: 'POST',
    data: {
      name : 'test',
    },
    dataType: 'JSON',
    success: function (data) {
        console.log(data);
        //alert(data);
    },

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

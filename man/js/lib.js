$('input[id^=fulimg]').change(function(){
    var imgId = $(this).attr('img-target');
    loadImg(this, imgId);
});
function loadImg(input, imgId){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
 
        reader.onload = function(e) {
          $('#'+imgId).attr('src', e.target.result);
      }
 
      reader.readAsDataURL(input.files[0]);
    }
}
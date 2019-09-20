/*
author : ahmad taslim fuadi
ig : taslim_fuadi

*/
function display_main(){
  $.ajax({
    url: "../main/cek",
    cache: false,
    methode:'POST',
    success: function(msg){
      // $("#display_user").html(msg);
    }
  });
  var waktu = setTimeout("display_main()",3000);
}

$(document).ready(function(){
    display_main();
});
$(document).ready(function(){
  $("#boxchecked").click(function ()
  {
      if ($("#boxchecked").is(':checked'))
      {
          $("#hidden").show();
      }
      else
      {
          $("#hidden").hide();
      }              
  });
});
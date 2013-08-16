jQuery(document).ready(function($) {
  $('#showqrurlkampagne').click(function(){
    if($('#showqrurlkampagnetable').is(":visible"))
        $('#showqrurlkampagnetable').hide();
      else
        $('#showqrurlkampagnetable').show();
  });
});
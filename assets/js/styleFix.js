$( document ).ready(function() {
  window.onresize = function(event) {
    main();
  };
  document.addEventListener("visibilitychange", function() {
    main();
  }, false);

  main();
});

var calculate = function(offset)
{
  var hw = 0;
  hw = $( document ).width();
  hw -= offset;
  return hw;
}

var main = function()
{
  if(document.getElementById("menu") == null )
  {
    w = 500;
    var pos = $( document ).width() / 2 - w / 2;
    $('#content').css({
        'margin-left' : '0px',
        'left' : pos + 'px'
    });
  }
  else {
    w = calculate($('#bordure' ).width() + 61 );
    $('#content').css({
        'margin-left' : '10px'
    });
  }

  $(function() {
    $('#content').css({
        'width' : ''+w+''
    });
  });
}

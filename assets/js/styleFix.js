$( document ).ready(function() {
    window.onresize = function(event) {
    main();
};
    main();
});

var main = function()
{
  var hw = $( document ).width();
  var mw = 271;
  var w = hw - mw;

  $(function() {
    $('#content').css({
        'width' : ''+w+''
    });
  });
}

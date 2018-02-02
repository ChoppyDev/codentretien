$( document ).ready(function() {
    main();
});

var main = function()
{
  var canvasName = 'canvas';
  var canvas = document.getElementById(canvasName);
  if (canvas.getContext)
  {
    var input = new MouseInput(canvasName);
    var ctx = canvas.getContext('2d');

    var tasks = new Array();
    var ts = new TaskSystem(tasks);
    ts._debug_();

    setInterval(function(){render();},1000/60);
    setInterval(function(){update();},1000/200);

    var render = function()
    {
      ctx.clearRect(0,0,canvas.width,canvas.height);
      ts.render(ctx);
    }

    var update = function()
    {
      ts.update(input);
    }
  }
}

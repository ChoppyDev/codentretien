$( document ).ready(function() {

  var main = function()
  {
    var canvasName  = 'canvas';
    var canvas      = document.getElementById(canvasName);

    if (canvas.getContext)
    {
      var input       = new MouseInput(canvasName);
      var ctx         = canvas.getContext('2d');
      var tasks       = new Array();
      var ts          = new TaskSystem(tasks, new Vector2f(canvas.width,canvas.height));
      var areaAccept  = new Area(new Vector2f(600,20), new Vector2f(400,250), "ACCEPTER", new Color(40, 255, 55, 1.0), Status.ACCEPTED);
      var areaDenie   = new Area(new Vector2f(600,300), new Vector2f(400,250), "REFUSER", new Color(255, 40, 40, 1.0), Status.DENIED);
      var url         = "http://localhost:9090/codentretien/ticketmanagement/ticketReadData";

      $.get(url,function(data){
        data = jQuery.parseJSON(data);

        data.forEach(function(t)
        {
          ts.add( new Task(t["ticket_id"], new Vector2f(0,0), new Vector2f(300,30), t["ticket_title"], t["ticket_description"], t["room_label"], t["ticket_creation"], Converter.rawStatusToStatus(parseInt(t["status_id"])), t["user_firstName"] + " " + t["user_lastName"]));
        });
      });

      setInterval(function(){render();},1000/60);
      setInterval(function(){update();},1000/200);

      var render = function()
      {
        ctx.clearRect(0,0,canvas.width,canvas.height);
        areaAccept.render(ctx);
        areaDenie.render(ctx);
        ts.render(ctx);
      }

      var update = function()
      {
        ts.update(input);
        areaAccept.detect(tasks);
        areaDenie.detect(tasks);
      }
    }
  }

  main();
});

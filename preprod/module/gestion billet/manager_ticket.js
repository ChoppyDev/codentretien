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
    setInterval(function(){seeMouseInput(input);},20);
    var ctx = canvas.getContext('2d');

    var tasks = new Array();
    tasks.push(new Task(new Vector2f(50,20), new Vector2f(300,30), "Problème de souris", "details", "room", "date", Status.ACCEPTED, "agent"));
    tasks.push(new Task(new Vector2f(50,60), new Vector2f(300,30), "L'écran est tout noir", "details", "room", "date", Status.NEW, "agent"));
    tasks.push(new Task(new Vector2f(50,100), new Vector2f(300,30), "Je mange des pizzas au crudité et au poulet Roumain", "details", "room", "date", Status.DENIED, "agent"));
    tasks.push(new Task(new Vector2f(50,140), new Vector2f(300,30), "Je suis Nicolas", "details", "room", "date", Status.UNDEFINED, "agent"));
    tasks.push(new Task(new Vector2f(50,180), new Vector2f(300,30), "Hey...", "details", "room", "date", Status.UNTREATED, "agent"));

    setInterval(function(){render();},1000/60);
    setInterval(function(){update();},1000/200);

    var render = function()
    {
      ctx.clearRect(0,0,canvas.width,canvas.height);
      tasks.forEach(function renderTask(t){t.render(ctx);});
    }

    var update = function()
    {
      tasks.forEach(function updateTask(t){t.update(input);});
    }
  }
}

var seeMouseInput = function(input)
{
    if(input.isButtonLeftDown())
    {

    }
}

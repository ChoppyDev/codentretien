var TaskSystem = (function () {
    function TaskSystem(tasks)
    {
        this.__userHaveTaskSelected = null;
        this.__tasks                = null;
        this.__tasks                = tasks;
        this.__userHaveTaskSelected = -1;
    }

    ////////DEBUG////////
    TaskSystem.prototype._debug_ = function()
    {
      this.__tasks.push(new Task(new Vector2f(50,20), new Vector2f(300,30), "Problème de souris", "details", "room", "date", Status.ACCEPTED, "agent"));
      this.__tasks.push(new Task(new Vector2f(50,60), new Vector2f(300,30), "L'écran est tout noir", "details", "room", "date", Status.NEW, "agent"));
      this.__tasks.push(new Task(new Vector2f(50,100), new Vector2f(300,30), "Le vidéoprojecteur ne fonctionne plus quand on branche un câble audio", "details", "room", "date", Status.DENIED, "agent"));
      this.__tasks.push(new Task(new Vector2f(50,140), new Vector2f(300,30), "Je ne trouve plus l'icone Google", "details", "room", "date", Status.UNDEFINED, "agent"));
      this.__tasks.push(new Task(new Vector2f(50,180), new Vector2f(300,30), "Ça va ?", "details", "room", "date", Status.UNTREATED, "agent"));
    };
    ////////DEBUG////////

    TaskSystem.prototype.add = function(task)
    {
      this.__tasks.push(task);
    };

    TaskSystem.prototype.update = function(input)// non full sorted array -> perf
    {
      var exchange = -1;
      for( let i = this.__tasks.length - 1; i > -1 ; i-- )
      {
        if(this.__userHaveTaskSelected == -1 || this.__userHaveTaskSelected == i)
          this.__tasks[i].update(input);
        if(this.__tasks[i].isGrabed())
          this.__userHaveTaskSelected = i;
        if(this.__userHaveTaskSelected == i && !this.__tasks[i].isGrabed())
        {
          this.__userHaveTaskSelected = -1;
          exchange = i;
        }
      }
      if(exchange != -1)
      {
        this.__tasks.swap(this.__tasks.length-1,exchange);
        exchange = -1;
      }
    };

    TaskSystem.prototype.render = function(context)
    {
      for( let i = 0; i < this.__tasks.length; i++ )
      {
        if( i != this.__userHaveTaskSelected )
          this.__tasks[i].render(context);
      }
      if( this.__userHaveTaskSelected != -1 )
        this.__tasks[this.__userHaveTaskSelected].render(context);
    };

    return TaskSystem;
}());
TaskSystem["__class"] = "TaskSystem";

var TaskSystem = (function () {
    function TaskSystem(tasks,canvasSize)
    {
        this.__userHaveTaskSelected = null;
        this.__tasks                = null;
        this.__savedTasks           = null;
        this.__canvasSize           = null;
        this.__canvasSize           = canvasSize;
        this.__tasks                = tasks;
        this.__userHaveTaskSelected = -1;
        this.__lostFocus            = false;
        this.__task__px             = null;
        this.__task__py             = null;
        this.__task__ey             = null;
        this.__task__sx             = null;
        this.__task__sy             = null;
        this.__task__px             = 50;
        this.__task__py             = 20;
        this.__task__ey             = 40;
        this.__task__sx             = 300;
        this.__task__sy             = 30;
        var that = this;

        $(document).ready(function(){$(window).one("focus", function(){that.manageFocus();});});
    }

    ////////DEBUG////////
    TaskSystem.prototype._debug_ = function()
    {
      var px = 50;
      var py = 20;
      var ey = 40;
      var sx = 300;
      var sy = 30;
      this.__tasks.push(new Task(new Vector2f(px,py), new Vector2f(sx,sy), "Problème de souris", "Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.\n\n Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.", "C214", "12/05/18", Status.ACCEPTED, "Manje TAMER"));
      this.__tasks.push(new Task(new Vector2f(px,py+=ey), new Vector2f(sx,sy), "L'écran est tout noir", "On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte. Du texte. Du texte.' est qu'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard.", "C007", "01/02/18", Status.NEW, "Nicolas KEINPROBLEM"));
      this.__tasks.push(new Task(new Vector2f(px,py+=ey), new Vector2f(sx,sy), "Le vidéoprojecteur ne fonctionne plus quand on branche un câble audio", "De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour 'Lorem Ipsum' vous conduira vers de nombreux sites qui n'en sont encore qu'à leur phase de construction.", "C121", "22/08/20", Status.DENIED, "Jean BERNARD"));
      this.__tasks.push(new Task(new Vector2f(px,py+=ey), new Vector2f(sx,sy), "Je ne trouve plus l'icone Google", "Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d'y rajouter de petits clins d'oeil, voire des phrases embarassantes).", "D009", "11/05/18", Status.UNDEFINED, "Vincent RISOTO"));
      this.__tasks.push(new Task(new Vector2f(px,py+=ey), new Vector2f(sx,sy), "Ça va ?", "Contrairement à une opinion répandue, le Lorem Ipsum n'est pas simplement du texte aléatoire.", "D111", "04/12/18", Status.UNTREATED, "Bernard GROSS"));
    };
    ////////DEBUG////////

    TaskSystem.prototype.add = function(task)
    {
      task.position().setValues(this.__task__px, this.__task__py += this.__task__ey);
      this.__tasks.push(task);
    };

    TaskSystem.prototype.manageFocus = function()
    {
      window.location.reload();
    };

    TaskSystem.prototype.update = function(input)// non full sorted array -> perf
    {
      if(this.__lostFocus)
        return;

      var exchange = -1;
      for( var i = this.__tasks.length - 1; i > -1 ; i-- )
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

    TaskSystem.prototype._intern_update_collision = function(index)
    {
      if( !this.__tasks[index].position().isBetween(new Vector2f(0,0), this.__canvasSize) )
      {

      }

    };

    TaskSystem.prototype.render = function(context)
    {
      if(this.__lostFocus)
        return;

      for( var i = 0; i < this.__tasks.length; i++ )
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

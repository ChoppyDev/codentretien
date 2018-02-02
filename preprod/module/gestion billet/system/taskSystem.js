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
      this.__tasks.push(new Task(new Vector2f(50,20), new Vector2f(300,30), "Problème de souris", "Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.", "room", "date", Status.ACCEPTED, "agent"));
      this.__tasks.push(new Task(new Vector2f(50,60), new Vector2f(300,30), "L'écran est tout noir", "On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte. Du texte. Du texte.' est qu'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard.", "room", "date", Status.NEW, "agent"));
      this.__tasks.push(new Task(new Vector2f(50,100), new Vector2f(300,30), "Le vidéoprojecteur ne fonctionne plus quand on branche un câble audio", "De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour 'Lorem Ipsum' vous conduira vers de nombreux sites qui n'en sont encore qu'à leur phase de construction.", "room", "date", Status.DENIED, "agent"));
      this.__tasks.push(new Task(new Vector2f(50,140), new Vector2f(300,30), "Je ne trouve plus l'icone Google", "Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d'y rajouter de petits clins d'oeil, voire des phrases embarassantes).", "room", "date", Status.UNDEFINED, "agent"));
      this.__tasks.push(new Task(new Vector2f(50,180), new Vector2f(300,30), "Ça va ?", "Contrairement à une opinion répandue, le Lorem Ipsum n'est pas simplement du texte aléatoire.", "room", "date", Status.UNTREATED, "agent"));
    };
    ////////DEBUG////////

    TaskSystem.prototype.add = function(task)
    {
      this.__tasks.push(task);
    };

    TaskSystem.prototype.update = function(input)// non full sorted array -> perf
    {
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

    TaskSystem.prototype.render = function(context)
    {
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

var Task = (function (_super) {
    __extends(Task, _super);
    function Task(position, size, name, details, room, date, status, agent) {
        var _this = _super.call(this, position, size) || this;
        _this.__name          = null;
        _this.__details       = null;
        _this.__room          = null;
        _this.__date          = null;
        _this.__status        = null;
        _this.__agent         = null;
        _this.__color         = null;
        _this.__grabed        = null;
        _this.__lastMousePos  = null;
        _this.__name          = name;
        _this.__details       = details;
        _this.__room          = room;
        _this.__date          = date;
        _this.__status        = status;
        _this.__agent         = agent;
        _this.__color         = Converter.statusToColor(this.__status);
        _this.__grabed        = false;
        _this.__lastMousePos  = new Vector2f(0,0);
        return _this;
    }

    Task.prototype.render = function (context)
    {
        context.fillStyle = 'rgba(' + this.__color.r() +',' + this.__color.g() + ',' + this.__color.b() + ',' + this.__color.a() + ')';
        context.fillRect(this.__position.x(), this.__position.y(), this.__size.x(), this.__size.y());
        var color = this.__color.brighter(100);
        context.fillStyle = 'rgba(' + color.r() +',' + color.g() + ',' + color.b() + ',' + color.a() + ')';
        context.fillRect(this.__position.x()+10, this.__position.y()+3, this.__size.x()-20, this.__size.y()-6);

        context.fillStyle = 'rgb(20,20,20)';
        context.font="20px Didact Gothic";
        context.fillText(this.__name.cutByPixelLength(context.measureText(this.__name).width, this.__size.x(), "..."), this.__position.x()+10, this.__position.y() + 20);
    };

    Task.prototype.update = function(input)
    {
      if(this.__grabed)
      {
        this.__position.setValues(input.position().x() - this.__lastMousePos.x(), input.position().y() - this.__lastMousePos.y());
      }

      if(input.isButtonLeftDown())
      {
        if( !this.__grabed )
        {
          var v = new Vector2f(this.__position);
          v.add(this.__size);
          if(input.position().isBetween(this.__position,v))
          {
            console.log("[" + this.__name + "] - Clicked");
            this.__grabed = true;
            this.__lastMousePos = new Vector2f(input.position().x() - this.__position.x(), input.position().y() - this.__position.y() );
          }
        }
      }
      else
      {
        this.__grabed = false;
      }
    };

    Task.prototype.name = function ()     {return this.__name;};
    Task.prototype.details = function ()  {return this.__details;};
    Task.prototype.room = function ()     {return this.__room;};
    Task.prototype.date = function ()     {return this.__date;};
    Task.prototype.status = function ()   {return this.__status;};
    Task.prototype.agent = function ()    {return this.__agent;};

    return Task;
}(Rectangle));
Task["__class"] = "Task";

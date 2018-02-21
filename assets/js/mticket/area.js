var Area = (function (_super) {
    __extends(Area, _super);
    function Area(position, size, name, color, status) {
        var _this = _super.call(this, position, size) || this;
        _this.__name    = null;
        _this.__color   = null;
        _this.__status  = null;
        _this.__tasksIn = null;
        _this.__name    = name;
        _this.__color   = color;
        _this.__status  = status;
        _this.__tasksIn = new Array();
        return _this;
    }

    Area.prototype.render = function (context)
    {
        context.fillStyle = this.__color.toRGBA();
        context.fillRect(this.__position.x(), this.__position.y(), this.__size.x(), this.__size.y());

        context.fillStyle = this.__color.brighter(150).toRGBA();
        context.fillRect(this.__position.x() + 2, this.__position.y() + 2, this.__size.x() - 4, this.__size.y() - 4);

        context.fillStyle = this.__color.brighter(50).toRGBA();
        context.fillRect(this.__position.x() + 2, this.__position.y() + 2, this.__size.x() - 4, 22);

        context.fillStyle = 'rgb(20, 20, 20)';
        context.font="20px Didact Gothic";
        context.fillText(this.__name, this.__position.x() + this.__size.x() / 2 - context.measureText(this.__name).width / 2, this.__position.y() + 20);

    };

    Area.prototype.detect = function(tasks)
    {
      var that = this;

      tasks.forEach(function(e)
      {
        var ax = that.__position.x();
        var ay = that.__position.y();
        var aw = that.__size.x();
        var ah = that.__size.y();
        var tx = e.position().x();
        var ty = e.position().y();
        var tw = e.size().x();
        var th = e.size().y();

        if((tx + tw/2 >= ax && tx + tw/2 <= ax + aw ) && !e.isGrabed())
        {
          if(ty + th/2 >= ay && ty + th/2 <= ay + ah)
          {
            if(!that.__tasksIn.search(e.id()))
              that.save(e);
          }
          else
          {
            if(that.__tasksIn.search(e.id()))
              that.__tasksIn.splice(that.__tasksIn.searchIndex(e.id()), 1);
          }
        }
        else
        {
          if(that.__tasksIn.search(e.id()))
            that.__tasksIn.splice(that.__tasksIn.searchIndex(e.id()), 1);
        }
      });
    };

    Area.prototype.save = function(task)
    {
      var rsl = null;
      if(this.__status == Status.DENIED)
      {
        rsl = prompt("Veuillez expliquer le refus de ce ticket");
      }

      this.__tasksIn.push(task.id());
      var data  = {id:parseInt(task.id()), state:parseInt(this.__status), reason:rsl};
      var url   = "http://localhost:9090/codentretien/ticketmanagement/editState";
      var that  = this;

      $.ajax({
        type:'POST',
        data:data,
        url:url,
        success : function()  {task.setStatus(that.__status);},
        error   : function()  {}
      });
    };

    Area.prototype.name = function ()     {return this.__name;};

    return Area;
}(Rectangle));
Area["__class"] = "Area";

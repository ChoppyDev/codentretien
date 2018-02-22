var Task = (function (_super) {
    __extends(Task, _super);
    function Task(id, position, size, name, details, room, date, status, agent) {
        var _this = _super.call(this, position, size) || this;
        //EXTERN
        _this.__name          = null;
        _this.__details       = null;
        _this.__room          = null;
        _this.__date          = null;
        _this.__status        = null;
        _this.__agent         = null;
        _this.__color         = null;
        _this.__id            = null;

        _this.__name          = name;
        _this.__details       = details;
        _this.__room          = room;
        _this.__date          = date;
        _this.__status        = status;
        _this.__agent         = agent;
        _this.__color         = Converter.statusToColor(this.__status);
        _this.__id            = id;

        //INTERN
        _this.__grabed        = null;
        _this.__moved         = null;
        _this.__showContent   = null;
        _this.__lastMousePos  = null;
        _this.__lastTaskPos   = null;
        _this.__changeSize    = null;
        _this.__prefixMadeBy  = null;

        _this.__prefixMadeBy  = "De ";
        _this.__changeSize    = size;
        _this.__grabed        = false;
        _this.__moved         = false;
        _this.__showContent   = false;
        _this.__lastMousePos  = new Vector2f(0,0);
        _this.__lastTaskPos   = new Vector2f(0,0);

        return _this;
    }

    Task.prototype.render = function (context)
    {
        if(!this.__showContent)
          this.__changeSize = this.__size;

        var textColor     = 'rgb(20,20,20)';
        var contentColor  = "rgb(240,240,240)";
        var px                = this.__position.x();
        var py                = this.__position.y();
        var sx                = this.__changeSize.x();
        var sy                = this.__changeSize.y();
        var th                = 20;
        var tf                = "px Didact Gothic";
        var tp                = th + tf;

        if(this.__showContent)
        {
          var add = context.measureText(this.__name).width + context.measureText(this.__room).width + 10; // 10 = offset
          if( add <= this.__size.x() )
            add = this.__size.x();

          this.__changeSize = new Vector2f(add, sy);
        }
        else
        {
          this.__changeSize = this.__size;
        }

        //Draw background
        context.fillStyle = this.__color.toRGBA();
        context.fillRect(px,py,sx,sy);

        //Draw Room
        context.fillStyle = textColor;
        context.font      = tp;
        context.fillText( this.__room, px + 2, py + sy / 2 + th / 3);

        //Draw background - title
        context.fillStyle = this.__color.brighter(100).toRGBA();
        context.fillRect(px+4 + context.measureText(this.__room).width,py + 2,sx - context.measureText(this.__room).width - 6,sy - 4);

        //Draw Title
        context.fillStyle = textColor;
        context.font      = tp;
        context.fillText( this.__name.cutByPixelLength(context.measureText(this.__name).width, sx - context.measureText(this.__room).width, "..."), px + 6 + context.measureText(this.__room).width, py + sy / 2 + th / 3)

        if(!this.__showContent)
          return;

        // TOP
        //Draw background
        var dw = context.measureText(this.__date).width;
        var offset = 5;
        context.fillStyle = this.__color.toRGBA();
        context.fillRect(px + sx / 2 - dw /2 - offset, py - th - 4, dw + 4 + offset*2, th + 4);

        //Draw background - date
        context.fillStyle = this.__color.brighter(100).toRGBA();
        context.fillRect(px + sx / 2 - dw /2 + 2 - offset, py - th - 2, dw + offset*2, th + 2);

        //Draw date
        context.fillStyle = textColor;
        context.font = tp;
        context.fillText( this.__date, px + sx / 2 - dw / 2, py - th / 3);


        // BOTTOM

        //Draw background
        context.shadowColor = this.__color.toRGBA();
        context.shadowBlur = 20;
        context.shadowOffsetY = 10;
        context.fillStyle = this.__color.toRGBA();
        context.fillRect(px,py + sy,sx,context.textHeight(this.__details,sx - 6,th) + th*2);
        context.shadowBlur = 0;
        context.shadowOffsetY = 0;

        //Draw background - details
        context.fillStyle = contentColor;
        context.fillRect(px + 2,py + sy,sx - 4,context.textHeight(this.__details,sx - 6,th) - 2 + th*2);

        //Draw background - author
        var offset = 10;
        context.fillStyle = this.__color.brighter(100).toRGBA();
        context.fillRect(px + 2,py + sy,sx - 4,th + offset/2);

        context.fillStyle = this.__color.toRGBA();
        context.fillRect(px + 2,py + sy + th + offset/2,sx - 4,2);

        //Draw author

        context.fillStyle = textColor;
        context.font = tp;
        context.fillText(this.__prefixMadeBy+this.__agent, px + 2, py + 20*2 + offset);

        //Draw details
        context.fillStyle = textColor;
        context.font = tp;
        context.wrapText(this.__details, px + 4, py + sy + 4 + th *2, sx - 6, th);
    };

    Task.prototype.update = function(input)
    {
      if(this.__grabed)
      {
        this.__lastPosition = this.__position;
        this.__position.setValues(input.position().x() - this.__lastMousePos.x(), input.position().y() - this.__lastMousePos.y());
        if( !this.__lastTaskPos.equals(this.__position) )
        {
          this.__moved = true;
          this.__showContent = false;
        }
      }

      if(input.isButtonLeftDown())
      {
        if( !this.__grabed )
        {
          var v = new Vector2f(this.__position);
          v.add(this.__changeSize);
          if(input.position().isBetween(this.__position,v))
          {
            this.__grabed = true;
            this.__lastTaskPos.set(this.__position);
            this.__lastMousePos = new Vector2f(input.position().x() - this.__position.x(), input.position().y() - this.__position.y() );
          }
        }
      }
      else
      {
        if(!this.__moved && this.__grabed )
        {
          this.setStatus(Status.UNTREATED);
          this.__showContent = this.__showContent ? false : true;
        }

        this.__moved = false;
        this.__grabed = false;
      }
    };

    Task.prototype._intern_update = function()
    {
      this.__color = Converter.statusToColor(this.__status);
    }

    Task.prototype.name     = function()  {return this.__name;};
    Task.prototype.details  = function()  {return this.__details;};
    Task.prototype.room     = function()  {return this.__room;};
    Task.prototype.date     = function()  {return this.__date;};
    Task.prototype.status   = function()  {return this.__status;};
    Task.prototype.agent    = function()  {return this.__agent;};
    Task.prototype.isGrabed = function()  {return this.__grabed;};
    Task.prototype.id       = function()  {return this.__id;};

    Task.prototype.setStatus = function(status){this.__status = status;this._intern_update();};

    return Task;
}(Rectangle));
Task["__class"] = "Task";

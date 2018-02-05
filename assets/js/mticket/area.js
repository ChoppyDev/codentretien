var Area = (function (_super) {
    __extends(Area, _super);
    function Area(position, size, name, color, status) {
        var _this = _super.call(this, position, size) || this;
        _this.__name    = null;
        _this.__color   = null;
        _this.__status  = null;
        _this.__name    = name;
        _this.__color   = color;
        _this.__status  = status;
        return _this;
    }

    Area.prototype.render = function (context)
    {
        context.fillStyle = 'rgba(' + this.__color.r() +',' + this.__color.g() + ',' + this.__color.b() + ',' + this.__color.a() + ')';
        context.fillRect(this.__position.x(), this.__position.y(), this.__size.x(), this.__size.y());
        context.fillStyle = 'rgb(20, 20, 20)';
        context.font="20px Didact Gothic";
        context.fillText(this.__name, this.__position.x() + this.__size.x() / 2 - context.measureText(this.__name).width / 2, this.__position.y());

        var color = this.__color;
        color = color.brighter(100);
        context.fillStyle = 'rgba(' + color.r() +',' + color.g() + ',' + color.b() + ',' + color.a() + ')';
        context.fillRect(this.__position.x() + 4, this.__position.y() + 4, this.__size.x() - 8, this.__size.y() - 8);
    };

    Area.prototype.detect = function(tasks)
    {
      var that = this;
      tasks.forEach(function(e){
        var ax = that.__position.x();
        var ay = that.__position.y();
        var aw = that.__size.x();
        var ah = that.__size.y();
        var tx = e.position().x();
        var ty = e.position().y();
        var tw = e.size().x();
        var th = e.size().y();

        if(tx + tw/2 >= ax && tx + tw/2 <= ax + aw)
          if(ty + th/2 >= ay && ty + th/2 <= ay + ah)
            e.setStatus(that.__status);
      });
    };

    Area.prototype.name = function ()     {return this.__name;};

    return Area;
}(Rectangle));
Area["__class"] = "Area";

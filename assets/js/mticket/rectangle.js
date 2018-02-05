var Rectangle = (function ()
{
    function Rectangle(position, size)
    {
        this.__position = 0;
        this.__size     = 0;
        this.__position = position;
        this.__size     = size;
    }

    Rectangle.prototype.render = function(context)
    {
        context.fillRect(this.__position.x(), this.__position.y(), this.__size.x(), this.__size.y());
    };

    Rectangle.prototype.position = function ()            {return this.__position;};
    Rectangle.prototype.size = function ()                {return this.__size;};
    Rectangle.prototype.setPosition = function (position) {this.__position = position;};
    Rectangle.prototype.setSize = function (size)         {this.__size = size;};

    return Rectangle;
}());
Rectangle["__class"] = "Rectangle";

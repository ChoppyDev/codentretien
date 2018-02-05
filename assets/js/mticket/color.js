var Color = (function () {
    function Color(r, g, b, a)
    {
        this.__r = 0;
        this.__g = 0;
        this.__b = 0;
        this.__a = 0;
        this.__r = r > 255 ? 255 : r;
        this.__g = g > 255 ? 255 : g;
        this.__b = b > 255 ? 255 : b;
        this.__a = a > 1 ? 1 : a;
        this.__r = r < 0 ? 0 : r;
        this.__g = g < 0 ? 0 : g;
        this.__b = b < 0 ? 0 : b;
        this.__a = a < 0 ? 0 : a;
    }

    Color.prototype.brighter = function(value)
    {
        return new Color(this.__r + value, this.__g + value, this.__b + value, this.__a);
    };

    Color.prototype.darker = function(value)
    {
        return new Color(this.__r - value, this.__g - value, this.__b - value, this.__a);
    };

    Color.prototype.toRGBA = function()
    {
      return 'rgba(' + this.__r +',' + this.__g + ',' + this.__b + ',' + this.__a + ')';
    };

    Color.prototype.r = function ()     {return this.__r;};
    Color.prototype.setR = function (r) {this.__r = r;};
    Color.prototype.g = function ()     {return this.__g;};
    Color.prototype.setG = function (g) {this.__g = g;};
    Color.prototype.b = function ()     {return this.__b;};
    Color.prototype.setB = function (b) {this.__b = b;};
    Color.prototype.a = function ()     {return this.__a;};
    Color.prototype.setA = function (a) {this.__a = a;};
    return Color;
}());
Color["__class"] = "Color";

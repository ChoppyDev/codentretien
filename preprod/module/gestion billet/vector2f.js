
var Vector2f = (function () {
    function Vector2f(x, y) {
        var _this = this;
        if (((typeof x === 'number') || x === null) && ((typeof y === 'number') || y === null)) {
            var __args = Array.prototype.slice.call(arguments);
            this.__x = 0;
            this.__y = 0;
            this.__x = 0;
            this.__y = 0;
            (function () {
                _this.__x = x;
                _this.__y = y;
            })();
        }
        else if (((x != null && x instanceof Vector2f) || x === null) && y === undefined) {
            var __args = Array.prototype.slice.call(arguments);
            var vector_1 = __args[0];
            this.__x = 0;
            this.__y = 0;
            this.__x = 0;
            this.__y = 0;
            (function () {
                _this.__x = new Number(vector_1.x()).valueOf();
                _this.__y = new Number(vector_1.y()).valueOf();
            })();
        }
        else if (x === undefined && y === undefined) {
            var __args = Array.prototype.slice.call(arguments);
            this.__x = 0;
            this.__y = 0;
            this.__x = 0;
            this.__y = 0;
        }
        else
            throw new Error('invalid overload');
    }
    Vector2f.prototype.equals = function (vector) {
        if (this.__x === vector.x() && this.__y === vector.y())
            return true;
        return false;
    };
    Vector2f.prototype.x = function () {
        return this.__x;
    };
    Vector2f.prototype.y = function () {
        return this.__y;
    };
    Vector2f.prototype.setX = function (x) {
        this.__x = x;
    };
    Vector2f.prototype.setY = function (y) {
        this.__y = y;
    };
    Vector2f.prototype.addX = function (x) {
        this.__x += x;
    };
    Vector2f.prototype.addY = function (y) {
        this.__y += y;
    };
    Vector2f.prototype.subX = function (x) {
        this.__x -= x;
    };
    Vector2f.prototype.subY = function (y) {
        this.__y -= y;
    };
    Vector2f.prototype.mulX = function (x) {
        this.__x *= x;
    };
    Vector2f.prototype.mulY = function (y) {
        this.__y *= y;
    };
    Vector2f.prototype.divX = function (x) {
        this.__x /= x;
    };
    Vector2f.prototype.divY = function (y) {
        this.__y /= y;
    };
    Vector2f.prototype.setValues = function (x, y) {
        this.__x = x;
        this.__y = y;
    };
    Vector2f.prototype.set = function (value) {
        this.__x = value.x();
        this.__y = value.y();
    };
    Vector2f.prototype.bigger = function () {
        return this.__x > this.__y ? this.__x : this.__y;
    };
    Vector2f.prototype.smaller = function () {
        return this.__x > this.__y ? this.__y : this.__x;
    };
    Vector2f.prototype.sum = function () {
        return this.__x + this.__y;
    };
    Vector2f.prototype.biggerthan = function (vector) {
        return (this.__x > vector.x() && this.__y > vector.y());
    };
    Vector2f.prototype.smallerthan = function (vector) {
        return (this.__x < vector.x() && this.__y < vector.y());
    };
    Vector2f.prototype.morePositiveValueThan = function (vector) {
        return this.__x + this.__y > vector.x() + vector.y();
    };
    Vector2f.prototype.moreNegativeValueThan = function (vector) {
        return this.__x + this.__y < vector.x() + vector.y();
    };
    Vector2f.prototype.swap = function (vector) {
        var x = this.__x;
        var y = this.__y;
        this.set(vector);
        vector.setValues(x, y);
    };
    Vector2f.prototype.isBetween = function (first, second) {
        if (this.__x > first.x() && this.__x < second.x())
            if (this.__y > first.y() && this.__y < second.y())
                return true;
        return false;
    };
    Vector2f.prototype.awayfrom = function (vector, distance) {
        return Math.sqrt(Math.pow(this.__x - vector.x(), 2) + Math.pow(this.__y - vector.y(), 2)) > distance;
    };
    Vector2f.prototype.normalize = function (vector) {
        return Math.sqrt(Math.pow(vector.x(), 2) + Math.pow(vector.y(), 2));
    };
    Vector2f.prototype.shoot = function (endpos) {
        var shoot = new Vector2f(endpos.x() - this.__x, endpos.y() - this.__y);
        var norme = this.normalize(shoot);
        shoot.divide$float(norme);
        return shoot;
    };
    Vector2f.prototype.randValueBetween = function (value) {
        if (value.x() <= this.__x && value.y() <= this.__y)
            return new Vector2f(value.x() + Math.random() * (this.__x - value.x()), value.y() + Math.random() * (this.__y - value.y()));
        if (value.x() <= this.__x && value.y() >= this.__y)
            return new Vector2f(value.x() + Math.random() * (this.__x - value.x()), this.__y + Math.random() * (value.x() - this.__y));
        if (value.x() >= this.__x && value.y() <= this.__y)
            return new Vector2f(this.__x + Math.random() * (value.x() - this.__x), value.y() + Math.random() * (this.__y - value.y()));
        return new Vector2f(this.__x + Math.random() * (value.x() - this.__x), this.__y + Math.random() * (value.y() - this.__y));
    };
    Vector2f.prototype.scaledCopy = function (value) {
        return new Vector2f(this.__x * value, this.__y * value);
    };
    Vector2f.prototype.divide$Vector2f = function (value) {
        this.__x /= value.x();
        this.__y /= value.y();
    };
    Vector2f.prototype.divide$float = function (value) {
        this.__x /= value;
        this.__y /= value;
    };
    Vector2f.prototype.divide$float$float = function (x, y) {
        this.__x /= x;
        this.__y /= y;
    };
    Vector2f.prototype.divide = function (x, y) {
        if (((typeof x === 'number') || x === null) && ((typeof y === 'number') || y === null)) {
            return this.divide$float$float(x, y);
        }
        else if (((x != null && x instanceof Vector2f) || x === null) && y === undefined) {
            return this.divide$Vector2f(x);
        }
        else if (((typeof x === 'number') || x === null) && y === undefined) {
            return this.divide$float(x);
        }
        else
            throw new Error('invalid overload');
    };
    Vector2f.prototype.substract$Vector2f = function (value) {
        this.__x -= value.x();
        this.__y -= value.y();
    };
    Vector2f.prototype.substract$float = function (value) {
        this.__x -= value;
        this.__y -= value;
    };
    Vector2f.prototype.substract$float$float = function (x, y) {
        this.__x -= x;
        this.__y -= y;
    };
    Vector2f.prototype.substract = function (x, y) {
        if (((typeof x === 'number') || x === null) && ((typeof y === 'number') || y === null)) {
            return this.substract$float$float(x, y);
        }
        else if (((x != null && x instanceof Vector2f) || x === null) && y === undefined) {
            return this.substract$Vector2f(x);
        }
        else if (((typeof x === 'number') || x === null) && y === undefined) {
            return this.substract$float(x);
        }
        else
            throw new Error('invalid overload');
    };
    Vector2f.prototype.add$Vector2f = function (value) {
        this.__x += value.x();
        this.__y += value.y();
    };
    Vector2f.prototype.add$float = function (value) {
        this.__x += value;
        this.__y += value;
    };
    Vector2f.prototype.add$float$float = function (x, y) {
        this.__x += x;
        this.__y += y;
    };
    Vector2f.prototype.add = function (x, y) {
        if (((typeof x === 'number') || x === null) && ((typeof y === 'number') || y === null)) {
            return this.add$float$float(x, y);
        }
        else if (((x != null && x instanceof Vector2f) || x === null) && y === undefined) {
            return this.add$Vector2f(x);
        }
        else if (((typeof x === 'number') || x === null) && y === undefined) {
            return this.add$float(x);
        }
        else
            throw new Error('invalid overload');
    };
    Vector2f.prototype.multiply$Vector2f = function (value) {
        this.__x *= value.x();
        this.__y *= value.y();
    };
    Vector2f.prototype.multiply$float = function (value) {
        this.__x *= value;
        this.__y *= value;
    };
    Vector2f.prototype.multiply$float$float = function (x, y) {
        this.__x *= x;
        this.__y *= y;
    };
    Vector2f.prototype.multiply = function (x, y) {
        if (((typeof x === 'number') || x === null) && ((typeof y === 'number') || y === null)) {
            return this.multiply$float$float(x, y);
        }
        else if (((x != null && x instanceof Vector2f) || x === null) && y === undefined) {
            return this.multiply$Vector2f(x);
        }
        else if (((typeof x === 'number') || x === null) && y === undefined) {
            return this.multiply$float(x);
        }
        else
            throw new Error('invalid overload');
    };
    Vector2f.prototype.pow$Vector2f$float = function (v, p) {
        return new Vector2f((Math.pow(v.x(), p)), Math.pow(v.y(), p));
    };
    Vector2f.prototype.pow$Vector2f$Vector2f = function (v, p) {
        return new Vector2f((Math.pow(v.x(), p.x())), Math.pow(v.y(), p.y()));
    };
    Vector2f.prototype.pow = function (v, p) {
        if (((v != null && v instanceof Vector2f) || v === null) && ((p != null && p instanceof Vector2f) || p === null)) {
            return this.pow$Vector2f$Vector2f(v, p);
        }
        else if (((v != null && v instanceof Vector2f) || v === null) && ((typeof p === 'number') || p === null)) {
            return this.pow$Vector2f$float(v, p);
        }
        else
            throw new Error('invalid overload');
    };
    Vector2f.prototype.toString = function () {
        return new String(this.__x + ":" + this.__y);
    };
    return Vector2f;
}());
Vector2f["__class"] = "Vector2f";
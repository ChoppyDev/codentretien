var __extends = (this && this.__extends) || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
};

var Converter = (function () {
    function Converter() {
    }
    Converter.statusToColor = function (status) {
        switch ((status)) {
            case Status.NEW:
                return new Color(63, 255, 251, 1.0);
            case Status.ACCEPTED:
                return new Color(40, 255, 55, 1.0);
            case Status.DENIED:
                return new Color(255, 40, 40, 1.0);
            case Status.UNTREATED:
                return new Color(255, 208, 40, 1.0);
            case Status.UNDEFINED:
                return new Color(188, 184, 169, 1.0);
            default:
                return new Color(188, 184, 169, 1.0);
        }
    };
    return Converter;
}());
Converter["__class"] = "Converter";
                                            //int, int, string
String.prototype.cutByPixelLength = function(actualLenght, length, endReplace)
{
  var str = this;
  
  if(actualLenght <= length)
    return str;

  var cl = actualLenght / this.length;
  var indexToCut = parseInt(length / cl) - endReplace.length;
  str = str.substring(0,indexToCut) + endReplace;

  return str;
}

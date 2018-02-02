var MouseInput = (function()
{
  function MouseInput(canvasName)
  {
    this.__canvasName             = 0;
    this.__mousePosition          = 0;
    this.__mouseButtonLeftDown    = 0;
    this.__mouseButtonRightDown   = 0;
    this.__mouseButtonMiddleDown  = 0;
    this.__canvasName             = canvasName;
    this.__mousePosition          = new Vector2f(0,0);
    this.init();
  }

  MouseInput.prototype.init = function()
  {
    var that    = this;
    var canvas  = document.getElementById(this.__canvasName);

    canvas.addEventListener('mousemove', function(event){that.update_mousePosition(event);});
    canvas.addEventListener('mousedown', function(event){that.update_mouseButtonDown(event);});
    canvas.addEventListener('mouseup', function(event){that.update_mouseButtonUp(event);});
  };

  MouseInput.prototype.update_mousePosition = function(event)
  {
    var rect = $(this.__canvasName)[0].getBoundingClientRect();
    this.__mousePosition = new Vector2f(event.clientX - rect.left ,event.clientY - rect.top);
  };

  MouseInput.prototype.update_mouseButtonDown = function(event)
  {
    if( event.button === 0)
      this.__mouseButtonLeftDown = true;
    if( event.button === 1)
      this.__mouseButtonMiddleDown = true;
    if( event.button === 2)
      this.__mouseButtonRightDown = true;
  };

  MouseInput.prototype.update_mouseButtonUp = function(event)
  {
    if( event.button === 0)
      this.__mouseButtonLeftDown = false;
    if( event.button === 1)
      this.__mouseButtonMiddleDown = false;
    if( event.button === 2)
      this.__mouseButtonRightDown = false;
  };

  MouseInput.prototype.position = function()           {return this.__mousePosition;};
  MouseInput.prototype.isButtonLeftDown = function()   {return this.__mouseButtonLeftDown;};
  MouseInput.prototype.isButtonMiddleDown = function() {return this.__mouseButtonMiddleDown;};
  MouseInput.prototype.isButtonRightDown = function()  {return this.__mouseButtonRightDown;};

  return MouseInput;
}());
MouseInput["__class"] = "MouseInput";

$(document).ready(function() {     //la premiere ligne sert à savoir si le document a été télécharger par l'utilisateur
  main();     //on appelle la fonction main
})

var main = function() //on crée la var main
{
  var canvasName = "canvas";
  var canvas = document.getElementById(canvasName); //on recupere le canvas créé dans le html via son ID
  if(canvas.getContext) { //savoir si on peut dessiner dessus, si le js est charger
    var ctx = canvas.getContext('2d');

    display(ctx);
  }
}

var display = function(ctx)
{
  var carre = new Carre(40,20,50,75);
  carre.setColor(255,0,0);
  carre.setDirection(0,0);
  var input = new MouseInput("canvas");

  setInterval(function(){draw(ctx);},1000/30);
  var draw = function(ctx)
  {
    ///////////////CLEAR////////////////
    ctx.fillStyle= 'rgb(210,210,210)';
    ctx.fillRect(0,0,600,600);
    ////////////////////////////////////
    carre.update();
    if( input.isButtonLeftDown() )
      carre.updateMouse(input.position().x(), input.position().y());
    carre.show(ctx);
  }
}

 var Carre = (function()
 {
   function Carre(x,y,w,h){
     this._x = x;
     this._y= y;
     this._w= w;
     this._h= h;
     this._r=0;
     this._g=0;
     this._b=0;
     this._dx=0;
     this._dy=0;
     this._lmpx=0;
     this._lmpy=0;

   }

   Carre.prototype.setColor = function (r,g,b) {
     this._r=r;
     this._g=g;
     this._b=b;
   };

   Carre.prototype.show = function(ctx) {
     ctx.fillStyle= 'rgb(' + this._r + ',' + this._g + ',' + this._b + ')';
     ctx.fillRect(this._x,this._y,this._w,this._h);
   };



   Carre.prototype.updateMouse = function(mx,my)
   {
     if(mx > this._x && mx < this._x + this._w ){
       if(my > this._y && my < this._y + this._h) {
         this._lmpx=mx-(mx-this._x);
         this._lmpy=my-(my-this._y);
       }else {

       }
     }else {

     }
   }

   Carre.prototype.update = function() {
     this._x += this._dx;
     this._y += this._dy;
     if(this._x <= 0)
       this._dx *= -1;

     if(this._y <= 0)
      this._dy *= -1;

    if(this._x + this._w >= 600)
      this._dx *= -1;

    if(this._y + this._h>= 600)
      this._dy *= -1;
   }

   Carre.prototype.setDirection = function(x,y) {
     this._dx = x;
     this._dy = y;
   }

   Carre.prototype.move = function(x,y) {
     this._x +=x;
     this._y +=y;
   }

   Carre.prototype.x = function() {
     return this._x;
   }

   Carre.prototype.y = function() {
     return this._y;
   }

   return Carre;
 }());

//sert à afficher le resultat console.log(...)
//parseInt convertit une chaine en caractère en entier
//prompt sert afficher quelque chose à l'utilisateur
//on peut enlever les accolades dans une boucle si on a qu'une seul instruction
//+= sert à ajouter
// == donne le resultat
//!= n'est pas égal
//= affecter qqch a une variable
//cd$

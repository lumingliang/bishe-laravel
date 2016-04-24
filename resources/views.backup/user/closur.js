 n=1000;
function f1(){
　　　　n=999;
　　　　
alert(n);
　　}
//console.log(n);
var tt =f1();
function f2(){
　　　　　　alert(n); // 999
　　　　}
 n=1000;
function f1(){
　　　　var n=999;
　　　　function f2(){
　　　　　　alert(n);
　　　　}
　　　　return f2;
　　}
　　var result=f1();
console.log(result);
result();

var yy =function f1(){
　　　　var n=999;
       hhh = function() {
       	alert('i am globle');
       }
　　　　nAdd=function(){n+=1}
　　　　function f2(){
　　　　　　alert(n);
　　　　}
　　　　return f2;
　　}
hhh();
   alert(hhh);
　　var result=f1();
　　result(); // 999
　　nAdd();
　　result(); // 1000

function f1(){
　　　　var n=999;
　　　var　nAdd=function(){n+=1}
　　　　function f2(){
　　　　　　alert(n);
　　　　}
　　　　return f2;
　　}
　　var result=f1();
　　result(); // 999
　　nAdd();
　　result(); // 1000
var name = "The Window";   
　　var object = {   
　　　　name : "My Object",   
　　　　getNameFunc : function(){ 
	        //alert('hh');
            //return 1;
　　　　　　aFF= function(){   
　　　　　　　return this.name;   
　　　　　};   
        return aFF;
　　　　}   
};  
object.getNameFunc; 

function Constructor() {  
  var that = this;  
  var membername = 333; 
  function membername() { console,log(membername);}
  return that;
}
Constructor().membername;

var that = function( ) {
  var	hh = 33;
  var rr={
  	ll:'hhh',
  	hr:function() {
  		console.log( hh++ );
  	}

  };
  return rr;

};//仅仅对函数进行检查语法，并没有运行，也没有申请hh的内存

that() ;//这时候开始运行上诉的函数，并申请内存,
var hh =44;
var that = function( ) {
 // var	hh = 33;
  var rr= {
  	hh :33,
  	tt:function() {
  		this.hh =this.hh+1,
  		alert(this.hh );
  		return function(){   
　　　　　　　　return this.hh;   
　　　　　};   
  	}
  };


  return rr;

};

var hr=that();

var name = "The Window";   
　　var object = {   
　　　　name : "My Object",   
　　　　getNameFunc : function(){   
　　　　　　
        return this.jj();  
　　　　}  ,
     jj:function  hhh(){   
　　　　　　　　return name;   
　　　　　}  
};   

var name = "The Window";   
　　var object = {   
　　　　name : "My Object",   
　　　　getNameFunc : function(){   
　　　　　　return function(){   
　　　　　　　　return this.name;   
　　　　　};   
　　　　}   
};   
alert(object.getNameFunc()());  //The Window

var name = "The Window";   
　　var object = {   
　　　　name : "My Object",   
　　　　getNameFunc : pp(this.name)  
　　　　}   
};   
function pp(this.name){   
　　　　　　return function(){   
　　　　　　　　return this.name;   
　　　　　}; 
alert(object.getNameFunc()()); 

var yy=3;
function rr() {
	var yy=5;
	var that = {
		hh:
	}
}
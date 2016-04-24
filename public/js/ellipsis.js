
/*
多余部分用省略号来代替，
15年8月2号做
*/



(function($) {
	$.fn.ellipsis = function(maxCharCount) {
		return $(this).each(function(){
			var el = $(this);
			var originalText = el.html();

            var originalTextLength = originalText.length;
            console.log(originalTextLength);
            var max = maxCharCount;
          //  var tempNode = $(this.cloneNode(true));            

            if(originalTextLength > max){
            	var text = originalText.substr(0, 25);
           // var text=SetSub(originalText,50);
	           el.html(text + "&hellip;");
	          // var text=cut_str(originalText,50);
	          // el.html(text);
            }



            //js截取字符串，中英文都能用  
//如果给定的字符串大于指定长度，截取指定长度返回，否者返回源字符串。  
//字符串，长度  
  
/** -----------------------------------------
 * js截取字符串，中英文都能用 
 * @param str：需要截取的字符串 
 * @param len: 需要截取的长度 
 */  
function substr(str,len)  
{  
   var str_length = 0;  
   var str_len = 0;  
      str_cut = new String();  
      str_len = str.length;  
      for(var i = 0;i<str_len;i++)  
     {  
        a = str.charAt(i);  
        str_length++;  
        if(escape(a).length > 4)  
        {  
         //中文字符的长度经编码之后大于4  
         str_length++;  
         }  
         str_cut = str_cut.concat(a);  
         if(str_length>=len)  
         {  
         str_cut = str_cut.concat("...");  
         return str_cut;  
         }  
    }  
    //如果给定字符串小于指定长度，则返回源字符串；  
    if(str_length<len){  
     return  str;  
    }  
}  //-----------------------------------

function SetSub(str,n){  

   var strReg=/[^\x00-\xff]/g;  

   var _str=str.replace(strReg,"**");  

   var _len=_str.length;  

   if(_len>n){  

     var _newLen=Math.floor(n/2);  

     var _strLen=str.length;  

     for(var i=_newLen;i<_strLen;i++){  

         var _newStr=str.substr(0,i).replace(strReg,"**");  

         if(_newStr.length>=n){  

             return str.substr(0,i)+"...";  

             break;  

        }  

     }  

   }else{  

     return str;  

   }  

}  


		});
	};

})(jQuery); 
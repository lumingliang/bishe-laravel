/*
;(function($) {
  $.fn.validater = function() {
// 表单验证器


*/
var validForm = function(params) {
    var result = true,
        can = true,
        canSubmit = false,
        ajaxCan = false,
        form = params.form,
        captcha = form.find('#captcha'),
        captchaCheck = false,
        submitButton,
        successIcon = ' <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>',
        errorIcon = '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>',
        element, //某个需要验证的元素
        elementVal,
        elementCheck = false,
        validTpye,
        pwdVal, //备份密码值
        flag = 1,
        that,
        lvele, //密码强弱父元素
        elementParent,
        allInput = form.find('input:not(.hidden)'),
        fieldset = form.find('fieldset'),
        total = allInput.length, //如果某一input验证成功，-1，不成功+1.
        ajaxUrl,
        ajaxEleAll = form.find('.check'),
        ajaxEleLen = ajaxEleAll.length,
        ajaxEleCheck = false,
        ajaxElei = 0, //用来同步历遍
        finalAjaxCheck = false, // 终检时候的状态
        ajaxEle,
        submitEle,
        submitData,
        submitUrl; //备份ajaxEle
    // console.log(allInput);

    that = {
            /*
             addVaildListien: function() {
             element = $(this) ;
             // console.log(element.val());
             form.delegate( element ,'click' , that.valid );
             },*/



            valid: function() {

                validType = element.attr('data-validType');
                switch (validType) {
                    case "require":
                        {
                            // that.clear();
                            that.require();
                            break;
                        }
                    case 'email':
                        {
                            that.email();
                            break;
                        }
                    case 'pwd':
                        {
                            pwdVal = elementVal; //备份密码值
                            that.pwd();
                            break;
                        }
                    case 'pwd2':
                        {
                            if (that.require()) {
                                that.clear();

                                if (elementVal != pwdVal) {
                                    that.validFalse();
                                    that.addAlert('两次输入的密码不一样');
                                    element.siblings('.alert').removeClass('hidden');
                                } else {
                                    that.validSuccess();
                                }

                            }

                            break;
                        }
                    case 'captcha':
                        {

                            if (!captchaCheck) {
                                if (elementVal.length == 5) {
                                    $.post(
                                        element.attr('data-url'), {
                                            captcha: elementVal
                                        },
                                        that.captchaAjax
                                    );
                                }

                            } else {

                                that.validSuccess();
                            }
                        }
                    default:
                        return;


                }
            },

            validFalse: function() {
                element.data('check', false);
                finalAjaxCheck = false;
                element.after(errorIcon);
                elementParent.addClass('has-error has-feedback');
                //result = false;
            },

            validSuccess: function() {
                element.data('check', true);
                element.after(successIcon);
                elementParent.addClass('has-success has-feedback');
                //result = true;
            },

            addAlert: function(string) {
                element.after('<div class="alert alert-danger hidden" role="alert">' + string + '</div>');
            },

            clear: function() {
                elementParent.removeClass('has-success has-error').find('.glyphicon, .alert').remove();
            },

            require: function() {

                if (elementVal === '') {
                    that.validFalse();
                    that.addAlert('不能为空');
                    return false;
                } else {
                    that.validSuccess();
                    return true;
                }
            },

            email: function() {

                if (!(/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/).test(elementVal)) {
                    that.validFalse();
                    that.addAlert('请输入正确的邮箱');
                    return false;
                } else {
                    that.validSuccess();
                    return true;
                }
            },


            start: function() {
                //$.each(allInput , function(){ that.addVaildListien(); });
                //allInput.each(that.addVaildListien );
                //allInput = form.find('input'); //缓存所有的表单元素
                // console.log(total);
                //绑定验证监听
                form.delegate('input', 'keyup click', function() {
                    //console.log(2);
                    element = $(this);
                    element.data('check', false);
                    elementVal = element.val();
                    elementParent = element.parents('.form-group');
                    lvele = elementParent.next();
                    that.clear();
                    that.valid();
                }); //为一般表单元素绑定keyup实时验证
                // form.find('.submit').click(function(){ that.submit(); } );// 为提交元素绑定
                //that.checkbox();//实现大复选框

                //实现ajax检测值是否存在
                form.delegate('.check', 'blur', function() {
                    var ajaxele = element = $(this);
                    //var ajaxEle = element;//局部函数变量，以便ajax回调引用
                    // element.data('check' , false);
                    elementVal = element.val();
                    elementParent = element.parents('.form-group');
                    ajaxUrl = element.attr('data-url');
                    element.data('ajaxEleCheck', false);
                    that.clear();
                    // console.log(1);

                    // if(  that.email() ) {
                    if (element.data('check')) { //如果本身的验证成功就发送ajax
                        /*  $.post(
                               ajaxUrl,
                               {email:elementVal},
                               ajaxFun(ajaxele)

                            ).error(function() { alert("error"); } );*/
                        $.ajax({
                            url: ajaxUrl,
                            type: 'post',
                            data: {
                                email: elementVal
                            },
                            timeout: 20000,
                            error: function() {
                                alert('服务器错误！请刷新后操作');
                            },
                            success: ajaxFun(ajaxele)
                                //complete:function() {
                                //alert('complete!');
                                // }
                        });
                    }


                });

                // 产生验证码 
                if (captcha) {
                    captcha.bind('click', that.changeCaptcha);
                }


                //绑定提交按钮 
                form.find('#submit').click(function() {


                    submitUrl = $(this).attr('data-submitUrl');
                    submitEle = $(this);

                    //终检复位
                    finalAjaxCheck = false;
                    ajaxElei = 0;



                    //模拟触发点击初检

                    for (var i = 0; i < total; i++) {
                        var check2ele = $(allInput.get(i));
                        if (check2ele.data('check') != true) {
                            check2ele.trigger('click'); //模拟触发
                            if (check2ele.data('check') != true) {
                                return;
                            }
                        }
                    }

                    $('#load').css('display', ''); //显示等待界面 
                    submitData = form.serialize();
                    console.log(submitData);

                    fieldset.attr('disabled', true);
                    submitEle.html('提交中...');


                    finalAjaxCheck = true; //允许进行终检

                    if (finalAjaxCheck) {

                        that.finalAjaxCheck();
                    }




                });




            },

            option: function(options) {
                ajaxCan = options.ajaxCan
            },
            form: function() {
                return form;
            },

            submitReset: function() {
                submitEle.html('点我提交');
                fieldset.attr('disabled', false);
                $('#load').css('display', 'none'); //关闭等待界面 
            },

            submitPost: function() {


                //console.log(submitData);

                $.ajax({
                    url: submitUrl,
                    type: 'post',
                    data: submitData,
                    timeout: 20000,
                    error: function() {
                        that.submitReset();
                        alert('服务器错误！请刷新后操作');
                    },
                    success: submitFun,
                    complete: function() {
                        that.submitReset();
                        captchaCheck = false;
                        var captchaText = captcha.parents('.form-group').prev().find('input');
                        captcha.bind('click', that.changeCaptcha).trigger('click');
                        captchaText.attr('disabled', false).data('check', false); //解除禁用

                    }

                });


            },

            submitFun: function(data) {
                //console.log(data+"服务器数据");

                //fieldset.attr('disabled' , false);


                if (data) {
                    data = JSON.parse(data);

                    if (data.flag == 0) {
                        that.submitReset(); //发生验证错误时复位
                        form.append('<div class="alert alert-danger " role="alert">' + data.msg + '</div>');
                    } else if (data.flag == 1) {
                        var str = '<div class="alert alert-success"><h1>注册成功！请到您的邮箱激活！</h1></div>';
                        form.empty().parent('.panel-body').append(str);
                    } else {
                        location.href = data.location;
                    }
                } else {
                    alert('服务器错误！请刷新后操作');
                }
            },

            ajaxFun: function(ajaxele) { // 如果服务器成功有返回值
                return function(data) {

                    // console.log(3);
                    element = ajaxele;
                    elementParent = element.parents('.form-group');
                    that.clear();
                    if (data == 1) {
                        that.submitReset();
                        that.validFalse(); //不可提交 
                        that.addAlert('已经存在，请用其他值');
                        elementParent.find('.alert').removeClass('hidden');
                        //如果是终检，发生验证错误应能复位 
                        if (finalAjaxCheck) {
                            that.submitReset();
                        }
                    } else {
                        that.validSuccess();
                        that.addAlert('可以使用');
                        elementParent.find('.alert').removeClass('hidden');
                        element.data('ajaxEleCheck', true);
                        if (finalAjaxCheck) { //如果是终检ajax 继续调用实现同步循环
                            ajaxElei++;
                            that.finalAjaxCheck();
                        }
                    }

                }
            },


            finalAjaxCheck: function() {
                //console.log(ajaxElei);
                if (ajaxElei < ajaxEleLen) {
                    var ajaxele = element = $(ajaxEleAll.get(ajaxElei));
                    if (ajaxele.data('ajaxEleCheck') != true) {
                        //console.log(ajaxElei+'次终检');

                        elementVal = element.val();

                        elementParent = element.parents('.form-group');
                        ajaxUrl = element.attr('data-url');
                        // console.log(ajaxUrl);
                        that.clear();

                        $.ajax({
                            url: ajaxUrl,
                            type: 'post',
                            data: {
                                email: elementVal
                            },
                            timeout: 20000,
                            error: function() {
                                that.submitReset();
                                alert('服务器错误！请刷新后操作');
                            },
                            success: ajaxFun(ajaxele)
                        });
                    } else {
                        ajaxElei++;
                        that.finalAjaxCheck();
                    }
                } else {
                    // finalAjaxCheck = false;
                    // ajaxElei = 0;//终检复位
                    //finalAjaxCheck = false;//
                    console.log('终检结束并提交表单');
                    that.submitPost();
                }
            },

            changeCaptcha: function() {

                if (!captchaCheck) {

                    $(this).parents('.form-group').prev().find('input').val('');
                }
                $url = $(this).attr('src');
                $url = $url + 1;
                $(this).attr('src', $url);
            },

            captchaAjax: function(data) {
                that.clear();
                if (data == 1) {
                    that.validSuccess();
                    captcha.unbind('click');
                    captchaCheck = true; //验证成功后不再提交
                    element.attr('disabled', true); //成功后禁用该元素
                } else {
                    that.validFalse();
                    that.addAlert('验证码错误');
                    elementParent.find('.alert').removeClass('hidden');
                }

            },

            pwd: function() {

                //console.log(lvele);
                lvele.removeClass('hidden');
                if (elementVal.length < 6) {
                    that.pwdLvreset();
                    return;
                }
                that.validSuccess();
                var lv = -1; //密码强度水平
                if (elementVal.match(/[a-z]/ig)) {
                    lv++;
                }
                if (elementVal.match(/[0-9]/ig)) {
                    lv++;
                }
                if (elementVal.match(/(.[^a-z0-9])/ig)) {
                    lv++;
                }
                if (elementVal.length < 6 && lv > 0) {
                    lv--;
                }
                switch (lv) {
                    case 0:
                        that.level0();
                        break;
                    case 1:
                        that.level1();
                        break;
                    case 2:
                        that.level2();
                        break;
                    default:
                        that.pwdLvreset();
                }
            },

            pwdLvreset: function() {
                lvele.find('.progress-bar').addClass('progress-bar-danger').css('width', '30%');
                that.validFalse();
                that.addAlert('不能少于6个字符');
                elementParent.find('.alert').removeClass('hidden');
            },
            level0: function() {
                lvele.find('.progress-bar').removeClass('progress-bar-danger').css('width', '30%');
            },
            level1: function() {
                lvele.find('.progress-bar').removeClass('progress-bar-danger').css('width', '60%');
            },
            level2: function() {
                lvele.find('.progress-bar').removeClass('progress-bar-danger').css('width', '90%');
            },
            wating: function() {
                $('#load').css('display', '');
            }


        } //end that

    var ajaxFun = params.ajaxFun || that.ajaxFun, // ajax处理回调函数
        submitFun = params.submitFun || that.submitFun,
        captchaAjax = params.captchaAjax || that.captchaAjax;


    return that;


}; //end formvalidater

//  option = $.extend({},$.fn.validater.defaults,option );
/*
  return $(this).each(function(){
    var $form = $(this);
    //console.log($form);
     valid = validForm({ form:$form });
    valid.start();
  });
*/
/*
  $.fn.validateter.defaults = {
           
  };*/
/*
  };
})(jQuery);
*/
/*
$('form #submit').click(function(){

  $.post("{{ url('/auth/register') }}", $(".form").serialize());
});

$('form ')
如果可以提交，则发送ajax请求到服务器，并对返回数据进行处理。
1,检验数据是否正确
2.检验数据是否在服务器存在
3，把数据发送到服务器并更新文档
4，把数据发送到服务器，服务器跳转。

if(result) {
  $.post(
       url,
       form.serialize(),
       function(data) {
          k 
       },

    );
}*/

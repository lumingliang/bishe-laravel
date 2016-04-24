
// 用于逆向对edison时间间隔等操作
function disableForm(formId,isDisabled) { 
     
    var attr="disable"; 
    if(!isDisabled){ 
       attr="enable"; 
    } 
    $("form[id='"+formId+"'] :text").attr("disabled",isDisabled); 
    $("form[id='"+formId+"'] textarea").attr("disabled",isDisabled); 
    $("form[id='"+formId+"'] select").attr("disabled",isDisabled); 
    $("form[id='"+formId+"'] :radio").attr("disabled",isDisabled); 
    $("form[id='"+formId+"'] :checkbox").attr("disabled",isDisabled); 
    $("form[id='"+formId+"'] :button").attr("disabled",isDisabled); 

}

$('document').ready( function() {

    $('#excel').click( 
            function () {
                //alert('click me');
                $(this).html('处理中，请等待');
                var data = $("#edisonForm").serialize();
                //$("form").attr('disabled', 'true');// addClass('am-disabled');
                disableForm('edisonForm', true);
                saveDb(data);
                sendEdison(data);

                // 20s自动超时
                setTimeout(function() {
                    $('#info').empty().append('<p>操作超时，请刷新后操作！');
                    $('#excel').html('确认');
                    disableForm('edisonForm', false);
                } , 40000 );
            });

    function saveDb(data) {

        $.post('/iot/manage/save', data, function(re) {
            if(re) {
                console.log('数据库保存成功');
            }else {
                console.log('数据库保存失败');
            }
        });

    }

    socket = io.connect('http://localhost:3000');

    socket.on('sendBackInfo', function(data) {
        console.log('have get sendBackInfo data:'+data);
        $('#info').empty().append('<p>'+data+'</p>'); 
        disableForm('edisonForm', false);
        $('#excel').html('确认');
    });


    function sendEdison(data) {

        socket.emit('configEdison', data);
    }

} );

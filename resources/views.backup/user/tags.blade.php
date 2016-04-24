@section('link')

<meta name="tags" content ="{{ $tags }}" />

@endsection


@section('extra')

<div class="modal fade" id="tagsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">选择一个标签</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary">选择</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')

<script>

   // $('meta[name="csrf-token"]').attr('content')
   
  var tags = eval('(' + $('meta[name="tags" ]').attr('content') + ')');
  //tags.splice(0,10);
  var tagsModal = $('#tagsModal .modal-body');
  $.each(tags, function(i) {
    var html = '<span data-id=" '+ tags[i].data+' " class="label label-primary">'+tags[i].value+ '</span>';
    tagsModal.append(html);
  });
  $('#tagsModal .modal-body .label').click(function () {
    $('#tagsModal').modal('hide');
    var id = $(this).attr('data-id');
    var name = $(this).html();
    $('#autocomplete').val(name).data('tag_id',id);
  });

  function tagsDelete(e) {
    var ele = $('#autocomplete');
    var id = ele.data('tag_suggestion').id;
    var query = ele.data('tag_suggestion').query;
    console.log(query);
    if( id ) {
      $('#load').show();
      $.ajax({
        type:'delete',
        url:'/User/tags/'+id ,
        data:id,
        success:function() {
          $('#load').hide();
          ele.val('');
          ele.data('tag_suggestion' , '');
          tags.splice(query,1);//splice()函数，http://www.oschina.net/code/snippet_1417838_46271
          console.log(tags);
          alert('删除成功');
        }

      });
    } else {
      alert('请选择一个标签');
    }
  }

  //console.log(tags );

//上传表单
//
$('#create_post').click(function() {
  /*
    var data = $('#post_form').serialize();
    data+='&content'+$('#textarea_1').html();
    alert(data);
    var form = $('#post_form');
    var data = {
      title:form.children('#title_1').val(),
      content:form.children('#content_1').val
    }*/
    var data = $('#post_form').serialize();
    var flag = 1;//新增的tag
    var p = $('#autocomplete').data('tag_suggestion');
    
    var url = '/User/articles?flag=';
    //alert(data);
    if( p ){
      id=p.id;
      flag = 0;//选择已有的tag
      url+=(flag+'&id='+id);
      //var id = $('#autocomplete').data(tag_suggestion).id;
    } else {
      url+=flag;
    }
    $.ajax({
          type:'post',
          url:url,
          data:data,
          success:function() {
            alert('新增文章成功');
          }
        });
});



$('#autocomplete').autocomplete({
    lookup: tags,
    orientation:'auto',
    onSelect: function (suggestion) {
        //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
        $('#autocomplete').data('tag_suggestion', suggestion.data);
        //delete tags.(suggestion.data.query);
        //tags.splice(0,1);
        console.log(tags);

        //console.log($('#autocomplete').data('tag_suggestion') );
        console.log(suggestion.data.query);
    },
    beforeRender:function() {
      $('#autocomplete').data('tag_suggestion', '');//监听每次输入时所作
    }
});
</script>
@endsection

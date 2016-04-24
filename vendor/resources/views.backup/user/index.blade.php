@extends('user.layout')






@section('main_content')
<div class="page-header head">
	<h3>文章管理</h3>
</div>


<div class="m_content"><!--内容体wapper-->



@foreach($posts as $post)
<div class="panel panel-default">
  <div class="panel-heading"><span class="glyphicon glyphicon-align-left"></span>{{ $post->title }}
  </div>
  <div class="panel-body" data-id={{ $post->id }}>
    <button class="btn btn-primary">修改</button>
    <button class="btn btn-warning" onclick="delete_post(this,{{$post->id}})">删除</button>
  </div>
</div>


@endforeach

<?php echo $posts->render(); ?>

</div><!--end 内容体wapper-->

@endsection

@section('js')

<script>
function delete_post(e,id) {
	//console.log($(e).parents('.panel').remove());
	$('#load').show();
	
	$.ajax({
		type:'delete',
		url:'/User/articles/'+id,
		success:function() {
			$(e).parents('div .panel').remove();
			$('#load').hide();
			//alert('删除文章成功');
		}
	});
//console.log(id);
//console.log(e);
}
</script>

@endsection
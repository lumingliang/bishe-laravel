
@extends('admin.layout')


	

@section('admin-content')

<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>最新文章</small></div>
</div>

<hr/>

<div class="am-u-sm-12 am-u-md-8">
@foreach($posts as $post)
    <div class="am-panel am-panel-primary">
      <div class="am-panel-hd am-text-center"><span class="am-icon-puzzle-piece"></span><a href="{{$tagId?url('Admin/post/'.$post->id.'/'.$tagId) : url('Admin/post/'.$post->id)}}" > {{$post->title}}
      </a></div>
      <div class="am-panel-bd" data-id="{{$post->id}}">
      创建时间：{{$post->updated_at}}<button type="button" data-post-destroy="{{$post->id}}" class="am-btn am-btn-danger am-fr">删除</button><a class="am-btn am-btn-success am-fr" href="{{url('Admin/post/'.$post->id.'/edit/'.$tagId)}}"> 修改 </a>
      </div>  
    </div>
@endforeach
@if(count($posts)==0)
<div class="am-panel am-panel-primary">
      <div class="am-panel-hd am-text-center"><span class="am-icon-puzzle-piece"></span>该标签没有文章
      </div>
</div>
@endif

<?php echo $posts->render(); ?>

</div>
@endsection

@section('js')
<script type="text/javascript">
	$('document').ready(function () {
		$('button[data-post-destroy]').click(function () {
			var allPostCentent = $(this).parents('.am-panel');
			var id = $(this).attr('data-post-destroy');
			var url = '/Admin/post/'+id+'/destroy';
			console.log(url);
			$.post(url, function(data) {
				if(data==1) {

					allPostCentent.after('<div class="am-panel am-panel-primary"><div class="am-panel-hd am-text-center">删除成功</div></div>');
					var successTip = allPostCentent.next();
					allPostCentent.remove();
					successTip.fadeOut(2000);
				} else {
					alert('出现网络错误，请刷新');
				}
			});
		});
	});
</script>
@endsection
@extends('indexLayout')





@section('left_slide_navbar')
<div class="page-header">
  <h2>所有功能</h2>
</div>

<div class="list-group">
  <span class="list-group-item active">
    文章管理
  </span>
  <div class="indent"><!--缩进-->
  <a data-toggle="modal" data-target="#tagsModalForArticles" class="list-group-item">查看文章</a>
  <a href="http://localhost/User/articles/create" class="list-group-item">新增文章</a>
  <a href="#" class="list-group-item">修改文章</a>
  <a href="#" class="list-group-item">管理标签</a>
  </div>
</div>

@endsection

@section('mobile_navbar')
<div class="page-header">
  <h2>所有功能</h2>
</div>

<div class="list-group">
  <span class="list-group-item active">
    文章管理
  </span>
  <div class="indent"><!--缩进-->
  <a href="#" class="list-group-item">查看文章</a>
  <a href="#" class="list-group-item">新增文章</a>
  <a href="#" class="list-group-item">修改文章</a>
  <a href="#" class="list-group-item">管理标签</a>
  </div>
</div>

@endsection

@section('extra')

<div class="modal fade" id="tagsModalForArticles" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">选择一个标签</h4>
      </div>
      <div class="modal-body">
      @foreach($tags as $tag) 
      <a href="/User/viewArticlesByTag/{{$tag->id}}"><span class="label label-primary">{{ $tag->name }}</span></a>
      @endforeach  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary">选择</button>
      </div>
    </div>
  </div>
</div>

@endsection


@extends('admin.layout')

@section('admin-content')

<div class="am-u-sm-12 am-u-md-8">
<form action="{{url('Admin/post/store')}}" method="post" class="am-form" >
  <fieldset>
    <legend>新增文章</legend>
    <div class="am-form-group">
      <label for="post-title">文章标题</label>
      <input type="text" name="post-title" id="post-title" minlength="3" required/>
    </div>
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>

    <div class="am-form-group">
      <label for="post-content">文章内容：</label>
      <textarea  rows="8" name="post-content" required id="post-content" onPropertyChange="textCounter(upbook.post-content, 1500)" ></textarea>
<!--      剩余字数: <input name=remLen type=text id= "remLen " style= "background-color: #D4D0C8; border: 0; color: red " value=1500 size=3 maxlength=3 readonly> -->
    </div>

    <div class="am-form-group">
      <label for="tag-select">文章标签</label>
      <select id="tag-select" name="tag-select[]" multiple data-am-selected="{dropUp: 1, searchBox: 1, maxHeight: 200}">
      		  @foreach($tags as $tag)
              <option value="{{$tag->id}}">{{$tag->name}}</option>
              @endforeach
      </select>
    </div>

    <div class="am-form-group">
      <label for= "newTag">新增标签</label>
      <input name="new-tag" type="text" id="newTag">
    </div>

    <button class="am-btn am-btn-secondary" type="submit">提交</button>
  </fieldset>
</form>
</div>
@endsection
@extends('admin.layout')

@section('admin-content')

<div class="am-cf am-padding">
  <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">标签管理</strong></div>
</div>

<hr/>
<div class="am-u-sm-12 am-u-md-8">

<form class="am-form" id="new-tagName">
  <fieldset>
    <legend>新增一个标签</legend>
    <div class="am-form-group">
      <label for="tagName">填写标签名称</label>
      <input type="text" id="tagName" name="new-tagName" minlength="3" placeholder="输入用户名（至少 3 个字符）" required/>
    </div>
    <button class="am-btn am-btn-secondary" type="submit">提交</button>
  </fieldset>
</form>

<form  class="am-form" id="update-tagName">
  <fieldset>
    <legend>修改标签名标签</legend>
    <div class="am-form-group">
      <label for="tagName">选择要修改的标签名称</label>
            <p><select name="old-tagId" data-am-selected="{btnSize: 'sm', searchBox: 1, maxHeight: 200}">
              @foreach($tags as $tag)
              <option value="{{$tag->id}}">{{$tag->name}}</option>
              @endforeach
            </select></p>
      <label for="newTAgName">新的标签名为</label>
      <input type="text" name="update-tagName" id="newTagName"  placeholder="输入用户名（至少 3 个字符）" required/>      
    </div>
    <button class="am-btn am-btn-secondary" type="submit">提交</button>
  </fieldset>
</form>

<form  method="post" class="am-form" id="delete-tag">
  <fieldset>
    <legend>删除标签</legend>
    <div class="am-form-group">
      <label for="tagName">*为文章标签</label>
            <p><select  name="delete-tags[]" multiple="multiple" data-am-selected="{dropUp: 1, searchBox: 1, maxHeight:200}">
              @foreach($tags as $tag)
              <option value="{{$tag->id}}" > {{$tag->name}}</option>
              @endforeach
          </select></p>      
    </div>
    <button class="am-btn am-btn-secondary" type="submit">提交</button>
  </fieldset>
</form>

</div>


@endsection

@section('js')
<script type="text/javascript">
var submitForTags = function(url, ele) {
		console.log(ele);
		var submitButton = ele.find(':submit');
			var value = ele.serialize();
			console.log(value);
			console.log(submitButton);
			submitButton.html('提交中...').attr('disabled', true);
			$.get(url, value , function(data) {
				submitButton.html('提交').attr('disabled', false);
				if(data == 1) {
					sucessTip(submitButton, '操作成功!');
				} else {
					alert('网络错误，请刷新');
				}
			});
	}


function sucessTip(ele, tip) {
	ele.after('<div class="am-panel am-panel-primary"><div class="am-panel-hd am-text-center">'+tip+'</div></div>').next().fadeOut(2000);
}


var sub = function() {
	var that;

	that = {
		sub: submitForTags
	};
	return that;
};


	
	$(document).ready(function() {
		$('#new-tagName').submit(function(e) {
			e.preventDefault();
			var sub1= new sub();
			sub1.sub('/Admin/tags/create', $(this));	
		});

		$('#update-tagName').submit(function(e) {
			e.preventDefault();
			var sub2 = new sub();
			sub2.sub('/Admin/tags/update', $(this));
		});

		$('#delete-tag').submit(function(e) {
			e.preventDefault();
			var sub3 = new sub();
			sub3.sub('/Admin/tags/delete', $(this));
		});
	});
	
</script>
@endsection
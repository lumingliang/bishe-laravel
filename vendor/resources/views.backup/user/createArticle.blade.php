
@extends('user.layout')



 @section('main_content')
<div class="page-header head">
    <h3>新增文章</h3>
</div>
<div class="m_content">
    <!--内容体wapper-->
    <form class="form-horizontal" id="post_form">
    <div class="form-group has-success form-group-lg">
        <label class="control-label col-lg-2" for="title_1">文章标题</label>
        <div class="col-lg-9">
        <div class="input-group">
            <span class="input-group-addon">@</span>
            <input type="text" name="title" class="form-control" id="title_1">
            <span class="glyphicon glyphicon-ok form-control-feedback"></span>
        </div>
        </div>
    </div>
    <div class="form-group has-success form-group-lg">
    	<label class="control-label col-lg-2" for="textarea_1">文章内容</label>
    	<div class="col-lg-9">
        <textarea name="content"></textarea>
        </div>
    </div>

	<div class="form-group has-success form-group-lg">
    	<label class="control-label col-lg-2" for="textarea_1">标签</label>
    	<div class="col-lg-6">
    		<input type="text" name="tag" id="autocomplete" class="form-control" >
    	</div>
    	<div class="col-lg-3" style=" padding-top:6px;">
		    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tagsModal">选择</button>
		    <button type="button" class="btn btn-primary" onclick="tagsDelete()">删除</button>
		</div>
    </div>
    <div class="form-group has-success form-group-lg">
    	<div class="col-lg-9 col-lg-offset-2">
    		<button type="button" id="create_post" class="btn btn-primary">提交文章</button>
		</div>
	</div>
    </form>

</div>
@endsection

@include('user.tags')



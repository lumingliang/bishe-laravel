
@extends('admin.layout')

@section('admin-content')

<div class="am-u-sm-12 am-u-md-8">
<h2>{{$post->title}}</h2>
<h4 class="am-article-meta blog-meta">by <a href="">lumin</a> posted on {{$post->created_at}} under test</h4>

<article>
<?php echo EndaEditor::MarkDecode($post->content); ?>
</article>
</div>

@endsection

@extends('indexLayout')

@section('link')
<style type="text/css">
	.pagination{
		position: relative;
		text-align: center;
		padding-left: 0;
    margin: 1.5rem 0;
    list-style: none;
    color: #999;
	}
	.pagination>li {
		display: inline-block;
	}
	.pagination>li>a {
		position: relative;
    display: block;
    padding: .5em 1em;
    text-decoration: none;
    line-height: 1.2;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 0;
    margin-bottom: 5px;
    margin-right: 5px;
	}
</style>
@endsecion

@section('left_slide_navbar')

<h1>我是标题</h1>

@endsection
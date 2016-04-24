<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bg_Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $tags;
    private $request;
    private $ajaxVal;
    private $input;

    public function index()
    {
         return view('admin.tagManage')->withTags($this->tags)->withTitle('标签管理')->with('isTagManage', true); //->with('tagId', '');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //var_dump($_GET['new-tagName']);
        /*
        $this->ajaxVal = $this->getPostVal();

        var_dump($this->ajaxVal);
        exit();
        */
        //Bg_Tag::create(['name' => $this->ajaxVal['new-tagName']]);
        Bg_Tag::create(['name' => $this->input['new-tagName'] ]);
        echo 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        /*
        $this->ajaxVal = $this->getPostVal();
        $tag =  Bg_Tag::find($this->ajaxVal['old-tagId']);
        $tag->name = $this->ajaxVal['update-tagName'];
        $tag->save();
        echo 1;
        */
        $tag = Bg_Tag::find($this->input['old-tagId']);
        $tag->name = $this->input['update-tagName'];
        echo 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //以下处理从序列化值中取出应有的值，因为slect multipule为数组，通过$序列化获得值是不规则的，不想表单action post那样可以直接取出
        /* 因为使用jquery selialize 不当导致序列化取得数据不当,
        $value = $this->request->input('value');
        $temp = explode('&', $value);
        $real = [];
        $i = 0;
        foreach ($temp as $val) {
            $real[$i] = explode("=", $val)[1];
            $i++;
        }
        $t = Bg_Tag::destroy($real);
        if($t) {
            echo 1;
        } else {
            echo 0;
        }
       /*/
        //这是真正的代码
       $flag = Bg_Tag::destroy($this->input['delete-tags']);
        if($flag) {
            echo 1;
        } else {
            echo 0;
        }


         
    }

    public function __construct(Request $request) {
        $this->tags = Bg_Tag::all();
        $this->input= $request->input();
    }

    public function getPostVal() {
        $value = $this->request->input('value');
        $temp = explode('&', $value);
        $real = [];
        foreach ($temp as $val) {
            $t = explode('=', $val);
            $real[$t[0]] = $t[1];
        }
        return $real;
    }
}

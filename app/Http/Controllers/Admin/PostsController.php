<?php

namespace App\Http\Controllers\Admin;


//use Request;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag_Post;
use App\Bg_Tag;
use App\Bg_Post;
use DB;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $posts;
    private $tagId;
    private $tags;

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.postCreate')->withTitle('新增文章')->withTags($this->tags)->with('isCreatePost', true)->with('tagId', '');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //数据库事务处理，如果不成功则回滚, 注意闭包传值
        DB::transaction(function() use($request)
{
        $this->postId = Bg_Post::create(['title' => $request->input('post-title'), 'content' => $request->input('post-content')])->id;

        if($request->input('new-tag')) {
            $newTagId = Bg_Tag::create(['name' => $request->input('new-tag')])->id;
            Tag_Post::create(['postId' => $this->postId, 'tagId' => $newTagId]);
        }

        if(is_array($request->input('tag-select')) ) {

            foreach ($request->input('tag-select') as $tagId) {
                Tag_Post::create(['postId' => $this->postId, 'tagId' => $tagId]);
            }
        } else if($request->input('tag-select')){
            echo $request->input('tag-select');
            exit();
            Tag_Post::create(['postId' => $this->postId, 'tagId' => $request->input('tag-select')]);
        }

});
        return redirect('Admin/post/'.$this->postId);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.postDetail')->withTags($this->tags)->withPost(Bg_Post::find($this->postId))->withTitle('文章详情')->with('tagId', $this->tagId);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        return view('admin.postEdit')->withTags($this->tags)->withPost(Bg_Post::find($this->postId))->withTitle('文章修改')->with('tagId', $request->route('tagEditId'));         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //var_dump($request->input()); 
        $post=Bg_Post::find($this->postId);
        //echo $post;
        $post->title = $request->input('post-title');
        $post->content = $request->input('post-content');
        $post->save();
        Tag_Post::where('postId', $this->postId)->delete();
        if($request->input('new-tag')) {
            $newTagId = Bg_Tag::create(['name' => $request->input('new-tag')])->id;
            Tag_Post::create(['postId' => $this->postId, 'tagId' => $newTagId]);
        }

       if(is_array($request->input('tag-select')) ) {

            foreach ($request->input('tag-select') as $tagId) {
                Tag_Post::create(['postId' => $this->postId, 'tagId' => $tagId]);
            }

        } else {
            Tag_Post::create(['postId' => $this->postId, 'tagId' => $request->input('tag-select')]);
        } 


        return redirect('Admin/post/'.$this->postId);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
      //  echo $this->postId;
         $t = Bg_Post::destroy($this->postId);
         Tag_Post::where('postId', $this->postId)->delete();
         if($t!=0) {
            echo 1;
        } else {
            echo 0;
        }
                
    }

    public function postsListByTagId($id)
    {
        $tags = Bg_Tag::all();
        return view('admin.index')->withPosts($this->posts)->withTitle('文章列表')->withTags($tags)->with('tagId', $id);

    } 

    public function __construct( Request $request)    
    {
        //var_dump($request);
        $this->request = $request;
        $this->tagId = $request->route('tagId');
        $this->postId = $request->route('postId');
//        echo $this->tagId;
        $this->tags = Bg_Tag::all();
        if($this->tagId) {
            $this->posts = Tag_Post::postsListByTagId($this->tagId);
        }
    }
         
}

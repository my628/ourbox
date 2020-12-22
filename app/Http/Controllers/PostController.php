<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use League\CommonMark\Extension\Table\TableExtension;
use Carbon\Carbon;
use App\Http\Resources\Posts as PostsResource;

class PostController extends Controller
{
    //use SoftDeletes;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*
        $posts = Post::all();
        view('home.post.index', compact('posts'));
        */
        return PostsResource::collection(Post::all());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('home.post.create', compact('posts', 'categories', 'tags'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array_merge($request->all(), [
            'user_id' => \Auth::id(),
            'last_user_id' => \Auth::id(),
            'published_at' => now(),
        ]);
        $post = new Post();
        $post->fill($data);
        $post->save();
        $post->categories()->sync($request->get('category_id', []));
        
        $tag_titles = $request->get('tag_title', []);
       
        foreach ($tag_titles as $tag_title)
        {
            echo($tag_title);
            $tag = Tag::firstOrCreate(['tag' => $tag_title], ['tag' => $tag_title, 'title' => $tag_title, 'description_txt' => '']);
            $post->tags()->save($tag);
        }
        $post->tags()->sync(Tag::whereIn('tag', $tag_titles)->get()->pluck('id')->all());
        $post->tags()->detach();
        
        //$this->tags()->detach();
        //array_merge()

        /*
        $tags = $request->get('tag_title', []);
        Tag::addNeededTags($tags);
        
        
        $this->validate($request, [
            'title'=>'required|max:100',
            'content' =>'required',
        ]);

        $title = $request['title'];
        $content = $request['content'];
        $tags = $request['tags'];

        $post = Post::create([
            'title' => $title,
            'content' => $content,
            'tags' => $tags,
            'slug' => 'test',
            'published_at' => Carbon::now(),
        ]);
        return ;
        $post->save();
        redirect()->route('post.index')->with('success', '标签「' . $request . '」创建成功.')
        */
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $post = Post::findOrFail($id);

        $environment = Environment::createCommonMarkEnvironment();

        // Add this extension
        $environment->addExtension(new TableExtension());
        $config = [
            // Extension defaults are shown below
            // If you're happy with the defaults, feel free to remove them from this array
            'table_of_contents' => [
                'html_class' => 'table-of-contents',
                'position' => 'top',
                'style' => 'bullet',
                'min_heading_level' => 1,
                'max_heading_level' => 6,
                'normalize' => 'relative',
            ],
        ];
        // Instantiate the converter engine and start converting some Markdown!
        $converter = new CommonMarkConverter($config, $environment);
        echo $converter->convertToHtml('| header 1 | header 2 | header 2 || :------- | :------: | -------: || cell 1.1 | cell 1.2 | cell 1.3 || cell 2.1 | cell 2.2 | cell 2.3 |');
        
        return view('blog.detail')->with('post', $post);
         /**/
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
        echo('edit in');
        return view('posts.edit', ['posts' => Post::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = array_merge($request->all());
        //echo($data['title']);
        //echo($data['content']);
        //json_decode($request->get('tags', []));.0.text

        $post = Post::findOrFail($id);
        $post->update($data);
        $texts = $request->input('tags.*.text');
       
        foreach ($texts as $text)
        {
            Tag::updateOrInsert(
                ['tag' => $text],
                ['tag' => $text, 'title' => $text, 'description_txt' => '']
            );
            echo $text;
        }
        $post->tags()->sync(Tag::whereIn('tag', $texts)->get()->pluck('id')->all());
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        echo('destroy in');
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect('/post')->with('success', '文章「' . $post->title . '」删除成功.');
    }
}
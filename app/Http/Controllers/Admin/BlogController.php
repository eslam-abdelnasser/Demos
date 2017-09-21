<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\BlogDescription;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\VarDumper\Tests\Fixtures\NotLoadableClass;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = Blog::paginate('10');
        return view('admin.blogs.index')->with('blogs',$blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $languages = Language::where('status','=','1')->get();
        return view('admin.blogs.create')->with('languages',$languages);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $languages = Language::where('status','=','1')->get();
        $rules = [
//            'image_url' => 'required|mimes:jpg,jpeg,png,dmp',
            'homepage_status' => 'required',
            'status' => 'required'
        ];
        foreach ($languages as  $language){
            $rules['auther_name_'.$language->label] = 'required';
            $rules['title_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
            $rules['meta_title_'.$language->label] = 'required|max:255';
            $rules['meta_description_'.$language->label] = 'required|max:255';
            $rule['slug_'.$language->label] = 'required';
        }


        $this->validate($request,$rules);

        $blog = new Blog();
        $blog->home_page_status = $request->homepage_status;
        $blog->status = $request->status;
        $blog->image_url = time().$request->image_url;
        $blog->save();

        foreach ($languages as $language){
            $blogDescription = new BlogDescription();
            $blogDescription->lang_id = $language->id;
            $blogDescription->blog_id = $blog->id;

            $blogDescription->auther_name = $request->get('auther_name_'.$language->label);
            $blogDescription->title = $request->get('title_'.$language->label);
            $blogDescription->description = $request->get('meta_title_'.$language->label);
            $blogDescription->meta_title = $request->get('description_'.$language->label);
            $blogDescription->meta_description = $request->get('meta_description_'.$language->label);
            $blogDescription->slug = "Slug Here";
            $blogDescription->save();
        }

        return redirect()->back();

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
    public function update(Request $request, $id)
    {
        //
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
        $blog = Blog::find($id);
        $blogdescriptions = BlogDescription::where('service_id',$blog->id);
        foreach ($blogdescriptions as $blogdesc){
            $blogdesc->delete();
        }
        $blog->delete();
        return redirect()->back();
    }
}

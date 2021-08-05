<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogHashtag;
use App\Models\Hashtag;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $search = (!empty($_GET["search"])) ? ($_GET["search"]) : ('');
        if($search)
        {
            $latestBlog = Blog::with('hashtags')
                        ->where('blog_category_id', config('greenplaces.artical_id'))
                        ->where('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('short_description', 'LIKE', '%' . $search . '%')
                        ->orWhereHas('hashtags', function($tag) use($search) {
                            $tag->where('name', 'like', '%' . $search . '%');
                        })
                        ->orderBy('id', 'desc')
                        ->paginate(config('greenplaces.no_of_latest_artical_display_per_page'));
        }else{
            $latestBlog = Blog::with('hashtags')
                        ->where('blog_category_id', config('greenplaces.artical_id'))
                        ->orderBy('id', 'desc')
                        ->paginate(config('greenplaces.no_of_latest_artical_display_per_page'));
        }

        $popularBlog = Blog::with('hashtags')->where('blog_category_id', config('greenplaces.artical_id'))
                    ->where('is_popular', '1')
                    ->orderBy('id', 'desc')
                    ->limit(config('greenplaces.no_of_popular_artical_display_per_page'))
                    ->get();

        $sliderBlog = Blog::with('hashtags')->where('blog_category_id', config('greenplaces.artical_id'))
                        ->where('is_slider', '1')
                        ->orderBy('id', 'desc')
                        ->first();

        $popularHashtags = Hashtag::where('is_popular', '1')
                        ->orderBy('id', 'desc')
                        ->get();
  
        return view("main.blog", compact('latestBlog', 'sliderBlog', 'popularBlog', 'popularHashtags'));
    }

    public function blogDetail(Request $request, $blog_slug)
    {
        $blog = Blog::with('hashtags')->where('slug', $blog_slug)->first();
        if( $blog ) {      
            $nextBlog = Blog::with('hashtags')->where('blog_category_id', config('greenplaces.artical_id'))
                        ->where('id', '<', $blog->id)
                        ->orderBy('id','desc')
                        ->limit(1)
                        ->get();

            $previous = Blog::where('blog_category_id', config('greenplaces.artical_id'))
                        ->where('id', '>', $blog->id)
                        ->orderBy('id','asc')
                        ->limit(1)
                        ->value('slug');

            return view('main.blog-inner',compact('blog','nextBlog','previous'));
        }
    }

    public function tagBlogListing(Request $request, $tag_slug)
    {
        $latestBlog = Blog::whereHas('hashtags', function ($query) use ($tag_slug){
                            $query->where('slug', $tag_slug);
                        })
                        ->where('blog_category_id', config('greenplaces.artical_id'))
                        ->orderBy('id', 'desc')
                        ->paginate(config('greenplaces.no_of_latest_artical_display_per_page'));

        $popularBlog = Blog::with('hashtags')->where('blog_category_id', config('greenplaces.artical_id'))
                    ->where('is_popular', '1')
                    ->orderBy('id', 'desc')
                    ->limit(config('greenplaces.no_of_popular_artical_display_per_page'))
                    ->get();

        $sliderBlog = Blog::with('hashtags')->where('blog_category_id', config('greenplaces.artical_id'))
                        ->where('is_slider', '1')
                        ->orderBy('id', 'desc')
                        ->first();

        $popularHashtags = Hashtag::where('is_popular', '1')
                        ->orderBy('id', 'desc')
                        ->get();
  
        return view("main.blog", compact('latestBlog', 'sliderBlog', 'popularBlog', 'popularHashtags'));
    }
}

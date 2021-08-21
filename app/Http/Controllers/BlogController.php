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

        $blog = Blog::get();


        return view("main.blog", compact('blog'));
    }

    public function blogDetail(Request $request, $blog_slug)
    {
        $blog = Blog::where('slug', $blog_slug)->first();
        if( $blog ) {
            return view('main.blog-inner',compact('blog'));
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

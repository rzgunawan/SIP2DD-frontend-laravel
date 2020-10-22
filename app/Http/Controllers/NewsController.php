<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Share;

use BenSampo\Embed\Services\YouTube;
use BenSampo\Embed\Rules\EmbeddableUrl;
use App\Repositories\News\NewsInterface;

class NewsController extends Controller
{
    public function __construct(NewsInterface $newsRepo){
        $this->newsRepo = $newsRepo;
    }

    public function index()
    {
        $menu = null;
        $highlights = $this->newsRepo->getHighlight(); 
        $govNews = $this->newsRepo->getNationalGovNews();
        $localgovNews = $this->newsRepo->getLocalGovNews();
        $galleryNews = $this->newsRepo->getGalleryVideos();
        $p2dd_info = null;
        
        return view('news.newsPage', [
                        'highlights' => $highlights, 
                        'govNews' => $govNews,
                        'localgovNews' => $localgovNews,
                        'galleryNews' => $galleryNews
                        ]);
    }

    public function searchNews(Request $request)
    {
        $judul = "";
        $count = 0;
        $searchNews = null;
        if($request->has('keyword')) {
            if($request->keyword != ''){
                $judul = $request->keyword;
                $searchNews = $this->newsRepo->searchNews($judul);
                if($searchNews != null){
                    $count = count($searchNews);
                }
            }
        }
        
        //dd($searchNews);
        return view('news.searchNewsPage', [
            'count' => $count,
            'keyword' => $judul,
            'searchNews' => $searchNews,
        ]);
    }


}

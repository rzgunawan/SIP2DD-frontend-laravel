<?php

namespace App\Repositories\Home;
use App\Repositories\Home\HomeInterface;
use App\Http\Traits\ApiContentsTrait;

Class HomeRepository implements HomeInterface{

    use ApiContentsTrait;
    
    public function getGovServices(){
        $govServices = $this->getApiContents("1535.json?offset=null&limit=6");
        if($govServices != null){
            $govServices = $govServices['data']['layanan'];
        }
        return $govServices;
    }

    public function getNewsItems(){
        $newsItems = $this->getApiContents("1554.json?offset=1&limit=5");
        if($newsItems != null){
            $newsItems = $newsItems['data']['berita_highlight_page'];
        }
        return $newsItems;
    }

    public function getEducationNewsItems(){
        // $eduNewsItems = $this->getApiContents("1554.json?offset=1&limit=5");
        // if($eduNewsItems != null){
        //     $eduNewsItems = $eduNewsItems['data']['berita_highlight_page'];
        // }
        $eduNewsItems = $this->getApiContents("1576.json");
        if($eduNewsItems != null){
            $eduNewsItems = $eduNewsItems['data']['edukasi_list'];
        }
        return $eduNewsItems;
    }

    public function getGalleryNewsItems(){
        $galleryNewsItems = $this->getApiContents("1533.json?offset=null&limit=5");
        if($galleryNewsItems != null){
            $galleryNewsItems = $galleryNewsItems['data']['galeri_gambar'];
        }
        return $galleryNewsItems;
    }

    public function searchNewsItems($keyword, $offset=null){
        // $newsItems = $this->getApiContents("1532.json?judul=".$keyword."&kata_kunci=".$keyword);
        if($offset == null){
            $newsItems = $this->getApiContents("1532.json?input=".$keyword."&offset=null&limit=10");
        }else{
            $newsItems = $this->getApiContents("1532.json?input=".$keyword."&offset=".$offset."&limit=10");
        }
        
        //$newsItems = $this->getApiContents("1532.json?input=".$keyword."&offset=null&limit=10");
        if($newsItems != null){
            $newsItems = $newsItems['data']['berita_search'];
            if(count($newsItems) == 0){
                $newsItems = null;
            }
        }
        return $newsItems;
    }

    
    public function getCountsearchNews($keyword){
        $newsItems = $this->getApiContents("1553.json?input=".$keyword);
        if($newsItems != null){
            $newsItems = $newsItems['data']['cnt_search'][0]['cnt'];
        }
        return $newsItems;
    }
}
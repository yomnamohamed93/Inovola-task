<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{

    public function index(Request $request){
         $news_data=$this->readNewsData();
         return view('welcome',compact('news_data'));

    }
    public function sorting(Request $request){
        $sorting_key=$request->sorting_key;
        $sorting_type=$request->sorting_type;

        $news_data=$this->readNewsData();
        $sorted_news_data=$sorting_type=='desc'?collect($news_data)->sortByDesc($sorting_key)->toArray():
        collect($news_data)->sortBy($sorting_key)->toArray();
        $html_data='';
        foreach($sorted_news_data as $item){
            $html_data.='<div class="col-4 py-2">
                <div class="card">
                    <div class="card-body">
                        <div class="pb-4">
                            <h4 class="card-title mb-0">'.$item["title"].'</h4>
                            <small class="card-subtitle text-muted">'.$item["datetime"].'</small>
                        </div>
                        <p class="card-text">'.$item["Content"].'</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <div class="text-muted">Rating: '.$item["rating"].'</div>
                        <div class="text-muted">Source: '.$item["source"].'</div>
                    </div>
                </div>
            </div>';
        }
        return ($html_data);
    }
    private function readNewsData(){
        // Read json File
        $jsonString = file_get_contents(base_path('news-data.json'));
        $data = json_decode($jsonString, true);

        $ag1_data=$data['ag1']['latestnews'];
        $ag2_data=$data['ag2']['latestnews'];
        $ag3_data=$data['ag3']['latestnews'];
        foreach($ag1_data as &$item){
            $item['source']='ag1';
            $item['datetime']=date("M d,Y H:i:s",strtotime($item['datetime']));
        }
        foreach($ag2_data as &$item){
            $item['source']='ag2';
            $item['datetime']=date("M d,Y H:i:s",strtotime($item['datetime']));
        }
        foreach($ag3_data as &$item){
            $item['source']='ag3';
            $item['datetime']=date("M d,Y H:i:s",strtotime($item['datetime']));
        }
        return array_merge($ag1_data,$ag2_data,$ag3_data);

    }


}

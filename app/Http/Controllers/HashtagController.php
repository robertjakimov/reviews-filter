<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HashtagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('reviews'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    $this->validate(request(),[
        'hashtag' => 'required'
        ]);
        
    $data = request()->all();

    $url = 'https://www.instagram.com/web/search/topsearch/?context=blended&query='.$data['hashtag']. '&__a=1';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, Array("User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15") ); 
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result= curl_exec ($ch);
    curl_close ($ch);
    $array = json_decode($result, true);
    
    foreach ($array['hashtags'] as $value)
    {
     
        $database = new hashtag();
        $database->name = $value['hashtag']['name'];
        $database->id = $value['hashtag']['id'];
        $database->media_count = $value['hashtag']['media_count'];
        $database->use_default_avatar = $value['hashtag']['use_default_avatar'];
        $database->media_count = $value['hashtag']['media_count'];
        $database->profile_pic_url = $value['hashtag']['profile_pic_url'];  
        $database->search_result_subtitle = $value['hashtag']['search_result_subtitle'];
        $database->save();
    }

    session()->flash('message','Search Completed Successfully!');

    return view('reviews', compact('array')); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function show(hashtag $hashtag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function edit(hashtag $hashtag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hashtag $hashtag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function destroy(hashtag $hashtag)
    {
        //
    }
}

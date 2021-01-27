<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

function getData ($url,$token) { // get data from API function
$curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array( "Content-Type: application/json",
"Authorization: Bearer " .$token .""
  ),
 ));
    return json_decode(curl_exec($curl), true); }

class ReviewsController extends Controller
{
    public $minRating;

    public function index()
    {

        return view('reviews'); 
    }

    public function show(Request $request)
    {
      
 //   $this->validate(request(),[
   //     'hashtag' => 'required'
    //    ]);
        
$inputValues = request()->all(); // $data['hashtag']

$apiURL = "https://embedsocial.com/admin/v2/api/reviews?reviews_ref=​0d44e0b0a245de6fc9651f870d8b44efc4653184";
$apiToken = "escfe7569d859dd903d77664e9983edf";
global $minRating; 
$minRating = $inputValues['min-rating'];
$textFilter = $inputValues['text'];
$ratingFilter = ($inputValues['rating'] == 0) ? SORT_ASC : SORT_DESC;
$dateFilter = ($inputValues['date'] == 0) ? SORT_ASC : SORT_DESC;
$data = getData($apiURL, $apiToken);

// everything is ready, lets make some magic :)
    
    $sort_array = array();
    
    foreach ($data['reviews'] as $key=>$value) 
    {
        $sort_array['rating'][$key] = $value['rating'];
        $sort_array['reviewCreatedOnDate'][$key] = $value['reviewCreatedOnDate'];
     }
    
    array_multisort($sort_array['rating'], $ratingFilter, $sort_array['reviewCreatedOnDate'], $dateFilter,$data['reviews']);



$dataText = array_filter($data['reviews'], array($this,"filterText"));
$dataNoText = array_filter($data['reviews'], array($this,"filterNoText"));

 // create final array

$finalArray = ($textFilter) ? array_merge($dataText,$dataNoText) : array_merge($dataNoText,$dataText);

  // print_r($finalArray);

    session()->flash('message','Search Completed Successfully!');

   // return "test";

  return view('reviews', compact('finalArray')); 

    } 

    public function filterText($inputArray) { // review with text + rating filter
        global $minRating; 
        if ($inputArray['reviewText']!="" && $inputArray['rating'] >= $minRating  ) return true;
        else return false; 
    }

    public function filterNoText($inputArray) { // empty review + rating filter
        global $minRating;
        if ($inputArray['reviewText'] == ""  && $inputArray['rating'] >= $minRating ) return true;
        else return false;
}
}



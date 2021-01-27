@extends('layouts/app')

@section('content')
<div class="container">
  <div class="row">
  <div class="col-12">
  <hr>  
  <h3 class="text-center">Filter Reviews</h3>
  <hr>
   @if (session()->has('message'))

            <div class="alert alert-success">

                {{ session()->get('message') }}

            </div>

        @endif

@if ($errors->any())
     @foreach ($errors->all() as $error)
         <div class="alert alert-danger">
         {{$error}}
         </div>
     @endforeach
 @endif



 <form class="form-inline" action="{{URL::route('search')}}" method="POST">
  {{ csrf_field() }}
  <div class="form-group">

  <label for="rating" style="margin-left: 9px; margin-bottom: 14px;">Order by rating: </label>
  <select class="form-control" name="rating" style="margin-left: 9px; margin-bottom: 14px; min-width:120px;">
  <option value="1" {{ old('rating') == 1 ? "selected" : "" }}> Highest First</option>
  <option value="0" {{ old('rating') == 0 ? "selected" : "" }}> Lowest First </option>
</select> 
  </div>
   <div class="form-group">
    <label for="min-rating" style="margin-left: 9px; margin-bottom: 14px;">Minimum rating: </label>
    <select class="form-control" name="min-rating" style="margin-left: 9px; margin-bottom: 14px; min-width:120px;">
  <option value="5" {{ old('min-rating') == 5 ? "selected" : "" }}>5</option>
  <option value="4" {{ old('min-rating') == 4 ? "selected" : "" }}>4</option>
  <option value="3" {{ old('min-rating') == 3 ? "selected" : "" }}>3</option>
  <option value="2" {{ old('min-rating') == 2 ? "selected" : "" }}>2</option>
  <option value="1" {{ old('min-rating') == 1 ? "selected" : "" }}>1</option>

  
</select>
  </div>
  <div class="form-group">
    <label for="date" style="margin-left: 9px; margin-bottom: 14px;">Order by date: </label>
   <select class="form-control" name="date" style="margin-left: 9px; margin-bottom: 14px; min-width:120px;">
  <option value="1" {{ old('date') == 1 ? "selected" : "" }}>Newest First</option>
  <option value="0" {{ old('date') == 0 ? "selected" : "" }}>Oldest First</option>
</select>
  </div>
  <div class="form-group">
    <label for="hashtag" style="margin-left: 9px; margin-bottom: 14px;">Prioritize by text: </label>
  <select class="form-control" name="text" style="margin-left: 9px; margin-bottom: 14px; min-width:120px;">
  <option value="1" {{ old('text') == 1 ? "selected" : "" }}>Yes</option>
  <option value="0" {{ old('text') == 0 ? "selected" : "" }}>No</option>
</select>
  </div>
  <button type="submit" class="btn btn-info" style="margin-left: 9px; margin-bottom: 14px;">Search </button>
</form> 
  <table class="table table-striped table-bordered" style="width:100%; margin-top: 10px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Review Text</th>
                <th>Rating</th>
                <th>Reviewer Name</th>
                <th>Created on</th>
               
            </tr>
        </thead>
        <tbody>
   

      @php
       if (!empty($finalArray)) {
       @endphp
       @foreach ($finalArray as $value)
       @php 
       
       @endphp
                         <tr>
                 <td>{{ $value['id'] }} </td>
         <td> {{ $value['reviewText'] }} </td>
                 <td> {{ $value['rating'] }} </td> 
                 <td> {{ $value['reviewerName'] }} </td> 
                 <td> {{ $value['reviewCreatedOnDate'] }} </td> 
                

                           
                      </tr>
                                             
                                             @endforeach
                                             @php
                                           }
                                           @endphp

           
                                        
                     </tbody>
           </table>
           </div>
         </div>
       </div>

@endsection


                               

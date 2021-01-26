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
 <form class="form-inline" action="{{ url('/')  }}" method="POST">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="hashtag" style="margin-left: 9px; margin-bottom: 14px;">Order by rating: </label>
  <select class="form-control" aria-label="Default select example" style="margin-left: 9px; margin-bottom: 14px; min-width:120px;">
  <option value="true" selected>Highest First</option>
  <option value="false">Lowest First </option>
</select>
  </div>
   <div class="form-group">
    <label for="hashtag" style="margin-left: 9px; margin-bottom: 14px;">Minimum rating: </label>
    <select class="form-control" aria-label="Default select example" style="margin-left: 9px; margin-bottom: 14px; min-width:120px;">
  <option value="5" selected>5</option>
  <option value="4">4</option>
  <option value="3">3</option>
  <option value="2">2</option>
  <option value="1">1</option>
</select>
  </div>
  <div class="form-group">
    <label for="hashtag" style="margin-left: 9px; margin-bottom: 14px;">Order by date: </label>
   <select class="form-control" aria-label="Default select example" style="margin-left: 9px; margin-bottom: 14px; min-width:120px;">
  <option value="true" selected>Newest First</option>
  <option value="false">Oldest First</option>
</select>
  </div>
  <div class="form-group">
    <label for="hashtag" style="margin-left: 9px; margin-bottom: 14px;">Prioritize by text: </label>
  <select class="form-control" aria-label="Default select example" style="margin-left: 9px; margin-bottom: 14px; min-width:120px;">
  <option value="true" selected>Yes</option>
  <option value="false">No</option>
</select>
  </div>
  <button type="submit" class="btn btn-info" style="margin-left: 9px; margin-bottom: 14px;">Search</button>
</form> 
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
   


   <tr> 
<td>2097047​</td>
<td>​5 star review</td>
<td>5</td>
<td>Reviewer #20</td>
<td>2021-01-25T13:00:35+00:</td>




   </tr>
     <tr> 
<td>2097047​</td>
<td>​5 star review</td>
<td>5</td>
<td>Reviewer #20</td>
<td>2021-01-25T13:00:35+00:</td>




   </tr>

     <tr> 
<td>2097047​</td>
<td>​5 star review</td>
<td>5</td>
<td>Reviewer #20</td>
<td>2021-01-25T13:00:35+00:</td>




   </tr>

     <tr> 
<td>2097047​</td>
<td>​5 star review</td>
<td>5</td>
<td>Reviewer #20</td>
<td>2021-01-25T13:00:35+00:</td>




   </tr>


      @php
       if (!empty($array)) {
       @endphp
       @foreach ($array['hashtags'] as $value)
       @php 
       
       @endphp
                         <tr>
                 <td>{{ $value['hashtag']['media_count'] }} </td>
         <td> {{ $value['hashtag']['name'] }} </td>
                 <td> {{ $value['hashtag']['search_result_subtitle'] }} </td>             
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
           <script>
            $(document).ready(function() {
    $('#hashtag').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );
           </script>
@endsection
                               

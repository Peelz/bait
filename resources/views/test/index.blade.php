@extends('admin.html.page')
@section('content')
<form class="" action=" {{ action("TestController@store")}}" method="post">
  <div class="row">
    <div class="small-3 columns">
      <label for="middle-label" class="text-right middle">Image : </label>
    </div>
    <div class="small-9 columns">
      <fieldset>
        <legend>Photos</legend>
           <input type="file" id="file" accept="image/*" name="images1" value="Add photos" onchange="showThumbnails()"/>
           <input type="file" id="file" accept="image/*" name="images2" value="Add photos" onchange="showThumbnails()"/>
           <input type="file" id="file" accept="image/*" name="images3" value="Add photos" onchange="showThumbnails()"/>
           <input type="file" id="file" accept="image/*" name="images4" value="Add photos" onchange="showThumbnails()"/>

        </fieldset>
    </div>
  </div>
  <div class="row">
    <fieldset class="large-6 large-offset-6 columns" style="text-align:right;">
      <button class="button" type="submit" value="Submit">Submit</button>
      <button class="button" type="reset" value="Reset">Reset</button>
    </fieldset>

  </div>
</form>
@endsection

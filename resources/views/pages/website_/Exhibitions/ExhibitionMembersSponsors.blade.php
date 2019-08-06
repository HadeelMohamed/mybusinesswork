@extends('layouts.website')
@section('title','Exhibitions')
@section('content')
  
<div class="profile-company position-relative"  style="background-image:url({{asset('website/images/construction.jpg')}}); min-height:auto; ">




<div class="inner-sec" >

<div class="container">
<div class="row">
<div class="col-md-12">
<!--<div class="pin-div back-red"><i class="fas fa-map-marker-alt"></i> Germany</div>
-->
<!--<div class="line-profile"></div>
-->
<div class="clear"></div>

<h1 class="h1-profile">Sponser By</h1>
<!--<h5 class="h5-profil"> </h5>
--><div class="line-account back-red"></div>

<div class="container-fluid">
  <div class="str3 str_wrap">
    @if(isset($sponsors))
    @foreach($sponsors as $sponsor)
    <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/{{$sponsor->member_slug}}">
      <img src="{{asset('images/en')}}/med/{{$sponsor->photo}}" width="150">
    </a>
    @endforeach
    @endif
  </div>
</div>




                        <!--<div class="main-three"> <div class="star-float"><input class="rb-rating" value="2" type="text" data-min=0 data-max=5 data-step=1 disabled  /> </div><p class="review-profile">7 Review</p>
                         <div class="favourite">4 <i class="fas fa-bookmark color-red"></i></div></div>-->
<div class="clear"></div>



</div>



</div>

</div>

</div>
    
<div class="overlay-profile"></div>
                        <div class="bubble-bg"></div>
                        
                        
</div>



  
   <!--...........................inner-search...................-->
   {{--
   <div class="inner-search">
   <div class="container padding-right-filter position-relative">
   
   
   
   <div class="row" >
       <div class="col-lg-4 col-md-6 col-sm-12"><input class="form-control input-search" placeholder="search..."></div>
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="header-search-select-item back-gray-sec">
        <select data-placeholder="All Categories" class="chosen-select" name="category_id" required="">
          <option value="0" selected="">{{trans('website.all_categories')}}</option>
          @foreach($categories as $category)
            <option value="{{$category->exh_cat_id}}">{{$category->cat_name}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="header-search-select-item back-gray-sec">
        <select data-placeholder="All Categories" class="chosen-select" name="category_id" required="">
          <option value="0" selected="">{{trans('website.all_countries')}}</option>
          @foreach($countries as $country)
          <option value="{{$country->id}}">{{$country->name}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-12 text-right">
      <button class="btn back-red btn-search-result"><i class="fas fa-search"></i> Search</button>
    </div>               
               
                        
   </div>
   

   
 
   
  </div>
  
<div class="clear"></div>
  </div>
  --}}
  
       <!--...........................inner-result...................-->

    
<div class="section-co">

  <div class="container" id="paging_container8">

    <ul class="row content">
    <style>
    .padding-div p {
        height: 40px;
    }
    </style>
    @if(isset($exhibitors))
    @foreach($exhibitors as $exhibitor)
      <li class="col-lg-3 col-sm-6 item-ex">
        <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/ExhibitorProfile/{{$exh_slug}},{{$exhibitor->exhibitor_slug}}" class="hvr-grow">
          <div class="item-company">
            <div>
              <div class="position-relative">
                <img src="{{asset('images/en/med')}}/{{$exhibitor->exhibitor_cover}}" class="img-company">
                <div class="row">
                  <img src="{{asset('images/en/med')}}/{{$exhibitor->exhibitor_profile_pic}}" class="logo-company-2">
                </div>
              </div>
            </div>
            <div class="padding-div-2">
              <h3>{{$exhibitor->exhibitor_name}}</h3>
              <p>{{$exhibitor->category_name}}</p>
            </div>
          </div>
        </a>
      </li>
    @endforeach
    @endif
    </ul>

    <div class="page_navigation"></div>
    <div class="clear"></div>
  </div>

</div>

      @include('partials.website.footer')
<script src="{{asset('website/js/plugins.js')}}"></script>
<script src="{{asset('website/js/script.js')}}"></script>
<script src="{{asset('website/js/paginga.jquery.js')}}" ></script>
<script src="{{asset('website/js/star-rating.js')}}" ></script>
<script src="{{asset('website/js/jquery.liMarquee.js')}}" ></script>

        <script>
    $(document).ready(function(){
        $('#paging_container8').pajinate({
          num_page_links_to_display : 10,
          items_per_page : 10 
        });
      });     
    </script>
<script>
$('.rb-rating').rating({
                        'showCaption': true,
                        'stars': '5',
                        'min': '0',
                        'max': '3',
                        'step': '1',
                        'size': 'xs',
                      });
</script>
   

@endsection
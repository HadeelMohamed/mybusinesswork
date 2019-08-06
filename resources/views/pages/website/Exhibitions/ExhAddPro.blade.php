@extends('layouts.website')
@section('title','Profile')
@section('content')

<style type="text/css">
  #dd{
    border: 1px solid red;
  }
</style>
<style>
.inline-facts-wrap{
                    border-radius:10px;
                    padding:10px;
                    margin-top:10px;
                  }
</style>

<!--...........................profile-head...................-->
        <div class="big-dash">
          <div class="container">
            @include('partials.member.admin_panel')
            <div class="row">   
            @include('partials.member.side_bar')
              <!--   ....................article....................-->
              <article class="col-md-9">
                <div class="container-dashborad">
                  @include('partials.member.main_title')
                  @if(Auth::user()->wallet < 10 )
                  <!-- <div class="back-red active-acc">
                    <i class="fas fa-exclamation-triangle"></i>
                    @lang('website.payment_required')
                    You Must pay to active your Account 
                    <button class="btn  btn-dark btn-pay">@lang('website.pay_now')</button>
                  </div> -->
                  @endif
                  <div class="form-group">
                    <label for="exampleInputEmail1">website.country</label>
                    <div class="header-search-select-item select-admin">
                      <form action="{{route('ExhibitionJoinAddPro')}}" method="post">
                        @csrf
                        <input hidden="" name="exh_slug" value="{{$exh_slug}}">
                        <select data-placeholder="" class="chosen-select" name="pro_slug" id="pro_slug" required="">
                          <option selected disabled="" value="">@lang('website.exhibition_products')</option>
                          @foreach($ExhProList as $pro)
                          <option value="{{$pro->pro_slug}}">{{$pro->pro_name}}</option>
                          @endforeach
                        </select>
                        <div class="text-center button-save">
                          <button class="btn btn-success text-white">@lang('website.add')</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <hr>
                  <div style="height:20px;"></div>
                  <div class="table-scroll">
                    response
                    <table id="table_id" class=" table table-bordered" >
                      <thead>
                        <tr>
                          <!-- <th><center>website.order</center></th> -->
                          <th><center>website.product_name</center></th>
                          <th><center>website.status</center></th>
                          <th><center>website.options</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        
                                                                      
                      </tbody>
                    </table>
                  </div>  
              </article>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




@include('partials.website.footer')
@include('partials.member.alerts')

<script>
 

$(document).ready( function () {
    $('#table_id').DataTable( {
  } );
} );
</script>

@endsection
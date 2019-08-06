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

<!-- ...............profile-head...................-->
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
                    <a href="{{route('Authed_Member_Wallet_charge')}}" class="btn  btn-dark btn-pay">@lang('website.pay_now')</a>
                  </div> -->
                  @endif
                  <div class="form-group">
                    <label for="exampleInputEmail1">@lang('website.country')</label>
                    <div class="header-search-select-item select-admin">
                      <form action="{{route('ExhibitionJoinAddPro',['exh_slug'=>$exh_slug])}}" method="get">
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
                    request
                    <table id="table_id" class=" table table-bordered" >
                      <thead>
                        <tr>
                          <!-- <th><center>website.order</center></th> -->
                          <th><center>website.product_name</center></th>
                          <th><center>website.options</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($selected_products as $product)
                        <tr>
                          <td>{{$product->name}} - {{$product->pro_id}}</td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Option</button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" data-toggle="modal" data-target=".delete-pop{{$product->pro_id}}" style="cursor:pointer" ><i class="fas fa-trash-alt"></i> Delete</a>
                                <!-- delete -->
                                
                              </div>
                            </div>
                          </td>
                        </tr>
                        <div class="modal fade delete-pop{{$product->pro_id}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content back-delete-pop">
                                      <div class="container-fluid">
                                        <div class="row">
                                          <div class="col-12 text-center">
                                            <div class="padding-pop">
                                              <div class="icon-pop"><i class="fas fa-trash-alt"></i></div>
                                              <h3 class="h3-delete-pop">Are You Sure</h3>
                                              <form action="{{route('Member_Exhibition_Product_Delete')}}" method="post" id="delete_pro_{{$product->pro_id}}">
                                                @csrf
                                                <input hidden="" name="show_in" value="2">
                                                <input hidden="" name="pro_id" value="{{$product->pro_id}}">
                                                <input hidden="" name="exhibitor_id" value="{{Auth::user()->id}}">
                                                <input hidden="" name="exh_slug" value="{{$exh_slug}}">
                                              <button class="btn btn-outline-light" onclick="submit_delete()">Yes</button>  
                                              <script type="text/javascript">
                                                function submit_delete(){
                                                  $('#delete_pro_{{$product->pro_id}}').submit();
                                                }
                                              </script>
                                              </form>
                                              <button class="btn btn-outline-light"  data-dismiss="modal">No</button>  
                                            </div>
                                          </div>   
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                @if($checkAllReadyExhJoinedCount < 1)
                @if(Auth::user()->wallet >= $exh_details->cost && $total_member_subscribe < $exh_details->subscribe_members_limit)
                <div class="text-center button-save">
                  <button class="btn btn-danger text-white" data-toggle="modal" data-target=".confirmJoin-pop" style="cursor:pointer">@lang('website.confirm')</button>
                <a href="{{route('ExhibitionPreview',['exhibition_slug'=>$exh_slug,'exhibitor_slug'=>$member_details->slug])}}" class="btn btn-success text-white" style="cursor:pointer">
                  @lang('website.preview')
                </a>
                <!-- <a class="dropdown-item text-danger" data-toggle="modal" data-target=".confirmJoin-pop" style="cursor:pointer" ><i class="fas fa-trash-alt"></i> Delete</a> -->
                </div>
              <div class="modal fade confirmJoin-pop"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-12 text-center">
                            <div class="padding-pop">
                              <form action="{{route('ExhibitionConfirmMemberJoin')}}" method="post" id="joinForm">
                              <div class="icon-pop"><i class="fas fa-trash-alt"></i></div>
                              <h3 class="h3-delete-pop">@lang('website.are_you_sure_?')</h3>
                                @csrf
                                <input hidden="" name="exh_id" value="{{$exh_id}}">
                                <table class="table table-bordered table-striped">
                                  <tr>
                                    <td>@lang('website.exhibition')</td>
                                    <td>@lang('website.cost')</td>
                                  </tr>
                                  <tr>
                                    <td>{{$exh_name}}</td>
                                    <td>{{$exh_details->cost}} $</td>
                                  </tr>
                                </table>
                                <form>
                              <button class="btn btn-success" onclick="joinForm();" >@lang('website.confirm_join')</button>
                              <button class="btn btn-danger" data-dismiss="modal">@lang('website.no')</button>
                              <script type="text/javascript">
                                $('#joinForm').submit();
                              </script>
                              </form>
                              </form>
                            </div>
                          </div>   
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @else
                <div class="text-center button-save">
                <a href="{{route('ExhibitionPreview',['exhibition_slug'=>$exh_slug,'exhibitor_slug'=>$member_details->slug])}}" class="btn btn-success text-white" style="cursor:pointer">
                  @lang('website.preview')
                </a>
                <!-- <a class="dropdown-item text-danger" data-toggle="modal" data-target=".confirmJoin-pop" style="cursor:pointer" ><i class="fas fa-trash-alt"></i> Delete</a> -->
                </div>
              @endif
              @else
              <div class="text-center button-save">
                  <a class="btn btn-danger text-white" href="{{route('Authed_Member_Wallet_charge')}}"  style="cursor:pointer">@lang('website.recharge_wallet')</a>

                <a href="{{route('ExhibitionPreview',['exhibition_slug'=>$exh_slug,'exhibitor_slug'=>$member_details->slug])}}" class="btn btn-success text-white" style="cursor:pointer">
                  @lang('website.preview')
                </a>
              
                <!-- <a class="dropdown-item text-danger" data-toggle="modal" data-target=".confirmJoin-pop" style="cursor:pointer" ><i class="fas fa-trash-alt"></i> Delete</a> -->
                </div>
              @endif
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
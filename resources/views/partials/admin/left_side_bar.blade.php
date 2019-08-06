<nav class="pcoded-navbar" pcoded-header-position="relative">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                                                        <img class="img-40" src="/admin/assets/images/user.png" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span>{{auth()->guard('admin')->user()->name}}</span>
                                       
                                        <span id="more-details">Admin<i class="ti-angle-down"></i></span>
                                      
                                    </div>
                                </div>

                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <!-- <a href="user-profile.html"><i class="ti-user"></i>View Profile</a> -->
                                            <!-- <a href="#!"><i class="ti-settings"></i>Settings</a> -->
                                          

                                            
        
                                            
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.support" menu-title-theme="theme5">Dashboard</div>

                            <ul class="pcoded-item pcoded-left-item">
                                @if(Route::currentRouteName() == 'Authed_Admin_analytics')
                                <li class="active">
                                @else
                                <li class="">
                                @endif
                                <!--   <a href="{{route('Authed_Admin_analytics')}}">
                                    <span class="pcoded-micon"><i class="ti-file"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.documentation.main">Analytics</span>
                                    <span class="pcoded-mcaret"></span>
                                  </a> -->
                                </li>
                               
                            </ul>

                            <!-- <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation" menu-title-theme="theme5">Navigation</div> -->

                            <ul class="pcoded-item pcoded-left-item">
                                @if(Route::currentRouteName() == 'Exhibition_analytics' || Route::currentRouteName() == 'Exhibition_list')
                                <li class="pcoded-hasmenu pcoded-trigger"> <!-- pcoded-trigger -->
                                @else
                                <li class="pcoded-hasmenu"> <!-- pcoded-trigger -->
                                @endif
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-home"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Exhibitions</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                         @if(Route::currentRouteName() == 'Exhibition_analytics')
                                            <li class="active">
                                            @else
                                            <li class="">
                                            @endif
                                            <a href="{{route('Exhibition_analytics')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.dash.default">Analytics</span>
                                                <!-- <span class="pcoded-badge label label-info ">NEW</span> -->
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                     
                                       
                                         @if(Route::currentRouteName() == 'Exhibition_show')
                                            <li class="active">
                                            @else
                                            <li class="">
                                            @endif
                                            <a href="{{route('Exhibition_show')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.dash.analytics">Details</span>
                                                <!-- <span class="pcoded-badge label label-info ">NEW</span> -->
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>

                       


                        


                  <li class="">
                                    <a href="{{route('Users_list')}}">
                                    <span class="pcoded-micon"><i class="ti-home"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.documentation.main">Members</span>
                                    <span class="pcoded-mcaret"></span>
                                  </a>
                                   
                                </li>

<!-- 
 <li class="">
                                    <a href="{{route('Users_list')}}">
                                    <span class="pcoded-micon"><i class="ti-home"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.documentation.main">Dasboard Users</span>
                                    <span class="pcoded-mcaret"></span>
                                  </a>
                                   
                                </li> -->
                               

                                <li class="">
                                    <a href="{{route('Categories_show')}}">
                                    <span class="pcoded-micon"><i class="ti-home"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.documentation.main">Categories</span>
                                    <span class="pcoded-mcaret"></span>
                                  </a>
                                   
                                </li>







                                <li class="">
                                    <a href="{{route('Countries_list')}}">
                                    <span class="pcoded-micon"><i class="ti-home"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.documentation.main">Countries</span>
                                    <span class="pcoded-mcaret"></span>
                                  </a>
                                   
                                </li>




                                <li class="">
                                    <a href="{{route('Messages_show')}}">
                                    <span class="pcoded-micon"><i class="ti-home"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.documentation.main">Messages</span>
                                    <span class="pcoded-mcaret"></span>
                                  </a>
                                   
                                </li>


                           

<li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-home"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Notification</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                         
                                            <li class="">
                                           
                                            <a href="{{route('Notification_show')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.dash.default">Send Message</span>
                                                <!-- <span class="pcoded-badge label label-info ">NEW</span> -->
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                     
                                       
                                       
                                         
                                        
                                    </ul>
                                </li>


                         <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms" menu-title-theme="theme5">Website</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-layers"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Home</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="{{route('Features_list')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.form-components.form-components">Our Features</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{route('Tips_list')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.form-components.form-elements-add-on">Business Tips</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{route('Header_list')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.form-components.form-elements-advance">Header </Menuspan>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="form-validation.html">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.form-components.form-validation">Form Validation</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>   
                            </ul>

                                 <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="{{route('Faqs_list')}}">
                                        <span class="pcoded-micon"><i class="ti-layers"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Faqs</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                      
                                     
                                       

                                    </ul>
                                </li>   
                            </ul>

                         


                                
                            </ul>
                            
                        </div>
                    </nav>
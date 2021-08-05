<?php

    $routes = array();
    function setActiveMenu($route)
    {   if( $route == 'admin' ) {
          return (Request::is($route) || Request::is($route)) ? 'active' : '';
        }
        return (Request::is($route) || Request::is($route.'/*')) ? 'active' : '';
    }

    function setOpenSubMenu($route)
    {
        return (Request::is($route) || Request::is($route.'/*')) ? 'open' : '';
    }
    
?>

<nav class="sidebar sidebar-collapsed">
    <div class="sidebar-content ">
        <a class="sidebar-brand" href="{{ url("admin") }}">
            {{-- env('APP_NAME') --}}
           <img src="{{ asset('images/green_places_logo01.svg') }}" alt="{{ env('APP_NAME') }}" />
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Navigations
            </li>
            <li class="sidebar-item {{ setActiveMenu('admin') }}">
                <a class="sidebar-link" href="{{ url('admin') }}">
                    Dashboard
                </a>
            </li>
            <li class="sidebar-item {{ setActiveMenu('admin/get-notified') }}">
                <a class="sidebar-link" href="{{ url('admin/get-notified') }}">             
                    Get Notified
                </a>
            </li>             
            <li class="sidebar-item {{ setActiveMenu('admin/admin-users') }}">
                <a class="sidebar-link" href="{{ url('admin/admin-users') }}">             
                    Admin Users
                </a>
            </li> 
            <li class="sidebar-item greenp-collapse-list ">
                <a class="sidebar-link collapsed" href="{{ url('admin/blog') }}" data-toggle="collapse" data-target="#demo1">Blog<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                <ul id="demo1" class="collapse">
                    <li class="sidebar-item {{ setActiveMenu('admin/blog') }}">
                        <a class="sidebar-link" href="{{ url('admin/blog') }}">             
                        Blog
                        </a>
                    </li>  
                    <li class="sidebar-item {{ setActiveMenu('admin/blog-categories') }}">
                        <a class="sidebar-link" href="{{ url('admin/blog-categories') }}">             
                        Blog Categories
                        </a>
                    </li>  
                    <li class="sidebar-item {{ setActiveMenu('admin/hashtags') }}">
                        <a class="sidebar-link" href="{{ url('admin/hashtags') }}">             
                        Hashtag
                        </a>
                    </li>  
                </ul>    
			</li> 
           <li class="sidebar-item {{ setActiveMenu('admin/team') }}">
                <a class="sidebar-link" href="{{ url('admin/team') }}">             
                    Team
                </a>
            </li>  
           <li class="sidebar-item {{ setActiveMenu('admin/organization') }}">
                <a class="sidebar-link" href="{{ url('admin/organization') }}">             
                    Organization
                </a>
            </li>  
           <li class="sidebar-item {{ setActiveMenu('admin/badge') }}">
                <a class="sidebar-link" href="{{ url('admin/badge') }}">             
                Badge
                </a>
            </li>  
           
           <li class="sidebar-item {{ setActiveMenu('admin/faq') }}">
                <a class="sidebar-link" href="{{ url('admin/faq') }}">             
                FAQ
                </a>
            </li>  
           <li class="sidebar-item {{ setActiveMenu('admin/statics') }}">
                <a class="sidebar-link" href="{{ url('admin/statics') }}">             
                Statics
                </a>
            </li>  
           
            <li class="sidebar-item greenp-collapse-list {{ setActiveMenu('admin/company') }}">
                <a class="sidebar-link collapsed" href="{{ url('admin/company') }}" data-toggle="collapse" data-target="#demo">Company<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                <ul id="demo" class="collapse">
                    <li class="sidebar-item {{ setActiveMenu('admin/comany') }}">
                        <a class="sidebar-link" href="{{ url('admin/company') }}">             
                        Company
                        </a>
                    </li>  
                    <li class="sidebar-item {{ setActiveMenu('admin/testimonial') }}">
                <a class="sidebar-link" href="{{ url('admin/testimonial') }}">             
                Testimonial
                </a>
            </li>  
                    <li class="sidebar-item {{ setActiveMenu('admin/city') }}">
                        <a class="sidebar-link" href="{{ url('admin/city') }}">             
                        City
                        </a>
                    </li>  
                    <li class="sidebar-item {{ setActiveMenu('admin/state') }}">
                        <a class="sidebar-link" href="{{ url('admin/state') }}">             
                        State
                        </a>
                    </li>  
                    <li class="sidebar-item {{ setActiveMenu('admin/industry') }}">
                        <a class="sidebar-link" href="{{ url('admin/industry') }}">             
                        Industry
                        </a>
                    </li>  
                </ul>    
			</li>
           	<li class="sidebar-item {{ setActiveMenu('admin/pledge') }}">
                <a class="sidebar-link" href="{{ url('admin/pledge') }}">             
                Pledge
                </a>
            </li>  
           	<li class="sidebar-item {{ setActiveMenu('admin/credibilitybrands') }}">
                <a class="sidebar-link" href="{{ url('admin/credibilitybrands') }}">             
               Credibility Brand
                </a>
            </li>  
           
        </ul>
    </div>
</nav>
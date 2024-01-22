<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>


        {{-- @foreach ($logos as $logo)
        <img src="{{ asset('upload/logos/' . $logo->path) }}" alt="{{ $logo->name }}">
    @endforeach --}}
        
        
        </div>
               
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
            <ul>
                <li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Default</a>
                </li>
                <li> <a href="dashboard-eCommerce.html"><i class="bx bx-right-arrow-alt"></i>eCommerce</a>
                </li>
                <li> <a href="dashboard-analytics.html"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
                </li>
                <li> <a href="dashboard-digital-marketing.html"><i class="bx bx-right-arrow-alt"></i>Digital Marketing</a>
                </li>
                <li> <a href="dashboard-human-resources.html"><i class="bx bx-right-arrow-alt"></i>Human Resources</a>
                </li>
            </ul>
        </li>
        
        
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users text-primary"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
                <div class="menu-title">Users</div>
            </a>
            <ul>
                <li> <a href="{{route('users.view')}}"><i class="bx bx-right-arrow-alt"></i>User List</a>
                </li>


                
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                </div>
                <div class="menu-title">Icons</div>
            </a>
            <ul>
               

                <li> <a href="{{route('logo.show')}}"><i class="bx bx-right-arrow-alt"></i>lcon show</a>
                </li>
                
                <li> <a href="{{route('logo.upload')}}"><i class="bx bx-right-arrow-alt"></i>lcon upload</a>
                </li>
            </ul>
        </li>

        
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                </div>
                <span>Blog Category</span>
            </a>
            <ul>
               

                <li> <a href="{{route('all.blog.category')}}"><i class="bx bx-right-arrow-alt"></i>All Blog Category</a>
                </li>
                
                <li> <a href="{{route('add.blog.category')}}"><i class="bx bx-right-arrow-alt"></i> Add Blog Category</a>
               </li>
            </ul>
        </li>

        
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                </div>
                <span>Header Side Title</span>
            </a>
            <ul>
               

                
                <li> <a href="{{route('add.header_side_blog')}}"><i class="bx bx-right-arrow-alt"></i> Add Side Tile Blog </a>
               </li>

               
               <li> <a href="{{route('all.side_blog')}}"><i class="bx bx-right-arrow-alt"></i>All Side Title</a>
               </li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                </div>
                <span>Blog Page</span>
            </a>
            <ul>
               

                <li> <a href="{{route('all.blog')}}"><i class="bx bx-right-arrow-alt"></i>All Blog </a>
                </li>
                
                <li> <a href="{{route('add.blog')}}"><i class="bx bx-right-arrow-alt"></i> Add Blog </a>
               </li>
            </ul>
        </li>
    
            <a href="{{route('breaking.news')}}" target="_blank">
                <div class="parent-icon"><i class="bx bx-folder"></i>
                </div>
                <div class="menu-title">Breaking News</div>
            </a>
        </li>
        <li>
            <a href="https://themeforest.net/user/codervent" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
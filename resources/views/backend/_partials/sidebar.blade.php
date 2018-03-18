            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li><a href="{{URL::to('')}}" target="_blank"><i class="fa fa-file-o fa-fw"></i> Visit SIte</a></li>
                        <li>
                            <a href="{{URL::to('dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li><a href="{{URL::to('category')}}"><i class="fa fa-folder-o"></i> Category</a></li>
                        <li><a href="{{URL::to('posts-admin')}}"><i class="fa fa-edit fa-fw"></i> Posts</a></li>
                   
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Others<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{URL::to('others-info/primary/edit')}}">Primary Info</a></li>
                                <li><a href="{{URL::to('other/about')}}">About</a></li>
                                <li><a href="{{URL::to('acl-permission')}}">ACL Permission</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li><a href="{{URL::to('pages')}}"><i class="fa fa-file-text fa-fw"></i> Page</a></li>
                        <li><a href="{{URL::to('menu')}}"><i class="fa fa-list-ul fa-fw"></i> Menu Configuration</a></li>
                        <li><a href="{{URL::to('users')}}"><i class="fa fa-users fa-fw"></i> Users</a></li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
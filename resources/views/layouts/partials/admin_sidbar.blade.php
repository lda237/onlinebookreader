<div class="pt-5 sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{'admin/dashboard' == request()->path() ? 'active':''}} ">
                    <a href="/admin/dashboard">
                    <i class="fa fa-dashboard"></i>
                      <span>dashboard</span>
                   </a>
                 </li>

                 <li class="{{'admin/category' == request()->path() ? 'active':''}}">
                    <a href="/admin/category">
                    <i class="fa fa-files-o"></i>
                      <span>categories</span>
                   </a>
                 </li>

                 <li class="{{'admin/reader' == request()->path() ? 'active':''}} ">
                    <a href="/admin/reader">
                    <i class="fa fa-book"></i>
                      <span>Reader</span>
                   </a>
                 </li>

                 <li class="{{'admin/banners' == request()->path() ? 'active':''}}">
                    <a href="/admin/banners">
                    <i class="fa fa-image"></i>
                      <span>Banners</span>
                   </a>
                 </li>

                 <li class="{{'admin/about' == request()->path() ? 'active':''}}">
                    <a href="/admin/about">
                    <i class="fa fa-image"></i>
                      <span>About</span>
                   </a>
                 </li>
            </ul>
        </div>
    </div>
</div>

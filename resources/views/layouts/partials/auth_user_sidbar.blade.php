<div class=" sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{'auth_user/dashboard' == request()->path() ? 'active':''}} ">
                    <a href="/auth_user/dashboard">
                    <i class="fa fa-dashboard"></i>
                      <span>dashboard</span>
                   </a>
                 </li>

                 <li class="{{'shop' == request()->path() ? 'active':''}} ">
                    <a href="/shop">
                    <i class="fa fa-book"></i>
                      <span>Acheter un Livre</span>
                   </a>
                 </li>

            </ul>
        </div>
    </div>
</div>

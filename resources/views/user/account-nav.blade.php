
<ul class="account-nav">
            <li><a href="{{route('user.index')}}" class="menu-link menu-link_us-s">My Account</a></li>
            <li><a href="{{ route('user.orders') }}" class="menu-link menu-link_us-s">Orders</a></li>
            <li><a href="{{ route('user.address') }}" class="menu-link menu-link_us-s">Addresses</a></li>
            <li><a href="{{ route('user.wishlist') }}" class="menu-link menu-link_us-s">Wishlist</a></li>           
            <li>
            <form action="{{route('logout')}}" method="POST" id="logout-form" style="display: none;">@csrf</form>    
                <a href="{{route('logout')}}" class="menu-link menu-link_us-s" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </li>
</ul>
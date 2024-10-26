@php

$route = Route::current()->getName();
@endphp


<script>
    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        let user = getCookie("username");
        if (user != "") {
            alert("Welcome again " + user);
        } else {
            user = prompt("Please enter your name:", "");
            if (user != "" && user != null) {
                setCookie("username", user, 30);
            }
        }
    }



    if (window.innerWidth < 768) {

        setCookie("isMobile", 'mobile', 30);
        var cookiename = getCookie('isMobile');

    } else {
        setCookie("isMobile", 'no', 30);
    }
</script>

@php
@$mobile = $_COOKIE['isMobile'];
@endphp

@if($mobile)
<!-- <p>Value of 'isMobile': {{ $mobile }}</p> -->
@else
<p></p>
@endif

<div class="col-md-3">
    <div class="dashboard-menu">
        <ul class="nav flex-column" role="tablist">
            <li class="nav-item">
                <a class="nav-link {{ ($route ==  'dashboard')? 'active':  '' }} " href="{{ route('dashboard') }}"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($route ==  'user.order.page')? 'active':  '' }}" href="{{ route('user.order.page') }}#{{$mobile }}"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
            </li>

            @if (auth()->user()->is_hoc == "Yes")

            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.collection.page') }}#{{$mobile }}"><i class="fi-rs-marker mr-10"></i>HOC </a>
            </li>
            @endif


            <li class="nav-item">
                <a class="nav-link {{ ($route ==  'return.order.page')? 'active':  '' }}" href="{{ route('return.order.page') }}#{{$mobile }}"><i class="fi-rs-shopping-bag mr-10"></i>Return Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($route ==  'user.track.order')? 'active':  '' }}" href="{{ route('user.track.order') }}#{{$mobile }}"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#address"><i class="fi-rs-marker mr-10"></i>My Address</a>
            </li> -->


            <li class="nav-item">
                <a class="nav-link {{ ($route ==  'user.account.page')? 'active':  '' }}" href="{{ route('user.account.page') }}#{{$mobile }}"><i class="fi-rs-user mr-10"></i>Account details</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ ($route ==  'user.change.password')? 'active':  '' }}" href="{{ route('user.change.password') }}#{{$mobile }}"><i class="fi-rs-user mr-10"></i>Change Password</a>
            </li>


            <li class="nav-item" style="background:#ddd;" id="mobile">
                <a class="nav-link" href="{{ route('user.logout') }}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
            </li>
        </ul>
    </div>
</div>
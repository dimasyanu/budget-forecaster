<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/semantic.min.css') }}">
        @stack('styles')
        <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">

        <!-- scripts -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/semantic.min.js') }}"></script>
        @stack('scripts')
    </head>
    <body>
        <div class="ui left vertical sidebar menu visible" style="border-top: 0;">
            <div class="ui card" style="margin-bottom: 0; border-radius: 0; border-top: 0;">
                <i class="sidebar-pin map pin link icon"></i>
                <div class="content">
                    <div class="sidebar-avatar image">
                        <img src="{{ asset('images/face.jpg') }}" style="width: 100%;">
                    </div>
                    <a class="header" style="text-align: center;">Dimas Yanu</a>
                </div>
            </div>

            <a href="{{ url('backoffice') }}" class="item"><i class="home icon"></i>Home</a>
            <a href="{{ url('backoffice/categories') }}"class="item"><i class="home icon"></i>Categories</a>
        </div>
        <div id="content" class="pusher">
            <div class="ui segment" style="border-radius: 0; margin: 0; border-left: 0;">
                <div class="ui breadcrumb">
                    <a class="section">Home</a>
                    <span class="divider">/</span>
                    <a class="section">Registration</a>
                    <span class="divider">/</span>
                    <div class="active section">Personal Information</div>
                </div>
            </div>
            <div class="ui basic segment" style="margin: 0;">
                @yield('content')
            </div>
        </div>
        <div class="sidebar-show"><i class="chevron right link icon"></i></div>
    </body>
</html>
<script type="text/javascript">
var pinned = localStorage.getItem('sidebar_pinned');
if (typeof pinned === 'undefined' || pinned === null) {
    pinned = true;
    localStorage.setItem('sidebar_pinned', true);

    $('.ui.sidebar').addClass('push');
    $('.sidebar-pin').addClass('teal');
} else {
    pinned = JSON.parse(pinned);
    if (pinned) {
        $('.ui.sidebar').addClass('push');
        $('.sidebar-pin').addClass('teal');
    } else {
        $('.ui.sidebar').removeClass('visible');
        $('.sidebar-pin').removeClass('teal');
    }
}

function hideSidebar() {
    $('.ui.sidebar').sidebar('hide');
}

$(document).ready(function() {
    var sidebar = $('.ui.sidebar');
    sidebar
        .sidebar('setting', 'defaultTransition', {
            computer: { left: 'overlay' },
            mobile: { left: 'overlay' }
        })
        .sidebar('setting', 'duration', 150);

    $('.sidebar-pin').click(function(event) {
        if (pinned) {
            sidebar
                .removeClass('push')
                .addClass('overlay visible')
                .sidebar('setting', 'closable', pinned)
                .sidebar('setting', 'transition', 'overlay')
                .sidebar();

            $('.pusher').addClass('dimmed').one('click', function() {
                sidebar.sidebar('hide');
            });
            $('.sidebar-pin').removeClass('teal');

            localStorage.setItem('sidebar_pinned', false);
            pinned = false;
        } else {
            $('.pusher.dimmed').removeClass('dimmed');
            sidebar
                .removeClass('overlay')
                .addClass('push')
                .sidebar('setting', 'closable', pinned)
                .sidebar('setting', 'transition', 'push')
                .sidebar();

            $('.pusher').off('click');
            $('.sidebar-pin').addClass('teal');
            localStorage.setItem('sidebar_pinned', true);
            pinned = true;
        }
    });

    $('.sidebar-show').click(function(event) {
        $('.pusher').addClass('dimmed').one('click', hideSidebar);
        sidebar.one('transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd', function(event) {
            sidebar.removeClass('animating');
        }).addClass('overlay animating visible');
    });
});
</script>
@include('template.head')

<body>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="cover-container">
            @include('template.nav')
            @yield('body')
            @include('template.foot')
        </div>
    </div>
</div>
</body>

@include('template.javascript')

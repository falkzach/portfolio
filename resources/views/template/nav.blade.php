<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark nav-masthead">
    <a class="navbar-brand" href="{{ route('portfolio_index') }}"><h3>{{ config('portfolio.handle') }}</h3></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a class="nav-link {{ Request::route()->getName() === 'portfolio_index' ? 'active' : null }}" href="{{ route('portfolio_index') }}">Home</a></li>
            <li class="nav-item active"><a class="nav-link {{ Request::route()->getName() === 'projects' ? 'active' : null }}" href="{{ route('projects') }}">Graduate Projects</a></li>
            <li class="nav-item active"><a class="nav-link {{ Request::route()->getName() === 'cv' ? 'active' : null }}" href="{{ route('cv') }}">Graduate CV</a></li>
            <li class="nav-item active"><a class="nav-link {{ Request::route()->getName() === 'outdoors' ? 'active' : null }}" href="{{ route('outdoors') }}">Outdoors</a></li>
            <li class="nav-item active"><a class="nav-link {{ Request::route()->getName() === 'contact' ? 'active' : null }}" href="{{ route('contact') }}">Contact</a></li>
        </ul>
    </div>
</nav>

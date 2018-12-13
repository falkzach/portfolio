<div class="masthead clearfix">
    <div class="inner">
        <h3 class="masthead-brand">{{ config('portfolio.handle') }}</h3>
        <nav class="navbar navbar-expand-lg nav-masthead">
            <a class="nav-link {{ Request::route()->getName() === 'portfolio_index' ? 'active' : null }}" href="{{ route('portfolio_index') }}">Home</a>
            <a class="nav-link {{ Request::route()->getName() === 'projects' ? 'active' : null }}" href="{{ route('projects') }}">Graduate Projects</a>
            <a class="nav-link {{ Request::route()->getName() === 'cv' ? 'active' : null }}" href="{{ route('cv') }}">Graduate CV</a>
            <a class="nav-link {{ Request::route()->getName() === 'hobbies' ? 'active' : null }}" href="{{ route('hobbies') }}">Hobbies</a>
            <a class="nav-link {{ Request::route()->getName() === 'contact' ? 'active' : null }}" href="{{ route('contact') }}">Contact</a>
        </nav>
    </div>
</div>

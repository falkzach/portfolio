<div class="masthead clearfix">
    <div class="inner">
        <h3 class="masthead-brand">{{ config('portfolio.handle') }}</h3>
        <nav class="nav nav-masthead">
            <a class="nav-link {{ Request::route()->getName() === 'portfolio_index' ? 'active' : null }}" href="{{ route('portfolio_index') }}">Home</a>
            <a class="nav-link {{ Request::route()->getName() === 'projects' ? 'active' : null }}" href="{{ route('projects') }}">Projects</a>
            <a class="nav-link {{ Request::route()->getName() === 'hobbies' ? 'active' : null }}" href="{{ route('hobbies') }}">Hobbies</a>
            <a class="nav-link {{ Request::route()->getName() === 'contact' ? 'active' : null }}" href="{{ route('contact') }}">Contact</a>
        </nav>
    </div>
</div>

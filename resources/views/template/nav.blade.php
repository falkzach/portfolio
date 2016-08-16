<div class="masthead clearfix">
    <div class="inner">
        <h3 class="masthead-brand">{{ config('portfolio.handle') }}</h3>
        <nav class="nav nav-masthead">
            <a class="nav-link active" href="{{ route('portfolio_index') }}">Home</a>
            <a class="nav-link" href="{{ route('projects') }}">Projects</a>
            <a class="nav-link" href="{{ route('hobbies') }}">Hobbies</a>
            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
        </nav>
    </div>
</div>

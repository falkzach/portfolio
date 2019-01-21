@if(isset($project->snippets))
    <div class="col-8 offset-2">
        @foreach($project->snippets as $snippet)
            <pre><code class="hljs">
                {!! $snippet !!}
            </code></pre>
        @endforeach
    </div>
@endif

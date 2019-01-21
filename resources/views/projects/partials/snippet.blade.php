@if(isset($project->snippets))
    <div class="col-8 text-center">
        @foreach($project->snippets as $snippet)
            <pre><code class="hljs">
                {!! $snippet !!}
            </code></pre>
        @endforeach
    </div>
@endif

@if(isset($project->snippets))
    <div>
        @foreach($project->snippets as $snippet)
            <pre><code class="hljs">
                {!! $snippet !!}
            </code></pre>
        @endforeach
    </div>
@endif

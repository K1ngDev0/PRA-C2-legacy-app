<x-layouts.app>
    <br>
    <h1>Welkom, {{ $name }}!</h1>
    <br>

    <h2>Populaire Merken</h2>
    <div class="row">
    <ul>
        @if(!empty($popularBrands) && $popularBrands->count() > 0)
            @foreach($popularBrands as $brand)
                <li>{{ $brand->name }} - {{ $brand->visit_count }} visits</li> <!-- Weergeven als [type] -->
            @endforeach
        @else
            <li>Er zijn geen populaire handleidingen beschikbaar.</li>
        @endif
    </ul>
    </div>

    <h2>Populaire Handleidingen</h2>
    <div class="row">
    <ul>
        @if(!empty($popularManuals) && $popularManuals->count() > 0)
            @foreach($popularManuals as $manual)
                <li><a href="{{ route('manual.incrementVisit', ['id' => $manual->id]) }}" 
                    alt="{{ $manual->name }}" 
                    title="{{ $manual->name }}">{{ $manual->name }} ({{ $manual->filesize_human_readable }})</a> - {{ $manual->visit_count }} visits</li>
            @endforeach
        @else
            <li>Er zijn geen populaire handleidingen beschikbaar.</li>
        @endif
    </ul>
    </div>
    
    

    <h1>All Categories</h1>
    <div class="make-up">
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-4">
                    <ul>
                        <li>
                            <a href="/category/{{ $category->id }}/{{ Str::slug($category->name) }}/">{{ $category->name }}</a>
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
        </div>
    </div>

</x-layouts.app>

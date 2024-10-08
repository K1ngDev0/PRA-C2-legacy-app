<x-layouts.app>
    <br>
    <h1>Welkom, {{ $name }}!</h1>
    <br>

    <h1>All Categories</h1>


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

</x-layouts.app>

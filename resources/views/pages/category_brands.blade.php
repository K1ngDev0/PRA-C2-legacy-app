<x-layouts.app>

    <h1>Category: {{ $category->name }}</h1>

    <ul>
        @foreach($brands as $brand)
            <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a></li>
        @endforeach
    </ul>

</x-layouts.app>

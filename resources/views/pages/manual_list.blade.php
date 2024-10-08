<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li>
            <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" 
               alt="Manuals for '{{ $brand->name }}'" 
               title="Manuals for '{{ $brand->name }}'">{{ $brand->name }}</a>
        </li>
    </x-slot:breadcrumb>

    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>

<<<<<<< Updated upstream
    <p class="downloadText">Download manual(s) here:</p>
        @foreach ($manuals as $manual) 
            <div class="downloadManual">
            <div class="dowloadManualConfine">
            <button class="downloadButton">
            

            @if ($manual->locally_available)
                
                <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a>
                ({{$manual->filesize_human_readable}})
            @else
                <a href="{{ $manual->url }}" target="new" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a>
            @endif

            <br />
            
            </button>
            </div>
            </div>
        @endforeach
=======
    <!-- Edit knop voor de brand -->
    <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-primary">
        {{ __('Edit Brand') }}
    </a>

    <hr>

    @foreach ($manuals as $manual)
        @if ($manual->locally_available)
            <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" 
               alt="{{ $manual->name }}" 
               title="{{ $manual->name }}">{{ $manual->name }}</a>
            ({{ $manual->filesize_human_readable }})
        @else
            <a href="{{ $manual->url }}" target="_blank" 
               alt="{{ $manual->name }}" 
               title="{{ $manual->name }}">{{ $manual->name }}</a>
        @endif
        <br />
    @endforeach
>>>>>>> Stashed changes

</x-layouts.app>

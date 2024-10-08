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

    <p class="downloadText">Download manual(s) here:</p>
        @foreach ($manuals as $manual) 
            <div class="downloadManual">
            <div class="dowloadManualConfine">
            <button class="downloadButton">
                
            <a href="{{ route('manual.incrementVisit', ['id' => $manual->id]) }}" 
                alt="{{ $manual->name }}" 
                title="{{ $manual->name }}">{{ $manual->name }}</a>
                ({{ $manual->filesize_human_readable }})
           

            <br />
            
            </button>
            </div>
            </div>
        @endforeach

    <!-- Edit knop voor de brand -->
    <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-primary">
        {{ __('Edit Brand') }}
    </a>



</x-layouts.app>

<x-layouts.app>

    <x-slot:title>
        {{ $category->name }}
    </x-slot:title>

    <h1>{{ $category->name }}</h1>

    <div class="container">
        <div class="row">

            <div class="az-menu">
                <h5>Ga naar letter: </h5>
                @foreach(range('A', 'Z') as $letter)
                    <a href="#{{ $letter }}">{{ $letter }}</a> -
                @endforeach
            </div>

            <style>
                .az-menu {
                    padding: 40px 0;
                    text-align: center;
                }

                .az-menu a {
                    text-decoration: none;
                    color: #007BFF;
                    font-size: 1.2em;
                    margin: 0 10px;
                }

                .az-menu a:hover {
                    text-decoration: underline;
                    color: #0050a6;
                }

                h2 {
                    margin-top: 40px;
                    text-align: left;
                    border-bottom: 1px solid #ddd;
                    padding-bottom: 10px;
                }

                ul {
                    list-style: none;
                    padding: 0;
                }

                li {
                    margin-bottom: 10px;
                }

                .brand-item a {
                    text-decoration: none;
                    color: #333;
                }

                .brand-item a:hover {
                    color: #007BFF;
                    text-decoration: underline;
                }

                .row {
                    padding: 20px;
                }
            </style>

            @php
                $header_first_letter = null;
            @endphp

            <div class="row">
                @foreach($brands as $brand)
                    @php
                        $current_first_letter = strtoupper(substr($brand->name, 0, 1));
                    @endphp

                    @if($header_first_letter !== $current_first_letter)
                        @if(!is_null($header_first_letter))
                            </ul></div>
                        @endif
                        <div class="col-md-12">
                            <h2 id="{{ $current_first_letter }}">{{ $current_first_letter }}</h2>
                        </div>
                        <div class="col-md-6">
                            <ul>
                    @endif

                    <li class="brand-item">
                        <a href="/category/{{ $category->id }}/{{ Str::slug($category->name) }}/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a>
                    </li>

                    @php
                        $header_first_letter = $current_first_letter;
                    @endphp
                @endforeach

                @if(!is_null($header_first_letter))
                    </ul></div>
                @endif
            </div>

        </div>
    </div>

</x-layouts.app>

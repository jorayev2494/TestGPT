@extends('layouts.index')

@section('content')
    <div class="col d-flex flex-column p-0">

        <!-- Messages -->
        <div class="chat-container">

            @foreach($messages ?? [] as ['from' => $from, 'text' => $text])
                <div class="message {{ $from }}">
                    {{ $text }}
                </div>
            @endforeach

        </div>

        <!-- Input -->
        @include('modules.ai.pages.partials.input')

    </div>
@endsection('content')

<div class="col-12 col-md-3 col-lg-2 sidebar p-3">
    <h6 class="mb-3">AI Assistants</h6>

    <div class="list-group">
        @foreach($sidebarItems as $key => $item)
            <a
                @php
                    $classes = ['list-group-item', 'list-group-item-action'];
                    $assistantId = request()->route('slug');
                @endphp

                @if($assistantId == $key)
                    @php $classes[] = "active"; @endphp
                @elseif((! $assistantId) && $loop->first)
                    @php $classes[] = "active"; @endphp
                @endif

                @class($classes)

                href="{{ route('assistant', ['slug' => $key]) }}"
            >
                {{ $item }}
            </a>
        @endforeach
{{--        <button class="list-group-item list-group-item-action">--}}
{{--            💻 Code Assistant--}}
{{--        </button>--}}
{{--        <button class="list-group-item list-group-item-action">--}}
{{--            ✍️ Copywriter--}}
{{--        </button>--}}
{{--        <button class="list-group-item list-group-item-action">--}}
{{--            📊 Analyst--}}
{{--        </button>--}}
    </div>
</div>

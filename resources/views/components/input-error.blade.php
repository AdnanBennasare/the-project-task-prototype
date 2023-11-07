@props(['messages'])

@if ($messages)
    <p {{ $attributes->merge(['class' => 'text-danger mt-2']) }}>
        @foreach ((array) $messages as $message)
            {{ $message }}
        @endforeach
    </p>
@endif

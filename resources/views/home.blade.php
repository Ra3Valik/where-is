<div id="app">
    <home-page @isset($data) :data="{{ $data }}" @endisset ></home-page>
</div>

<script src="{{ asset('js/main.js') }}?v=1.0.2"></script>

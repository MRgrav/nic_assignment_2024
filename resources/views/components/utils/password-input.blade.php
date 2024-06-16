<div class="relative flex">
    <input type="password" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" class="w-full px-4 py-2 border border-gray-200 rounded mb-3 rounded focus:outline focus:outline-1 focus:outline-gray-400">
    <div class="-ms-10 p-2">
        <img src="{{ asset('assets/icons/crossed-eye.svg') }}" width="24" alt="" class="absolute cursor-pointer rounded" id="{{ $name }}-status">
    </div>
</div>

<script>
    var {{$name}} = document.getElementById('{{ $name }}');
    var {{$name}}Status = document.getElementById('{{ $name }}-status');

    // toggle password type
    {{$name}}Status.addEventListener('click', () => {
        if ( {{$name}}.type === "password" ) {
            {{$name}}.type = "text";
            {{$name}}Status.src = "{{ asset('assets/icons/eye.svg') }}";
        } else {
            {{$name}}.type = "password";
            {{$name}}Status.src = "{{ asset('assets/icons/crossed-eye.svg') }}";
        }
    })

</script>
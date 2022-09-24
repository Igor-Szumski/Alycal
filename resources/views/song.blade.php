@extends("layout")

@section('content')
    <div class="w-1/2 m-auto mt-8 mb-6 bg-white p-10 rounded-2xl">
        <div class="text-left mb-6 font-black">
            {{$post -> artist}}
            -
            {{$post -> title}}
        </div>
        <div class="text-center font-semibold leading-relaxed">
            <pre>{{$post -> lyrics}}</pre>
        </div>
    </div>
    <div class="w-1/2 m-auto mt-3 mb-6 bg-white p-10 rounded-2xl">
        <p class="text-left mb-6 font-black">More songs like "{{$post -> title}}":</p>
        @foreach($recommended as $recommend)
            <p class="text-center font-black">{{$recommend}}</p>
        @endforeach
    </div>

@endsection


@extends("layout")

@section('content')
    <div class="flex flex-wrap justify-center m-10 gap-6">
        @if ($post -> count())
            @foreach($post as $post)
                <div class="w-1/5 p-5 bg-white rounded-3xl overflow-hidden h-64">
                        <div class="font-extrabold text-center mt-1 mb-3">
                            <a href="{{route('song',$post->id)}}">
                                {{ $post -> artist }}
                                -
                            {{ $post -> title }}
                            </a>
                        </div>
                        <div class="text-center mb-2">
                            {{ $post -> lyrics }}
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <p>There are no songs :(</p>
        @endif
    </div>
@endsection

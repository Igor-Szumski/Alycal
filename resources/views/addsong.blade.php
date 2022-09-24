@extends("layout")

@section('content')
    <div class="flex justify-center mt-12">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form method="post" action="{{ route('addSong') }}">
                @csrf
                <label for="artist" class="rounded-2xl w-1/2 bg-gray-200 p-4">
                    Artist:
                    <input type="text" class="" id="artist" name="artist">
                </label>
                <label for="title" class="rounded-2xl w-1/2 bg-gray-200 p-4">
                    Title:
                    <input type="text" id="title" name="title">
                </label>
                <label for="lyrics" class="mt-4 block rounded-2xl w-full bg-gray-200 p-4">
                    Lyrics:
                    <textarea name="lyrics" id="lyrics" cols="30" rows="20" class="w-full"></textarea>
                </label>
                <button type="submit" class="m-auto mt-5 px-10 py-3 bg-blue-500 rounded-2xl">Add song!</button>
            </form>
        </div>
    </div>

@endsection

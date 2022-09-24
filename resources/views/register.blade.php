@extends("layout")

@section('content')
<div class="flex justify-center mt-20">
    <div class="w-4/12 bg-white p-6 rounded-lg">
        <form method="post" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                @error ('username')
                <div class="text-red-500 m-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
                <label for="name" class="sr-only">Username</label>
                <input type="text" name="username" id="username" placeholder="Your username" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                @error ('username') border-red-500 @enderror" value="{{ old('username') }}">
            </div>
            <div class="mb-4">
                @error ('password')
                <div class="text-red-500 m-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Choose a password" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                @error ('password') border-red-500 @enderror">
            </div>
            <div class="mb-4">
                <label for="password" class="sr-only">Password again</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                @error ('password') border-red-500 @enderror">
            </div>
            <div>
                <button type="submit" class="py-6 px-8 mr-10 bg-blue-400 rounded-2xl w-full">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection

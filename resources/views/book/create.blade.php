<x-app>
    <div class="max-w-6xl mx-auto text-center">
        <h1 class="font-bold text-2xl p-6">Register</h1>
    </div>

    <div class="max-w-2xl p-5 mx-auto bg-lime-200 rounded-md border-4 border-white">
        <form action="{{route('book.index')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title" class="text-xl">title</label>
            @error('title') <span class="text-red-600 ml-2">{{ $message }}</span>@enderror
            <input type="text" id="title" name="title" class="block w-full p-2 bg-white border border-gray-400 rounded-md mb-6" value="{{old('title')}}">


            <label for="image" class="text-xl">image</label>
            <x-image_validation_errors class="inline-block ml-2" :errors="$errors" />      
            <img class="w-24 h-18 mb-1 rounded" id="img">
            <input type="file" id="image" name="image" class="block w-full p-2 bg-white border border-gray-400 rounded-md mb-6">


            <label for="price" class="text-xl">price</label>
            @error('price') <span class="text-red-600 ml-2">{{ $message }}</span>@enderror
            <input type="text" id="price" name="price" class="block w-full p-2 bg-white border border-gray-400 rounded-md mb-6" value="{{old('price')}}">

            <label for="description" class="text-xl">description</label>
            @error('description') <span class="text-red-600 ml-2">{{ $message }}</span>@enderror
            <textarea type="text" rows="3" id="description" name="description" class="block w-full p-2 bg-white border border-gray-400 rounded-md mb-6">{{old('description')}}</textarea>

            <div class="text-center">
                <button type="submit" class="bg-blue-600 border rounded-md px-4 py-1 text-white text-lg">登録実行</button>
            </div>
        </form>
    </div>
    
</x-app>
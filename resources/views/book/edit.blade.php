<x-app>
<div class="max-w-6xl mx-auto text-center">
        <h1 class="font-bold text-2xl p-6">Edit</h1>
    </div>

    <div class="max-w-2xl p-5 mx-auto bg-lime-200 rounded-md border-4 border-white">
        <form action="{{route('book.update',$book->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <label for="title" class="text-xl">title</label>
            @error('title') <span class="text-red-600 ml-2">{{ $message }}</span>@enderror
            <input type="text" id="title" name="title" class="block w-full p-2 bg-white border border-gray-400 rounded-md mb-6" value="{{ old('title',$book->title)}}">


            <label for="new_image" class="text-xl">image</label>
            @error('image') <span class="text-red-600 ml-2">{{ $message }}</span>@enderror
            @if($book->image)
            <img class="w-24 h-18 rounded" src="{{ asset('storage/images/'.$book->image)}}" alt="">
            <div>{{$book->image}}</div>
            @endif
            <input type="file" id="image" name="new_image" class="block w-full p-2 bg-white border border-gray-400 rounded-md mb-6">


            <label for="price" class="text-xl">price</label>
            @error('price') <span class="text-red-600 ml-2">{{ $message }}</span>@enderror
            <input type="text" id="price" name="price" class="block w-full p-2 bg-white border border-gray-400 rounded-md mb-6" value="{{$book->price}}">

            <label for="description" class="text-xl">description</label>
            @error('description') <span class="text-red-600 ml-2">{{ $message }}</span>@enderror
            <textarea type="text" rows="3" id="description" name="description" class="block w-full p-2 bg-white border border-gray-400 rounded-md mb-6">{{$book->description}}</textarea>

            <div class="text-center">
                <button type="submit" class="bg-blue-600 border rounded-md px-4 py-1 text-white text-lg">実行</button>
                <a href="{{route('book.index')}}?page={{$page_id}}" class="inline-block p-2 bg-amber-600 border rounded-md px-4 py-1 text-white text-lg">戻る</a>
            </div>
        </form>
    </div>
</x-app>
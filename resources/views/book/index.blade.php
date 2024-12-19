<x-app>
<div class="max-w-5xl mx-auto">
        <div class="h-20 text-center ">
            @if(session('message'))<div class="inline-block mt-5 py-2 px-4 text-xl text-bold space-y-2 bg-white border-2 border-blue-500 rounded-md">{{session('message')}}</div>@endif
        </div>
        <table class="w-full bg-gray-200 border-2 border-white">
            <thead>
                <tr class="dark:border-gray-700 bg-gray-600 text-white">
                    <!-- <th class="p-4 text-left w-[5%]">Id</th> -->
                    <th class="p-4 text-left w-[12%]">Title</th>
                    <th class="p-4 text-left w-[8%]">Image</th>
                    <th class="p-4 text-left w-[10%]">Price</th>
                    <th class="p-4 text-left max-w-md break-words">Description</th>
                    <th class="p-4 text-left w-[15%]">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr class="even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <!-- <td class="hidden">{{$book->id}}</td> -->
                    <td class="p-4">{{$book->title}}</td>
                    <td class="p-4">
                        @if($book->image)
                        <img class="w-12 h-9 rounded" src="{{ asset('storage/images/'.$book->image)}}" alt="">
                        @endif
                    </td>
                    <td class="p-4">{{$book->price}}</td>
                    <td class="p-4">{{ nl2br ($book->description)}}</td>
                    <td class="p-4">
                        <div class="flex space-x-2">
                            <form action="{{route('book.edit',$book->id)}}?page_id={{$page_id}}" method="POST" >
                                @method("GET")
                                <input type="submit" value="編集" class="bg-sky-600 border rounded-md px-4 py-1 text-white text-lg
                                 hover:bg-sky-400 focus:bg-sky-400 active:bg-sky-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"></input>
                            </form>
                            <form action="{{route('book.destroy',$book)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <input type="submit" onclick='return confirm("削除しますか？")' value="削除" class="bg-rose-600 border rounded-md px-4 py-1 text-white text-lg
                                 hover:bg-rose-400 focus:bg-rose-400 active:bg-rose-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"></input>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="m-2 p-2">{{$books->links()}}</div>
    </div>

</x-app>

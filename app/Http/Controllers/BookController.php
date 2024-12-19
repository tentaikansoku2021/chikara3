<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //     $books = Book::orderBy('id','asc')->paginate(5);
        //     return view('book.index',compact('books'));
        $search = $request->input('search');
        if ($search != "") {
            $books = Book::where('title', 'like', "%{$search}%")->orderBy('id', 'asc')->paginate(5);
            return view('book.index', compact('books'));
        } else {
            $books = Book::orderBy('id', 'asc')->paginate(5);
            return view('book.index', compact('books'))
            ->with('page_id',request()->page)
            ->with('i',(request()->input('page',1)-1)*5);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'title' =>       'required|max:20',
            'image' =>       'image|max:2028',
            'price' =>       'integer|required|max:100000',
            'description' => 'required',
        ]);
        if (request('image')) {
            $original = request()->file('image')->getClientOriginalName();
            $name = date('Ymd_His') . '_' . $original;
            request()->file('image')->move('storage/images', $name);
            Book::create([
                'title' => $inputs['title'],
                'image' => $name,
                'price' => $inputs['price'],
                'description' => $inputs['description']
            ]);
        } else {
            Book::create([
                'title' => $inputs['title'],
                'image' => null,
                'price' => $inputs['price'],
                'description' => $inputs['description']
            ]);
        }

        return redirect()->route('book.index')->with('message', 'Title ' . $inputs['title'] . ' を登録しました。');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
      
        return view('book.edit', compact('book'))->with('page_id',request()->page_id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {

        $inputs = $request->validate([
            'title' =>       'required|max:20',
            'new_image' =>       'image|max:2028',
            'price' =>       'integer|required|max:100000',
            'description' => 'required',
        ]);

        if (request('new_image')) {
            $original = request()->file('new_image')->getClientOriginalName();
            $name = date('Ymd_His') . '_' . $original;
            request()->file('new_image')->move('storage/images', $name);
            Book::where('id', $book->id)->update([
                'title' => $inputs['title'],
                'image' => $name,
                'price' => $inputs['price'],
                'description' => $inputs['description']
            ]);
            if ($book->image) {
                Storage::disk('public')->delete('images/' . $book->image);
            }
        } else {
            Book::where('id', $book->id)->update([
                'title' => $inputs['title'],
                // 'image'=>null,
                'price' => $inputs['price'],
                'description' => $inputs['description']

            ]);
        }
        return redirect()->route('book.index')->with('message', 'Title ' . $inputs['title'] . ' を変更しました。');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if ($book->image) {
            Storage::disk('public')->delete('images/' . $book->image);
        }
        Book::where('id', $book->id)->delete();
        return redirect()->route('book.index')->with('message', 'Title ' . $book->title . ' を削除しました。');
    }
}

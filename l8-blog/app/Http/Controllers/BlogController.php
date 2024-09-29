<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    //menampilkan isi list
    public function index(){
        $blogs = Blog::latest()->paginate(10);
        return view('blog.index', compact('blogs'));
    }

    /**
     * buat button create, masuk ke page create
    * create
    *
    * @return void
    */
    public function create(){
        return view('blog.create');
    }
    
    /**
    * store
    *
    * @param  mixed $request
    * @return void
    */
    
    //buat buat button insert, masukkan data sesuai input
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'content'   => 'required'
        ]);

        
            // upload image
            $image = $request->file('image');
            $image->storeAs('public/blogs', $image->hashName()); //randomize nama file

            $blog = Blog::create([
                'image'     => $image->hashName(),
                'title'     => $request-> title,
                'content'   => $request->content
            ]);

            if ($blog) {
                # pesan sukses
                return redirect()->route('blog.index')->with(['success' => 'Data aman bang']);
            } else{
                return redirect()->route('blog.index')->with(['error' => 'Data gagal bang']);
            }
        }

        // buat button edit, pindah page
        public function edit(Blog $blog){
            return view('blog.edit', compact('blog'));
        }
        
        public function update(Request $request, Blog $blog){
            $this->validate($request, [
                'title'     => 'required',
                'content'   => 'required'
            ]);
            $blog = Blog::findOrFail($blog->id);

            if($request->file('image') == ""){
                $blog->update([
                    'title'     => $request->title,
                    'content'   => $request->content
                ]);
            } else {
                //hapus image lama
                Storage::disk('local')->delete('public/blogs/'.$blog->image);
                //upload new image
                $image = $request->file('image');
                $image->storeAs('public/blogs', $image->hashName());

                $blog->update([
                    'image'     => $image->hashName(),
                    'title'     => $request->title,
                    'content'     => $request->content
                ]);
                
            }
            if($blog){
                //redirect dengan pesan sukses
                return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Diupdate!']);
            }else{
                //redirect dengan pesan error
                return redirect()->route('blog.index')->with(['error' => 'Data Gagal Diupdate!']);
            }
        }
            public function destroy($id){
                $blog = Blog::findOrFail($id);
                Storage::disk('local')->delete('public/blogs/'.$blog->image);
                $blog->delete();

                if($blog){
                    //redirect dengan pesan sukses
                    return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Dihapus!']);
                }else{
                    //redirect dengan pesan error
                    return redirect()->route('blog.index')->with(['error' => 'Data Gagal Dihapus!']);
                }
            }
    }

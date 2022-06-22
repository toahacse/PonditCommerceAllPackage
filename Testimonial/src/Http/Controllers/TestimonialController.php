<?php

namespace Pondit\PonditCommerce\Testimonial\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pondit\PonditCommerce\Testimonial\Models\Testimonial;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('id', 'desc')->get();
        return view('testimonial::testimonials.index', ['testimonials' => $testimonials]);
    }

    public function create()
    {
        return view('testimonial::testimonials.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
 
            if ($request->file('picture')) {
                $data['picture'] = $this->uploadFile($request->picture, $request->name);
            }

            if($request->is_active){
                $data['is_active'] = $request->is_active;
            }else{
                $data['is_active'] = 0;
            }
        
            $testimonials = Testimonial::create($data);

            return redirect()
                            ->route('testimonials.index')
                            ->withMessage('Testimonial has been created successfully!');

        } 
        catch (Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
        catch (QueryException $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('testimonial::testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            $testimonial = Testimonial::find($id);

            if ($request->file('picture')) {
                $this->unlink($testimonial->picture);
                $data['picture'] = $this->uploadFile($request->picture, $request->name);
            }
            if($request->is_active){
                $data['is_active'] = $request->is_active;
            }else{
                $data['is_active'] = 0;
            }

            $testimonial->update($data);

            return redirect()
                            ->route('testimonials.index')
                            ->withMessage('Testimonial has been updated successfully!');

        } 
        catch (Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
        catch (QueryException $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function show($id)
    {
        $testimonial = Testimonial::withTrashed()->find($id);
        return view('testimonial::testimonials.show', compact('testimonial'));
    }
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->delete();
        return redirect()
                            ->route('testimonials.index')
                            ->withMessage('Testimonial has been deleted successfully!');
    }
    
    public function trashed()
    {
        $testimonials = Testimonial::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('testimonial::testimonials.trashed', ['testimonials' => $testimonials]);
    }

    public function trashed_restore($id)
    {
        $testimonial = Testimonial::withTrashed()->find($id);        
        $testimonial->restore();
        return redirect()
                            ->route('testimonials.index')
                            ->withMessage('Testimonial has been deleted successfully!');
    }

    public function trashed_destroy($id)
    {
        $testimonial = Testimonial::withTrashed()->find($id);
        $this->unlink($testimonial->picture); 
        $testimonial->forceDelete();
        return redirect()
                            ->route('testimonials.index')
                            ->withMessage('Testimonial has been deleted successfully!');
    }


 private function uploadFile($file, $name)
    {
        $folder = storage_path('/app/public/testimonial-images/');
        if (!File::exists($folder)) {
            $folderCreate = File::makeDirectory($folder, 0775, true, true);  
            if (!isset($folderCreate))
                throw new Exception("Could not permission for creating folder on storage path.", 1);
        }
        $timestamp = str_replace([' ', ':'], '', now());
        $file_name = $timestamp .'-'.$name. '.' .$file->getClientOriginalExtension();
        $file->move($folder, $file_name);
 
        return $file_name;
    }
 
    private function unlink($file)
    {
        $pathToUpload = storage_path().'/app/public/testimonial-images/';
        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }



}

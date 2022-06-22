<?php

namespace Pondit\PonditCommerce\Slider\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pondit\PonditCommerce\Slider\Models\Slider;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;
use Pondit\PonditCommerce\Category\Models\Category;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('id', 'desc')->get();
        return view('slider::sliders.index', ['sliders' => $sliders]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('slider::sliders.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
 
            if ($request->file('picture')) {
                $data['picture'] = $this->uploadFile($request->picture, $request->title);
            }

            if($request->is_active){
                $data['is_active'] = $request->is_active;
            }else{
                $data['is_active'] = 0;
            }

            $sliders = Slider::create($data);

            return redirect()
                            ->route('sliders.index')
                            ->withMessage('Slider has been created successfully!');

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
        $slider = Slider::find($id);
        $categories = Category::all();
        return view('slider::sliders.edit', compact('slider', 'categories'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            $slider = Slider::find($id);

            if ($request->file('picture')) {
                $this->unlink($slider->picture);
                $data['picture'] = $this->uploadFile($request->picture, $request->name);
            }
            if($request->is_active){
                $data['is_active'] = $request->is_active;
            }else{
                $data['is_active'] = 0;
            }

            $slider->update($data);

            return redirect()
                            ->route('sliders.index')
                            ->withMessage('Slider has been updated successfully!');

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
        $slider = Slider::withTrashed()->find($id);
        return view('slider::sliders.show', compact('slider'));
    }
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()
                            ->route('sliders.index')
                            ->withMessage('Slider has been deleted successfully!');
    }
    
    public function trashed()
    {
        $sliders = Slider::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('slider::sliders.trashed', ['sliders' => $sliders]);
    }

    public function trashed_restore($id)
    {
        $slider = Slider::withTrashed()->find($id);        
        $slider->restore();
        return redirect()
                            ->route('sliders.index')
                            ->withMessage('Slider has been deleted successfully!');
    }

    public function trashed_destroy($id)
    {
        $slider = Slider::withTrashed()->find($id);
        $this->unlink($slider->picture); 
        $slider->forceDelete();
        return redirect()
                            ->route('sliders.index')
                            ->withMessage('Slider has been deleted successfully!');
    }


 private function uploadFile($file, $name)
    {
        $folder = storage_path('/app/public/slider-images/');
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
        $pathToUpload = storage_path().'/app/public/slider-images/';
        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }



}

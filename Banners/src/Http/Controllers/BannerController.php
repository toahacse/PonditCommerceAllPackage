<?php

namespace Pondit\PonditCommerce\Banners\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pondit\PonditCommerce\Banners\Models\Banners;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banners::orderBy('id', 'desc')->get();
        return view('banners::banners.index', ['banners' => $banners]);
    }

    public function create()
    {
        return view('banners::banners.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
           
            if ($request->file('picture')) {
                $data['picture'] = $this->uploadFile($request->picture, $request->title);
            }
            if($request->is_active){
                $data['is_active'] = $request->is_active ;
            }else{
                $data['is_active'] = 0;
            }
            if($request->is_draft){
                $data['is_draft'] = $request->is_draft;
            }else{
                $data['is_draft'] = 0;
            }
            if($request->max_display){
                $data['max_display'] = $request->max_display;
            }else{
                $data['max_display'] = 0;
            }

            $banners = Banners::create($data);

            return redirect()
                            ->route('banners.index')
                            ->withMessage('Banner has been created successfully!');

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
        $banner = Banners::find($id);
        return view('banners::banners.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            $banner = Banners::find($id);

            if ($request->file('picture')) {
                $this->unlink($banner->picture);
                $data['picture'] = $this->uploadFile($request->picture, $request->title);
            }
            if($request->is_active){
                $data['is_active'] = $request->is_active ;
            }else{
                $data['is_active'] = 0;
            }
            if($request->is_draft){
                $data['is_draft'] = $request->is_draft;
            }else{
                $data['is_draft'] = 0;
            }
            if($request->max_display){
                $data['max_display'] = $request->max_display;
            }else{
                $data['max_display'] = 0;
            }

            $banner->update($data);

            return redirect()
                            ->route('banners.index')
                            ->withMessage('Banner has been updated successfully!');

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
        $banner = Banners::withTrashed()->find($id);
        return view('banners::banners.show', compact('banner'));
    }
    public function destroy($id)
    {
        $banner = Banners::find($id);
        $banner->delete();
        return redirect()
                            ->route('banners.index')
                            ->withMessage('Banner has been deleted successfully!');
    }
    
    public function trashed()
    {
        $banners = Banners::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('banners::banners.trashed', ['banners' => $banners]);
    }

    public function trashed_restore($id)
    {
        $banner = Banners::withTrashed()->find($id);        
        $banner->restore();
        return redirect()
                            ->route('banners.index')
                            ->withMessage('Banner has been deleted successfully!');
    }

    public function trashed_destroy($id)
    {
        $banner = Banners::withTrashed()->find($id);
        $this->unlink($banner->picture);
        
        $banner->forceDelete();
        return redirect()
                            ->route('banners.index')
                            ->withMessage('Banner has been deleted successfully!');
    }






    private function uploadFile($file, $name)
    {
        $folder = storage_path('/app/public/banner-images/');
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
        $pathToUpload = storage_path().'/app/public/banner-images/';
        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }

}

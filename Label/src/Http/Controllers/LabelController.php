<?php

namespace Pondit\PonditCommerce\Label\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pondit\PonditCommerce\Label\Models\Label;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;

class LabelController extends Controller
{
    public function index()
    {
        $labels = Label::orderBy('id', 'desc')->get();
        return view('label::labels.index', ['labels' => $labels]);
    }

    public function create()
    {
        return view('label::labels.create');
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

            $labels = Label::create($data);

            return redirect()
                            ->route('labels.index')
                            ->withMessage('Label has been created successfully!');

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
        $label = Label::find($id);
        return view('label::labels.edit', compact('label'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            $label = Label::find($id);

            if ($request->file('picture')) {
                $this->unlink($label->picture);
                $data['picture'] = $this->uploadFile($request->picture, $request->name);
            }
            if($request->is_active){
                $data['is_active'] = $request->is_active;
            }else{
                $data['is_active'] = 0;
            }

            $label->update($data);

            return redirect()
                            ->route('labels.index')
                            ->withMessage('Label has been updated successfully!');

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
        $label = Label::withTrashed()->find($id);
        return view('label::labels.show', compact('label'));
    }
    public function destroy($id)
    {
        $label = Label::find($id);
        $label->delete();
        return redirect()
                            ->route('labels.index')
                            ->withMessage('Label has been deleted successfully!');
    }
    
    public function trashed()
    {
        $labels = Label::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('label::labels.trashed', ['labels' => $labels]);
    }

    public function trashed_restore($id)
    {
        $label = Label::withTrashed()->find($id);        
        $label->restore();
        return redirect()
                            ->route('labels.index')
                            ->withMessage('Label has been deleted successfully!');
    }

    public function trashed_destroy($id)
    {
        $label = Label::withTrashed()->find($id);
        $this->unlink($label->picture); 
        $label->forceDelete();
        return redirect()
                            ->route('labels.index')
                            ->withMessage('Label has been deleted successfully!');
    }


 private function uploadFile($file, $name)
    {
        $folder = storage_path('/app/public/label-images/');
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
        $pathToUpload = storage_path().'/app/public/label-images/';
        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }



}

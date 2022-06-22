<?php

namespace Pondit\PonditCommerce\UserInformation\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pondit\PonditCommerce\UserInformation\Models\UserInformation;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;

class UserInformationController extends Controller
{
    public function index()
    {
        $user_informations = UserInformation::orderBy('id', 'desc')->get();
        return view('userinformation::user_informations.index', ['user_informations' => $user_informations]);
    }

    public function create()
    {
        return view('userinformation::user_informations.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
 
            if ($request->file('picture')) {
                $data['picture'] = $this->uploadFile($request->picture, $request->title);
            }

            $user_informations = UserInformation::create($data);

            return redirect()
                            ->route('user-informations.index')
                            ->withMessage('UserInformation has been created successfully!');

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
        $user_information = UserInformation::find($id);
        return view('userinformation::user_informations.edit', compact('user_information'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            $user_information = UserInformation::find($id);

            if ($request->file('picture')) {
                $this->unlink($user_information->picture);
                $data['picture'] = $this->uploadFile($request->picture, $request->name);
            }

            $user_information->update($data);

            return redirect()
                            ->route('user-informations.index')
                            ->withMessage('UserInformation has been updated successfully!');

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
        $user_information = UserInformation::withTrashed()->find($id);
        return view('userinformation::user_informations.show', compact('user_information'));
    }
    public function destroy($id)
    {
        $user_information = UserInformation::find($id);
        $user_information->delete();
        return redirect()
                            ->route('user-informations.index')
                            ->withMessage('UserInformation has been deleted successfully!');
    }
    
    public function trashed()
    {
        $user_informations = UserInformation::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('userinformation::user_informations.trashed', ['user_informations' => $user_informations]);
    }

    public function trashed_restore($id)
    {
        $user_information = UserInformation::withTrashed()->find($id);        
        $user_information->restore();
        return redirect()
                            ->route('user-informations.index')
                            ->withMessage('UserInformation has been deleted successfully!');
    }

    public function trashed_destroy($id)
    {
        $user_information = UserInformation::withTrashed()->find($id);
        $this->unlink($user_information->picture); 
        $user_information->forceDelete();
        return redirect()
                            ->route('user-informations.index')
                            ->withMessage('UserInformation has been deleted successfully!');
    }


 private function uploadFile($file, $name)
    {
        $folder = storage_path('/app/public/user_information-images/');
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
        $pathToUpload = storage_path().'/app/public/user_information-images/';
        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }



}

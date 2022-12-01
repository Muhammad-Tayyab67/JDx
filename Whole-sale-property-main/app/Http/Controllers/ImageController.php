<?php

namespace App\Http\Controllers;
use App\Models\Images;
use Illuminate\Support\Facades\Storage;
use Validator;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function Property_Files($id)
    {
        $id = decrypt($id);
        $files = Images::where('poperty_id',$id)->get();
        $page_title = 'Property Management';
        $page_description = 'Some description for the page';
        $logo = "images/KECO-logo.png";
        $action = __FUNCTION__;
        return view('PropertyManagement.property.files', compact('id','files','page_title', 'page_description','action','logo'));
    }

    public function delete($path)
    {
        $path = decrypt($path);
        $image = Images::where('URL',$path)->first();
        $id = $image->poperty_id;
        if(Storage::disk('s3')->exists($path)) {
            Storage::disk('s3')->delete($path);
            $image->delete();
            return redirect('/property/files/list/'.encrypt($id))->with('success','Image Deleted Successfully.');       
        }
     

    }

    public function download($path)
    {
        $path = decrypt($path);
        return Storage::disk('s3')->download($path);
    }
    public function store(Request $request ,$id)
    {
        $files = $request->file('image');
        $id = decrypt($id);
        $validator = Validator::make($request->all(), [
         'files' => 'required|file|size:10240', //10mb 
          ]);
            if($validator->fails()){
                return redirect('/property/files/list/'.encrypt($id))->with('warning','The Size of Attachment must be less then 12mbs .');
            }  
        foreach($files as $file)
        {
        $allowedfileExtension=['jpg','png','jpeg'];   
        $extension = $file->getClientOriginalExtension();
        $check=in_array($extension,$allowedfileExtension);
        if($check){
              
        $imgurl=new Images();
        $imgurl->poperty_id=$id;
        $fileName = time().$file->getClientOriginalName();
        $path = $id.'/'.$fileName;
        $imgurl->URL=$path;
        Storage::disk('s3')->put($path, file_get_contents($file));
        $imgurl->save();
        }
        else{
        return redirect('/property/files/list/'.encrypt($id))->with('warning','Attachment Type Must be jpeg, png and jpg .');
        } 
        }
        return  redirect()->back()->with('success','New Image has been added.');
    }
}

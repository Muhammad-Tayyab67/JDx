<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Images;
use App\Models\States;
use App\Models\OwnerInfo;
use App\Mail\SentMail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

use Validator;
use Auth;

class ScoutController extends Controller
{
    public function Scout_FORM()
    {
        $states = States::all();
        $page_title = 'Property Management';
        $page_description = 'Some description for the page';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;                 
        return view('PropertyManagement.scout.form', compact('states','page_title', 'page_description','action','logo','logoText'));
    }

    public function store(Request $request)
    {
        $scout = new Property();
        // $state = States::select('abbr')->where('name',$request->state)->first();
        $scout->city = $request->city;
        $scout->state = $request->state;
        $scout->zip = $request->zip;
        $scout->street= $request->street;
        $scout->emp_id = Auth::id();
        $scout->download_status='no';
        $scout->notify = 1;
        $scout->contracts = 0;
        $scout->appointments = 0;
        if($request->unit == null)
        {
        $scout->address = $request->street.', '.$request->city.', '.$request->state.', '.$request->zip;
        }
        else{
        $scout->address = $request->street.', '.$request->unit.', '.$request->city.', '.$request->state.', '.$request->zip;
        $scout->unit = $request->unit;
        }

        $alreadyExists = Property::where('address',$scout->address)->first();
        if ($alreadyExists) {
        return redirect('/scout/list')->with('warning','Address has been added.');
        }
        else
        {
        $scout->save();

         
        $information=new OwnerInfo();
        $information2=new OwnerInfo();
        $information->property_id=$scout->id;
        $information->Info="";
        $information->Type="Email";
        $information->Status="No Service";
        $information->save();
        $information2->property_id=$scout->id;
        $information2->Info="";
        $information2->Type="Number";
        $information2->Status="No Service";
        $information2->save();

       // $files = $request->file('image');
        if($request->hasFile('image'))
        {
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
         $fileName = time().$file->getClientOriginalName();
         if($check){
         $imgurl=new Images();
         $imgurl->poperty_id=$scout->id;
         $path = $scout->id.'/'.$fileName;
         $imgurl->URL=$path;
         Storage::disk('s3')->put($path, file_get_contents($file));
         $imgurl->save();
         }
         else
         {
         return redirect('/property/files/list/'.encrypt($id))->with('warning','Attachment Type Must be jpeg, png and jpg .');
         }
         }

        }

        $to_mails = ['karl@kecocapital.com','admin@kecocapital.com','aidan@kecocapital.com'];
        foreach($to_mails as $to){
        Mail::to($to)->send(new SentMail($scout));
        }
        return redirect('/scout/list')->with('success','New Scout has been added.');        
        }

    }

    public function Scout_LIST()
    {
        $scout = Property::all();
        $page_title = 'Property Management';
        $page_description = 'Some description for the page';
        $logo = "images/KECO-logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
                    
        return view('PropertyManagement.scout.view', compact('scout','page_title', 'page_description','action','logo','logoText'));
    }

    public function Scout_EDIT($id)
    {
        $id = decrypt($id);
        $scout = Property::find($id);
        $states = States::all();
        $page_title = 'Property Management';
        $page_description = 'Some description for the page';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;            
        return view('PropertyManagement.scout.edit', compact('states','scout','page_title', 'page_description','action','logo','logoText'));
    }
    public function destroy($id)
    {
        $id = decrypt($id);
        $scout = Property::find($id);
        $images = Images::where('poperty_id',$id)->get();

        if($images->isNotEmpty()){
        foreach ($images as $key => $image) {
            if(Storage::disk('s3')->exists($image->URL))
            {
                Storage::disk('s3')->delete($image->URL);
            }
        }
        $images->delete();
    }
        $scout->delete();
        return back()->with('success','Scout has been deleted');
    }

    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        $property = Property::find($id);
        if($request->unit == null)
        {
        $address = $request->street.', '.$request->city.', '.$request->state.', '.$request->zip;
        }
        else{
        $address = $request->street.', '.$request->unit.', '.$request->city.', '.$request->state.', '.$request->zip;
        $property->unit = $request->unit;
        }
        $validator = Validator::make(['address'=> $address], [
            'address' => ['required', 'unique:properties,address,'.$property->id.',id']
        ]);

        if($validator->fails()){
            return redirect('scout/edit/'.encrypt($property->id))->with('warning', 'This Property already exists please try again with another one!');
        }

        $property->city = $request->city;
        $property->state = $request->state;
        $property->zip = $request->zip;
        $property->street= $request->street;
        $property->address = $address;
        $property->save();
        return redirect('/scout/list')->with('success','Property has been updated.');

    }
}

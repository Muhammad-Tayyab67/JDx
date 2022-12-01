<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\OwnerInfo;
use App\Models\Images;
use Illuminate\Support\Facades\Storage;
use App\Exports\PropertyExport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;

class PropertyController extends Controller
{
    public function Property_LIST()
    {
        $property = Property::all();
        $infos = OwnerInfo::all();
        $page_title = 'Property Management';
        $page_description = 'Some description for the page';
        $logo = "images/KECO-logo.png";
        $action = __FUNCTION__;
                    
        return view('PropertyManagement.property.view', compact('infos','property','page_title', 'page_description','action','logo'));
    }

    public function Property_EDIT($id)
    {
        $id = decrypt($id);
        $property = Property::find($id);
        if(Auth::user()->roles[0]->name == 'Super Admin'){
        $property->notify=0;
        $property->save();
        }
       
        $page_title = 'Property Management';
        $page_description = 'Some description for the page';
        $logo = "images/KECO-logo.png";
        $action = __FUNCTION__;
                    
        return view('PropertyManagement.property.edit', compact('property','page_title', 'page_description','action','logo'));
    }

    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        $property = Property::find($id);

        if( $request->has('Contracts') ){
            $property->contracts = 1;
        }
        else{ $property->contracts = 0; }

        if( $request->has('Appointments') ){
            $property->appointments = 1;
        }
        else
        {$property->appointments = 0;}

        $informations = OwnerInfo::where('property_id',$id)->get();
        if($informations->isNotEmpty())
        {
        foreach ($informations as $key => $information) {
            $information->delete(); 
        }
        }

       // $address = 'House No # '.$request->unit.', Street #'.$request->street.', '.$request->zip.', '.$request->city.', '.$request->state;
       foreach ($request->owner_no as $key => $number) {
        $info = new OwnerInfo();
        $info->Info=$number;
        $info->Type="Number";
        if($request->no_status[$key] == "Confirmed"){
        $property->owner_no = $number;
        }
        $info->Status=$request->no_status[$key];
        $info->property_id=$id;
        $info->save();
       } 
       
       foreach ($request->owner_email as $key => $email) {
        $info_email = new OwnerInfo();
        $info_email->Info=$email;
        $info_email->Type="Email";
        if($request->email_status[$key] == "Confirmed"){
        $property->owner_email = $email;
        }
        $info_email->Status=$request->email_status[$key];
        $info_email->property_id=$id;
        $info_email->save();
       } 
       $property->owner_name = $request->owner_name;
       $property->revenue = $request->revenue;
       
        //$property->address = $address;
        $property->save();
        return redirect('/property/list')->with('success','Property has been updated.');

    }

    public function destroy($id)
    {
        $id = decrypt($id);
        $images = Images::where('poperty_id',$id)->get();

        foreach ($images as $key => $image) {
            if(Storage::disk('s3')->exists($image->URL))
            {
                Storage::disk('s3')->delete($image->URL);
                $image->delete();
            }
        }

        $informations = OwnerInfo::where('property_id',$id)->get();
        if($informations->isNotEmpty())
        {
            foreach ($informations as $key => $information) {
                $information->delete(); 
            }
        }

       
        $property = Property::find($id);
        $property->delete();
        return back()->with('success','Property has been deleted');
    }

    public function export(Request $request)
    {
    
      $properties = Property::whereIn('id',$request->array)->get();
    
      return Excel::download(new PropertyExport($properties), 'PropertyExport.xlsx');

     
    }
       
}

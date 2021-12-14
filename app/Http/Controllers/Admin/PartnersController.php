<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

use App\Models\PartnersDeal;

class PartnersController extends Controller
{
    public function __construct()
	{
	    $this->middleware(['auth','role:administrator']);
	}
    public function index()
    {
        $page_title = 'Partners\' Deals';
        $page_description = '';

        return view('backend.administrator.partners.index', compact('page_title', 'page_description'));
    }

    public function ajax($section, Request $request)
    {
    	switch ($section) {
    		case 'add_new_deal':
                  

                // echo sizeof($_FILES);
				// print_r($_FILES);exit;

                $fake_id = $request->fake_id;

               
                $partnersDeal = PartnersDeal::where('id', $fake_id)->first();
        

				
				$validator = \Validator::make($request->all(), [
					'partner' => 'required',
					'description' => 'required',
					'terms' => 'required',
				]);
				
				if ($validator->fails())
				{
					return Response::json(array('error'=>true , 'errors'=>$validator->errors()->all()));
				}

                if(empty($partnersDeal)) 
                {   

                        if(sizeof($_FILES) != 0)
                        {

                            $image = $request->file('get_file');
                            $full_name = $image->getClientOriginalName();
                            $filename = pathinfo($full_name, PATHINFO_FILENAME);
                            $extension = pathinfo($full_name, PATHINFO_EXTENSION);
                            $ranstr = sha1(time());
                            
                            $new_name = $filename.'_'. $ranstr. '.' . $image->getClientOriginalExtension();
    
                            $image->move(public_path('upload_img'), $new_name);

                        }
                        else {
                            $new_name = "";
                        }
                 
                
                        $insert_id = PartnersDeal::create([
                            'partner' => $request->partner,
                            'deals_description' => $request->description,
                            'terms' =>$request->terms,   
                            'image_url' => $new_name,                     
                        ]);

                    

					return Response::json(array('error'=>false , 'message'=>'Data Successfully Added','errors'=>$validator->errors()->all()));
				}
                else  
                {

                    
                    if(sizeof($_FILES) != 0)
                    {

                        $image = $request->file('get_file');
                        $full_name = $image->getClientOriginalName();
                        $filename = pathinfo($full_name, PATHINFO_FILENAME);
                        $extension = pathinfo($full_name, PATHINFO_EXTENSION);
                        $ranstr = sha1(time());
                        
                        $new_name = $filename.'_'. $ranstr. '.' . $image->getClientOriginalExtension();

                        $image->move(public_path('upload_img'), $new_name);

                    }
                    else {
                        $new_name = "";
                    }

                    $partnersDeal->partner = $request->partner;
                    $partnersDeal->deals_description = $request->description;
                    $partnersDeal->terms = $request->terms;
                    $partnersDeal->image_url = $new_name;

                    $partnersDeal->save();

					return Response::json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=>$validator->errors()->all()));
                }

                break;
                        
            case 'list':
    				$data = PartnersDeal::get();

    				return json_encode($data);
    			break;

				case 'load_single_partner':
    				$data = PartnersDeal::where('id', $request->id)->first();

    				return json_encode($data);
    			break;

    		default:
    			
    			break;
    	}
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Message;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index() {
        $all_ads = new Ad;

        if(isset(request()->cat)){
            //$cat = Category::where('name',request()->cat)->first();
            //$all_ads = Ad::with('category')->where('category_id',$cat->id)->get();

            $all_ads = Ad::whereHas('category', function ($query) {
                // $query->where('name',request()->cat);
                $query->whereName(request()->cat);
            });
            
        }
        if(isset(request()->type)){
            $type = (request()->type == "lower") ? "desc" : "asc";
            $all_ads = $all_ads->orderBy('price', $type);
        }
        
        $all_ads = $all_ads->get();
        $all_categories = Category::all();

        return view('welcome',compact('all_ads','all_categories'));
    }

    public function singleAd($id) {
        $single_ad = Ad::find($id);

        if(auth()->check() && auth()->user()->id != $single_ad->user->id){
            $single_ad->increment('views');

        }

        return view('singleAd',compact('single_ad'));
    }

    public function sendMessage(Request $request,$id) {
        $ad = Ad::find($id);

        $ad_owner = $ad->user;

        $new_msg = new Message();
        $new_msg->text = $request->msg;
        $new_msg->sender_id = auth()->user()->id;
        $new_msg->reciever_id = $ad_owner->id;
        $new_msg->ad_id = $ad->id;
        $new_msg->save();

        // Message::create([
        //     'text'=>$request->msg,
        //     'sender_id'=>auth()->user()->id,
        //     'reciever_id'=>$ad_owner->id,
        //     'ad_id'=>$ad->id
        // ]); 
        // za ovaj nacin je potreban fillable popunjen 

        return redirect()->back()->with('message','Message sent');
    }
}



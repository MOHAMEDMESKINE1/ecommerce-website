<?php

namespace App\Http\Controllers\Store;

use Exception;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriberRequest;

class SubscriberController extends Controller
{
    public function index(){

        $subscribers = Subscriber::latest()->paginate(2);

         return view("users.admin.subscribers",compact('subscribers'));
    }
    public function search(Request $request)
    {
       
        $subscribers = Subscriber::where('email','like','%'. $request->search.'%')
       
        ->paginate(2);

        return view('users.admin.subscribers',compact('subscribers'));
    }
    public function store(SubscriberRequest $request){
        try {
 
             $formFields = $request->validated();
 
             Subscriber::create($formFields);
 
             return redirect()->route('subscribers.index')->with('success', 'Thank for you for your subscription !');
 
        } catch (Exception $ex) {
             dd($ex->getMessage());
        }
      }
      public function destroy($id){
        try {
 
 
             Subscriber::destroy($id);
 
             return redirect()->back()->with('success', 'Subscriber  deleted Successfully');
 
        } catch (Exception $ex) {
             dd($ex->getMessage());
        }
      }
}

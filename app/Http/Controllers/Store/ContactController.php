<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::latest()->paginate(2);

         return view("users.admin.contacts",compact('contacts'));
    }
    public function search(Request $request)
    {
       
        $contacts = Contact::where('email','like','%'. $request->search.'%')
       
        ->paginate(2);

        return view('users.admin.contacts',compact('contacts'));
    }
     public function store(ContactRequest $request){
       try {

            $formFields = $request->validated();

            Contact::create($formFields);

            return redirect()->route('contacts.index')->with('success', 'Thank you We will contact you soon !');

       } catch (Exception $ex) {
            dd($ex->getMessage());
       }
     }
     public function destroy($id){
       try {


            Contact::destroy($id);

            return redirect()->back()->with('success', 'Contact deleted Successfully');

       } catch (Exception $ex) {
            dd($ex->getMessage());
       }
     }
}

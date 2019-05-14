<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Contact;

class contactController extends Controller {

  // public function __construct() {
  //   return $this->middleware('auth')->except('index','show');
  // }

  public function index(){
    return Contact::paginate(10);
  }

  public function show($id){
    $contact = Contact::find($id);
    return response()->json($contact);
  }

  public function store(Request $request){
    $contact = Contact::create($request->all());
    return response()->json($contact);
  }

  public function edit($id){
    $contact = Contact::find($id);
    return response()->json($contact);
  }

  public function update($id, Request $request){
    $contact = Contact::find($id);
    $contact->update($request->all());
    return response()->json($contact);
  }
  
  public function destroy($id){
    $contact = Contact::find($id);
    $contact->delete();
    return response()->json('successfully deleted');
  }
}
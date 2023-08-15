<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Client;
class ClientController extends Controller
{

    public function paginate(){
    	$contacts = Client::latest()->paginate(5);
    	$i = 1;
    	return view("response", compact("contacts", "i"));
    }

    public function getdata(){
    	$contacts = Client::latest()->paginate(5);
    	$i = 1;
    	return view("response", compact("contacts", "i"));
    }

    public function errordata($error) {
        echo $error;
    }







    public function index() {
        $contacts = Client::latest()->paginate(5);
        return view('index',compact('contacts'));
    }

    public function create()
    {
        //form showing by modal, without controller or ajax
    }

    public function store(Request $request) {
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,svg,bmp,ico|max:1024',
        ]);

        if ($request->email) {
            $img = $request->file('image');
            $img_name = $img->getClientOriginalName(); 
            $base_name = pathinfo($img_name, PATHINFO_FILENAME); 
            $extension = $img->getClientOriginalExtension(); 
            $file_name_to_save = $base_name ."_".time().".".$extension;
            $img->move('images', $file_name_to_save);
            $contact = new Client();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->image = 'images/'.$file_name_to_save;
            $contact->save();
            if($contact){
                return response()->json("success");
            }else{
                return response()->json("error");
            }
        }
    }

    public function show($id) {
        $contact = Client::find($id);
    	return view("single-view", compact("contact"));
    }

    public function edit($id) {
        $contact = Client::find($id);
    	return view("edit", compact("contact"));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,svg,bmp,ico|max:1024',
        ]);

        $contact = Client::find($id);
        if (file_exists($contact->image) && $contact->image !=='images/default.jpg') {
            unlink($contact->image);
        }

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {
            $imageName = $slug.'-'.uniqid().'-'.'.'.$image->getClientOriginalExtension();
            $image->move('images/', $imageName);
        }
        else { $imageName = 'default.png'; }
        $imageUrl = 'images/'.$imageName;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->image = $imageUrl;
        $contact->save();
        if($contact){ return response()->json("success"); }
        else{ return response()->json("error"); }
    }

    public function destroy($id) {
        $client = Client::where('id', $id)->first();
        $client->delete();
        if($client){ return response()->json("success"); }
        else{ return response()->json("error"); }
    }
}

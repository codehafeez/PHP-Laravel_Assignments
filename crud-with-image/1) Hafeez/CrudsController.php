<?php
namespace App\Http\Controllers;
use App\Crud;
use Illuminate\Http\Request;
class CrudsController extends Controller
{
    public function index() {
        $data = Crud::latest()->paginate(5);
        return view('index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'image' => 'required|mimes:png,jpg,jpeg,svg,bmp,ico|max:1024',
        ]);

        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'first_name'       =>   $request->first_name,
            'last_name'        =>   $request->last_name,
            'image'            =>   $new_name
        );

        Crud::create($form_data);
        return redirect('crud')->with('success', 'Data Added successfully.');
    }

    public function show($id) {
        $data = Crud::findOrFail($id);
        return view('view', compact('data'));
    }

    public function edit($id) {
        $data = Crud::findOrFail($id);
        return view('edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'first_name'    =>  'required',
                'last_name'     =>  'required',
                'image'         =>  'image|max:2048'
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'first_name'    =>  'required',
                'last_name'     =>  'required'
            ]);
        }

        $form_data = array(
            'first_name'    =>  $request->first_name,
            'last_name'     =>  $request->last_name,
            'image'         =>  $image_name
        );

        Crud::whereId($id)->update($form_data);
        return redirect('crud')->with('success', 'Data is successfully updated');
    }

    public function destroy($id) {
        $data = Crud::findOrFail($id);
        $data->delete();
        return redirect('crud')->with('success', 'Data is successfully deleted');
    }
}

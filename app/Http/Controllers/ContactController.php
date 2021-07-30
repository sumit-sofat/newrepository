<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\ContactController;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Image;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     if (isset($request->contact) && $request->contact == 'onlyTrashed') {
    //         $contacts = Contact::onlyTrashed()->paginate(5);
    //     } else {
    //         $contacts = Contact::orderBy('id', 'DESC')->paginate(5);

    //     }

    //     return view('contacts.index', compact('contacts'));
    // }

    public function index()
    {

        return view('contacts.contacts');
    }

    public function getData(Request $request)
    {

        
            $data = Auth::user()->contacts->load('image');
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('profilepic', function ($data) {
                    if(isset($data) && !is_null($data['image'])){
                        return '<img src="'. asset('uploads/contacts').'/'.$data['image']['image'] .'" alt="" height=50px; width=50px>';
                    }
                   

                })
                ->addColumn('action', function ($data) {
                    return '<a href="contacts/' . $data->id . '">View</a>
                             <a href="contacts/' . $data->id . '/edit">/Edit</a>

                             <form action="contacts/' . $data->id . '" method="POST">
                             ' . csrf_field() . '
                             ' . method_field("DELETE") . '

                                            <button type="submit" class= "btn btn-primary show_confirm">Delete</button>
                                        </form>';

                })
                ->rawColumns(['action', 'profilepic'])
                ->make(true);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $file = $request->file('image');
        $formValues = $request->all();
        $formValues['user_id'] = Auth::id();
        
        $contact = Contact::create($formValues);
       
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/contacts/', $filename);

            $image = new Image();
            $image->image = $filename;

            $contact->image()->save($image);
        }   
        
        return redirect('contacts')->with('status', 'Contact added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        // $contact = Contact::find($id);
        $contact->first_name = $request->input('first_name');
        $contact->last_name = $request->input('last_name');
        $contact->mobile_number = $request->input('mobile_number');
        $contact->address = $request->input('address');
        $contact->update();
        return redirect('contacts')->with('status', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        // $contact = Contact::find($id);
        $contact->delete();
        return redirect('contacts')->with('status', 'Contact deleted successfully.');
    }

    //Restore Contact
    public function restoreContact($id)
    {
        $contact = Contact::withTrashed()->find($id);
        $contact->restore();
        return redirect('contacts');
    }
    //Force Delete
    public function forceDelete($id)
    {
        $contact = Contact::withTrashed()->find($id);
        $destination = 'uploads/contacts/' . $contact->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $contact->forceDelete();
        return redirect('contacts?contact=onlyTrashed');
    }

    public function submitForm(ContactRequest $request)
    {
        
        $formSubmit = $request->all();
        $file = $request->file('image');
        $formSubmit['user_id'] = Auth::id();
        $contacts = Contact::create($formSubmit);
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/contacts/', $filename);

            $image = new Image();
            $image->image = $filename;

            $contact->image()->save($image);
        }   
    }
}

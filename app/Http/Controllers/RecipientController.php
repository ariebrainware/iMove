<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipient;

class RecipientController extends Controller
{
    public function index()
    {

        $title = 'Recipient';
        $data = Recipient::get();

        return view('recipient.index', compact('title', 'data'));
    }

    public function add()
    {
        $title = 'Add Recipient';

        return view('recipient.add', compact('title'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ]);

        $data['id'] = \Uuid::generate(4);
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['email'] = $request->email;
        $data['phone_number'] = $request->phone_number;
        $data['postal_code'] = $request->postal_code;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $save = Recipient::insert($data);

        if ($save) {
            alert()->success('Success', 'Recipient saved');
            return redirect('recipient');
        } else {
            alert()->error('Fail', 'Recipient cannot be save');
            return redirect('recipient');
        }

        return redirect('recipient');
    }

    public function edit($id)
    {
        $dt = Recipient::find($id);
        $title = "Edit Recipient $dt->name";

        return view('recipient.edit', compact('title', 'dt'));
    }

    public function update(Request $request, $id)
    {
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['email'] = $request->email;
        $data['phone_number'] = $request->phone_number;
        $data['postal_code'] = $request->postal_code;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $update = Recipient::where('id', $id)->update($data);

        if ($update) {
            alert()->success('Success', 'Recipient edited');
            return redirect('recipient');
        } else {
            alert()->error('Fail', 'Recipient cannot be edit');
            return redirect('recipient');
        }
    }

    public function delete(Request $request)
    {
        $delete = Recipient::findOrFail($request->data);
        $delete->delete();
        if ($delete) {
            alert()->success('Success', 'Recipient deleted');
            return redirect('recipient');
        } else {
            alert()->error('Fail', 'Recipient cannot be delete');
            return redirect('recipient');
        }
    }
}

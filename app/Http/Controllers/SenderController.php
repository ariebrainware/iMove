<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sender;

class SenderController extends Controller
{
    public function index()
    {

        $title = 'Sender';
        $data = Sender::get();

        return view('sender.index', compact('title', 'data'));
    }

    public function add()
    {
        $title = 'Add Sender';

        return view('sender.add', compact('title'));
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

        $save = Sender::insert($data);

        if ($save) {
            alert()->success('Success', 'Sender saved');
            return redirect('sender');
        } else {
            alert()->error('Fail', 'Sender cannot be save');
            return redirect('sender');
        }

        return redirect('sender');
    }

    public function edit($id)
    {
        $dt = Sender::find($id);
        $title = "Edit Sender $dt->name";

        return view('sender.edit', compact('title', 'dt'));
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

        $update = Sender::where('id', $id)->update($data);

        if ($update) {
            alert()->success('Success', 'Sender edited');
            return redirect('sender');
        } else {
            alert()->error('Fail', 'Sender cannot be edit');
            return redirect('sender');
        }
    }

    public function delete(Request $request)
    {
        $delete = Sender::findOrFail($request->data);
        $delete->delete();
        if ($delete) {
            alert()->success('Success', 'Sender deleted');
            return redirect('sender');
        } else {
            alert()->error('Fail', 'Sender cannot be delete');
            return redirect('sender');
        }
    }
}

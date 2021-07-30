<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {

        $title = 'Storage Item';
        $data = Item::get();

        return view('item.index', compact('title', 'data'));
    }

    public function add()
    {
        $title = 'Add Item';

        return view('item.add', compact('title'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'recipient_id' => 'required',
            'name' => 'required',
            'weight' => 'required',
            'height' => 'required',
        ]);

        $data['id'] = \Uuid::generate(4);
        $data['recipient_id'] = $request->recipient_id;
        $data['name'] = $request->name;
        $data['weight'] = $request->weight;
        $data['height'] = $request->height;
        $data['volume_cm3'] = $request->volume_cm3;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $save = Item::insert($data);

        if ($save) {
            alert()->success('Success', 'Item saved');
            return redirect('item');
        } else {
            alert()->error('Fail', 'Item cannot be save');
            return redirect('item');
        }

        return redirect('item');
    }

    public function edit($id)
    {
        $dt = Item::find($id);
        $title = "Edit Item $dt->name";

        return view('item.edit', compact('title', 'dt'));
    }

    public function update(Request $request, $id)
    {
        $data['recipient_id'] = $request->recipient_id;
        $data['name'] = $request->name;
        $data['weight'] = $request->weight;
        $data['height'] = $request->height;
        $data['volume_cm3'] = $request->volume_cm3;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $update = Item::where('id', $id)->update($data);

        if ($update) {
            alert()->success('Success', 'Item edited');
            return redirect('item');
        } else {
            alert()->error('Fail', 'Item cannot be edit');
            return redirect('item');
        }
    }

    public function delete(Request $request)
    {
        $delete = Item::findOrFail($request->data);
        $delete->delete();
        if ($delete) {
            alert()->success('Success', 'Item deleted');
            return redirect('item');
        } else {
            alert()->error('Fail', 'Item cannot be delete');
            return redirect('item');
        }
    }
}

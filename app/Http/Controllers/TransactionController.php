<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Sender;
use App\Models\Item;
use App\Models\Recipient;
use PDF;

class TransactionController extends Controller
{
    public function index()
    {

        $title = 'Store Item Transaction';
        $data = Transaction::orderBy('created_at', 'desc')->get();

        return view('transaction.index', compact('title', 'data'));
    }

    public function add()
    {
        $title = 'Add Transaction';
        $sender = Sender::orderBy('name', 'asc')->get();
        $item = Item::orderBy('name', 'asc')->get();
        $recipient = Recipient::orderBy('name', 'asc')->get();

        return view('transaction.add', compact('title', 'sender', 'item', 'recipient'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sender' => 'required',
            'item' => 'required',
            'recipient' => 'required',
            'price' => 'required',
        ]);

        $data['id'] = \Uuid::generate(4);
        $data['sender'] = $request->sender;
        $data['item'] = $request->item;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['price'] =  $request->price;
        $data['recipient'] = $request->recipient;

        $price = $data['price'];
        $item = Item::find($request->item);
        $weight = $item->weight;
        $grand_total = $price * $weight;
        $data['grand_total'] = $grand_total;
        $save = Transaction::insert($data);

        if ($save) {
            alert()->success('Success', 'Transaction saved');
            return redirect('transaction');
        } else {
            alert()->error('Fail', 'Transaction cannot be save');
            return redirect('transaction');
        }

        return redirect('transaction');
    }

    public function edit($id)
    {
        $dt = Transaction::find($id);
        $title = "Edit Transaction";
        $sender = Sender::orderBy('name', 'asc')->get();
        $item = Item::orderBy('name', 'asc')->get();
        $recipient = Recipient::orderBy('name', 'asc')->get();

        return view('transaction.edit', compact('title', 'sender', 'item', 'recipient', 'dt'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sender' => 'required',
            'item' => 'required',
            'recipient' => 'required',
            'price' => 'required',
        ]);

        $data['sender'] = $request->sender;
        $data['item'] = $request->item;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['price'] =  $request->price;
        $data['recipient'] = $request->recipient;

        $price = $data['price'];
        $item = Item::find($request->item);
        $weight = $item->weight;
        $grand_total = $price * $weight;
        $data['grand_total'] = $grand_total;

        $update = Transaction::where('id', $id)->update($data);

        if ($update) {
            alert()->success('Success', 'Transaction edited');
            return redirect('transaction');
        } else {
            alert()->error('Fail', 'Transaction cannot be edit');
            return redirect('transaction');
        }
    }

    public function delete(Request $request)
    {
        $delete = Transaction::findOrFail($request->data);
        $delete->delete();
        if ($delete) {
            alert()->success('Success', 'Transaction deleted');
            return redirect('transaction');
        } else {
            alert()->error('Fail', 'Transaction cannot be delete');
            return redirect('transaction');
        }
    }

    public function export($id)
    {
        $dt =  Transaction::find($id);
        $pdf = PDF::loadView('transaction.pdf', ['dt' => $dt]);
        return $pdf->download('transaction.pdf');
    }

    public function filter(Request $request)
    {
        $from = $request->from;
        $until = $request->until;
        $title = "Transaction from $from until $until";

        $data = Transaction::where('created_at', '>=', $from)->where('created_at', '<=', $until)->orderBy('created_at', 'asc')->get();
        return view('transaction.index', compact('title', 'data'));
    }
}

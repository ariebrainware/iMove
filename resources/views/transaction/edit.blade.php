@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card-body">
                    <form method="post" action="{{url('transaction/'.$dt->id)}}">
                        @csrf
                        {{method_field('PUT')}}
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sender</label>
                                <select class="custom-select" name="sender">
                                    <option selected>--</option>
                                    @foreach($sender as $s)
                                    <option value="{{$s->id}}" {{($dt->sender == $s->id?'selected': '')}}>{{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Item</label>
                                <select class="custom-select" name="item">
                                    <option selected>--</option>
                                    @foreach($item as $i)
                                    <option value="{{$i->id}}" {{($dt->item == $i->id?'selected': '')}}>{{$i->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Recipient</label>
                                <select class="custom-select" name="recipient">
                                    <option selected>--</option>
                                    @foreach($recipient as $r)
                                    <option value="{{$r->id}}" {{($dt->recipient == $r->id?'selected': '')}}>{{$r->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price per KG</label>
                                <input type="number" name="price" class="form-control" id="exampleInputEmail1" placeholder="10000" value="{{$dt->price}}" />
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{url('transaction')}}" class="btn btn-success">Cancel</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
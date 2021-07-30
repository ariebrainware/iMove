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

                    <form method="post" action="{{url('item/add')}}">
                        @csrf
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Recipient ID</label>
                                <input type="number" name="recipient_id" class="form-control" id="exampleInputEmail1" placeholder="Recipient ID">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Item Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Item Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Weight</label>
                                <input type="number" name="weight" class="form-control" id="exampleInputEmail1" placeholder="Weight">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Height</label>
                                <input type="number" name="height" class="form-control" id="exampleInputEmail1" placeholder="Height">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Volume CM3</label>
                                <input type="number" name="volume_cm3" class="form-control" id="exampleInputEmail1" placeholder="Volume CM3">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{url('item')}}" class="btn btn-success">Cancel</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
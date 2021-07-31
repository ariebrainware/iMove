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
                    <form method="post" action="{{url('recipient/'.$dt->id)}}">
                        @csrf
                        {{method_field('PUT')}}
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name" value="{{$dt->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="Address" value="{{$dt->address}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{$dt->email}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" id="exampleInputEmail1" placeholder="Phone Number" value="{{$dt->phone_number}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Postal Code</label>
                                <input type="number" name="postal_code" class="form-control" id="exampleInputEmail1" placeholder="Postal Code" value="{{$dt->postal_code}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{url('recipient')}}" class="btn btn-success">Cancel</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
                    <form method="post" action="{{url('sender/add')}}">
                        @csrf
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="Address">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" id="exampleInputEmail1" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Postal Code</label>
                                <input type="number" name="postal_code" class="form-control" id="exampleInputEmail1" placeholder="Postal Code">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{url('sender')}}" class="btn btn-success">Cancel</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
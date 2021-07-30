@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">

          <a href="{{url('item/add')}}" class="btn btn-info">Add Item</a>
          <hr>

          <table class="table table-hover" id="myTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Recipient ID</th>
                <th>Name</th>
                <th>Weight</th>
                <th>Height</th>
                <th>Volume CM3</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $e=>$dt)
              <tr>
                <td>{{$e+1}}</td>
                <td>{{$dt->recipient_id}}</td>
                <td>{{$dt->name}}</td>
                <td>{{$dt->weight}}</td>
                <td>{{$dt->height}}</td>
                <td>{{$dt->volume_cm3}}</td>
                <td>{{date('d F Y H:i:s', strtotime($dt->created_at))}}</td>
                <td>{{date('d F Y H:i:s', strtotime($dt->updated_at))}}</td>
                <td>
                  <!-- Button trigger modal -->
                  <div>
                    <a class="btn btn-success btn-sm" href="{{ url('item/'.$dt->id) }}">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm" data-dataid="{{$dt->id}}" data-toggle="modal" data-target="#delete">
                      Delete
                    </button>
                  </div>
              </tr>

              <!-- Modal -->
              <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <form action="{{ url('item/'.$dt->id) }}" method="post">
                      @csrf
                      {{method_field('delete')}}
                      <div class="modal-body">
                        <p>Are you sure want to delete this item?</p>
                        <input type="hidden" name="data" id="data_id" value="{{$dt->id}}">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ok</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              @endforeach
            </tbody>
          </table>
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
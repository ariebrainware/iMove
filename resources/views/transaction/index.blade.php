@extends('layouts.app')
@section('title', "Transaction Page")
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">

          <a href="{{url('transaction/add')}}" class="btn btn-info">Add Transaction</a>
          <hr>

          <table class="table table-hover" id="myTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Sender</th>
                <th>Item</th>
                <th>Recipient</th>
                <th>Grand Total</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $e=>$dt)
              <tr>
                <td>{{$e+1}}</td>
                <td>{{$dt->senders->name}}</td>
                <td>{{$dt->items->name}}</td>
                <td>{{$dt->recipients->name}}</td>
                <td>Rp. {{$dt->grand_total}}</td>
                <td>{{date('d F Y H:i:s', strtotime($dt->created_at))}}</td>
                <td>{{date('d F Y H:i:s', strtotime($dt->updated_at))}}</td>
                <td>
                  <!-- Button trigger modal -->
                  <div>
                    <a class="btn btn-success btn-sm" href="{{ url('transaction/'.$dt->id) }}">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm" data-dataid="{{$dt->id}}" data-toggle="modal" data-target="#delete">
                      Delete
                    </button>
                    <a href="{{ url('transaction/print/'.$dt->id)}}" class="btn btn-info btn-sm">Print</a>
                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#filter">
                      Filter
                    </button>
                  </div>
              </tr>

              <!-- Modal Delete -->
              <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ url('transaction/'.$dt->id) }}" method="post">
                      @csrf
                      {{method_field('delete')}}
                      <div class="modal-body">
                        <p>Are you sure want to delete this transaction?</p>
                        <input type="text" name="data" id="data_id" value="" />
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ok</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <!-- Modal Filter -->
              <div class="modal fade" id="filter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <form action="{{url('transaction/filter')}}" method="get">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">From</label>
                          <input type="text" name="from" class="form-control date" id="exampleInputEmail1" value="{{date('Y-m-d')}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Until</label>
                          <input type="text" name="until" class="form-control date" id="exampleInputEmail1" value="{{date('Y-m-d')}}">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Filter</button>
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
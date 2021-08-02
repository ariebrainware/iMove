<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@v4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TXB27ECRE30/1bU7zmqxvncDAySutkz4rtkgtxeMed4M0j1f1DPvg6uqK12xXr2" crossorigin="anonymous">
</head>

<body>
  <div class="row">
    <div div class="col-md-6">
      <table class="table table-hover table-dark">
        <tbody>
          <tr>
            <th>Sender</th>
            <td>:</td>
            <td>{{$dt->senders->name}}</td>
          </tr>
          <tr>
            <th>Tanggal</th>
            <td>:</td>
            <td>{{date('d F Y H:i:s', strtotime($dt->created_at))}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="row">
    <div div class="col-md-6">
      <table class="table table-hover table-dark">
        <thead>
          <tr>
            <th>Item</th>
            <th>Weight</th>
            <th>Grand Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$dt->items->name}}</td>
            <td>{{$dt->weight}} KG</td>
            <td> Rp. {{number_format($dt->grand_total,0)}}</td>
          </tr>
        </tbody>

        <tfoot>
          <tr>
            <th colspan="2">Total</th>
            <th>Rp. {{number_format($dt->grand_total,0)}}</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Customer Orders</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  {{--Filter Table CSS --}}
  {!! Html::style('css/filtertable.css')  !!}

</head>
<body>
  <div class="container">
    <h3>List of Customer Orders</h3>

  </div>
 
    <div class="container">
        <div class="row">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">Customers Orders</h3>
                    <div class="pull-right">
                        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th><input type="text" class="form-control" placeholder="Order Number" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Order Date" disabled></th>
                            <th><input type="text" class="form-control text-right" placeholder="Action" disabled></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($customers as $customer) 
                        <tr>
                             <td>C{{ $customer->id }}-O{{$customer->order_id}}</td> 
                             <td>{{ $customer->order_date }}</td> 
                          

                            <td class="text-right">
                            {!! Form::open(['route' => ['orders.show', $customer->order_id], 'method' => 'GET'])  !!} 
                               
                            {!! Form::button('<i class="glyphicon glyphicon-search"></i>', ['type' => 'submit' ,'class' => 'btn btn-info'])!!}

                            {!! Form::close() !!}
                            </td>
                        </tr>
                      @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    





  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  {{--Filter Table Script --}}


</body>
</html>
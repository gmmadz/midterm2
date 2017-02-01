<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Orders</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    {{--Filter Table CSS --}}
    {!! Html::style('css/filtertable.css')  !!}
    {{--Parsely CSS --}}
    {!! Html::style('css/parsely.css')  !!}

  </head>
  <body>
    <div class="container form-horizontal">
        <h3>Add New Orders</h3>
        <div class="col-md-4 form-group">
            {!! Form::open([]) !!}
                {{ Form::label('order_date', 'Order Date:') }}
                {{ Form::text('order_date', \Carbon\Carbon::now(), array('class' => 'form-control', 'required' => '', 'readonly' => '')) }}
                
                {{ Form::label('customer_id', 'Customer Name:') }}
                {{ Form::select('customer_id', $fullname, null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Choose Customer')) }}

            <div class="form-group">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <h3>Order Details</h3>
                            <table class="table table-bordered table-hover" id="tab_logic">
                                <thead>
                                    <tr >
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th class="text-center">
                                            Name
                                        </th>
                                        <th class="text-center">
                                            Quantity
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="addr0">
                                        <td>
                                        1
                                        </td>
                                        <td>
                                        <input type="text" name="name[]" placeholder="Name" class="form-control"/>
                                        </td>
                                        <td>
                                        <input type="text" name="quantity[]" placeholder="Quantity" class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr id="addr1"></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a id="add_row" class="btn btn-primary pull-left">Add Order</a><a id='delete_row' class="pull-right btn btn-danger">Delete Order</a>
                </div>
                {{ Form::submit('Save Order', array('class' => 'btn btn-success', 'style' => 'margin-top: 20px')) }}
            {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    {{--Filter Table Script --}}
    {!! Html::script('js/filtertable.js') !!}
    {{--Parsely Script --}}
    {!! Html::script('js/parsely.min.js') !!}
    <script>
    $(document).ready(function() {
      var i=1;

      $("#add_row").click(function() {
          
          $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name[]' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='quantity[]' type='text' placeholder='Quantity'  class='form-control input-md'></td>");

          $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
          i++; 
      });

      $("#delete_row").click(function() {
        if(i>1) {
             $("#addr"+(i-1)).html('');
                i--;
          }
        });

    });
    </script>
  </body>
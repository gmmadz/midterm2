<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Edit Modal</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  </head>
  <body>
    {{--Simple Dynamic Table --}}
    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <h3>Order Details</h3>
                

                <table class="table table-bordered table-hover" id="dataTable">
                  <thead>
                      <tr>
                          <th>Item Name</th>
                          <th>Quantity</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td class="col-md-10">
                            {!! Form::select('item_id', $itemname, null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Select One']) !!}

                            
                        </td>
                        <td>
                            {!! Form::text('quantity[]', null, ['class' => 'form-control', 'required' => '']) !!}
                        </td> 
                      </tr>
                  </tbody>
                </table>
                <input type="button" value="Add Item" class="btn btn-primary" onClick="addRow('dataTable')" /> 
                <input type="button" value="Remove Item" class="btn btn-danger pull-right" onClick="deleteRow('dataTable')" /> 
            </div>
        </div>
        </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    {{--Dynamic Table Script --}}
    {!! Html::script('js/dynamic_table.js') !!}

  </body>
</html>
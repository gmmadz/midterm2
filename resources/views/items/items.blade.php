<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Items</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    {{--Filter Table CSS --}}
    {!! Html::style('css/filtertable.css')  !!}

  </head>
  <body>
    <div class="container">
        <h3>List of Items</h3>
        <div class="row pull-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCustomer">
              Add New Item
            </button>
            {{-- {{ Html::linkRoute('customers.create', 'Add New Customer', array(), array('class' => 'btn btn-primary')) }} --}}
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">Items</h3>
                    <div class="pull-right">
                        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th><input type="text" class="form-control" placeholder="Item Name" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Quantity" disabled></th>
                            <th><input type="text" class="form-control text-right" placeholder="Action" disabled></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($items as $item) 
                        <tr>
                             <td>{{ $item->item_name }}</td> 
                             <td>{{ $item->quantity }}</td> 

                            <td class="text-right">
                              <button class="edit-modal btn btn-success" data-id="{{ $item->id }}" data-fname="item_name" data-qty="qty" data-address="address">
                                <span class="glyphicon glyphicon-pencil"></span>
                              </button>
                            </td>

                            <td class="text-left">
                            {!! Form::open([]) !!} {{-- edit to include your route --}}
                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit' ,'class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
       {{ $items->links() }}
    </div>

    <!-- Add Customer Modal -->
    <div class="modal fade" id="addCustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add New Items</h4>
          </div>
          <div class="modal-body">
            {!! Form::open([]) !!} {{-- edit to include your route --}}
                {!! Form::label('item_name', 'Item Name:') !!}
                {!! Form::text('item_name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '15')) !!}
                
                {!! Form::label('quantity', 'Quantity:') !!}
                {!! Form::text('quantity', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '15')) !!}

               
          </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-top:20px">Close</button>
                {!! Form::submit('Add New Item', array('class' => 'btn btn-primary', 'style' => 'margin-top: 20px')) !!}
              </div>
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


    {{-- Edit Data Modal Javascript--}}
    <script type="text/javascript">
        $(document).on('click', '.edit-modal', function() {
            $('.form-horizontal').show();
            $('#fid').val($(this).data('id'));   {{-- refer to the edit button above this is data-id --}}
            $('#name').val($(this).data('first_name')); {{-- refer to the edit button above this is data-name --}}
            $('#address').val($(this).data('address')); {{-- refer to the edit button above this is data-address --}}
            $('#myModal').modal('show');                {{-- when the edit button is clicked this values are passed into the modal. Name (id) of the modal is myModal --}}
        });
    </script>
  </body>
</html>
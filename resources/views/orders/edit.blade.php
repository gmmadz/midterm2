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
    <div class="container">
        <div class="row">
            <h3>Edit Modal</h3>
            <table class="table table-hover">
                <thead>
                    <tr class="filters">
                        <th>Id</th>
                        <th>Customer Name</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>Davao</td>
                        <td class="text-right">
                            <button class="edit-modal btn btn-success" data-id="1" data-name="John Doe" data-address="Davao">
                              <span class="glyphicon glyphicon-pencil"></span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>        
        </div>
    </div>

    {{-- Edit Modal --}}
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="panel panel-primary">
              <div class="panel-heading">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="panel-title" id="myModalLabel"><b>Edit Customer</b></h4>
              </div>
            <div class="modal-body">
                {!! Form::open() !!} {{-- This should be Form::Model --}}
                    {!! Form::hidden('id', null, ['id' => 'fid', 'class' => 'form-control', 'required' => '']) !!} {{-- the "id" here match the "#fid" in the javascript --}}

                    {!! Form::label('name', 'Customer Name:') !!}
                    {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'required' => '', 'maxlength' => '35']) !!} {{-- the "id" here match the "#name" in the javascript --}}

                    {!! Form::label('address', 'Address:') !!}
                    {!! Form::text('address', null, ['id' => 'address', 'class' => 'form-control', 'required' => '', 'maxlength' => '35']) !!}

                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal" style="margin-top:20px">Cancel</button>
                      {!! Form::submit('Update', ['class' => 'btn btn-success', 'style' => 'margin-top: 20px']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
          </div>
        </div>
    </div>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    {{-- Edit Data Modal Javascript--}}
    <script type="text/javascript">
        $(document).on('click', '.edit-modal', function() {
            $('.form-horizontal').show();
            $('#fid').val($(this).data('id'));   {{-- refer to the edit button above this is data-id --}}
            $('#name').val($(this).data('name')); {{-- refer to the edit button above this is data-name --}}
            $('#address').val($(this).data('address')); {{-- refer to the edit button above this is data-address --}}
            $('#myModal').modal('show');                {{-- when the edit button is clicked this values are passed into the modal. Name (id) of the modal is myModal --}}
        });
    </script>

  </body>
</html>
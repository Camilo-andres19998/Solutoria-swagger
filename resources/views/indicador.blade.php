<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body>

<div class="container">

    <a class="btn btn-success" href="javascript:void(0)" id="createNewBook">  Nuevo indicador</a>
    <table class="table table-bordered  table table-info table table-hover data-table">
        <thead>
            <tr>

                <th>NOMBRE INDICADOR</th>
                <th>CODIGO </th>
                <th>UNIDAD MEDIDA</th>
                <th>VALOR  </th>
                <th>FECHA </th>
                <th width="300px">Action</th>

            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>

            <div class="modal-body">
                <form id="bookForm" name="bookForm" class="form-horizontal">
                   <input type="hidden" name="indicador_id" id="indicador_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nombre </label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nombreIndicador" name="nombreIndicador" placeholder="Nombre indicador" value="" maxlength="50" required="">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Codigo </label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="codigoIndicador" name="codigoIndicador" placeholder="Codigo indicador" value="" maxlength="50" required="">
                        </div>
                    </div>


                            <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Unidad medida </label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="unidadMedidaIndicador" name="unidadMedidaIndicador" placeholder="Unidad indicador" value="" maxlength="50" required="">
                        </div>
                    </div>


                          <div class="form-group">
                        <label class="col-sm-2 control-label">Valor </label>
                        <div class="col-sm-12">
                            <input id="valorIndicador" name="valorIndicador" required="" placeholder="Valor indicador" class="form-control" value="" maxlength="50" required="" >
                        </div>
                    </div>


                          <div class="form-group">
                        <label class="col-sm-2 control-label">Fecha </label>
                        <div class="col-sm-12">
                          <input type="date" value="2022-12-01" name="fechaIndicador" id="fechaIndicador"/>
                        </div>
                    </div>


                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Registrar
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>



<script type="text/javascript">




  $(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });



    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('indicadores.index') }}",
        columns: [
           // {data: 'id', name: 'indicador_id'},
            {data: 'nombreIndicador', name: 'nombreIndicador'},
            {data: 'codigoIndicador', name: 'codigoIndicador'},
            {data: 'unidadMedidaIndicador', name: 'unidadMedidaIndicador'},
            {data: 'valorIndicador', name: 'valorIndicador'},
            {data: 'fechaIndicador', name: 'fechaIndicador'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });



     $('#createNewBook').click(function () {
        $('#saveBtn').val("create-book");
        $('#indicador_id').val('');
        $('#bookForm').trigger("reset");
        $('#modelHeading').html("Nuevo Indicador");
        $('#ajaxModel').modal('show');

    });
    $('body').on('click', '.editIndicador', function () {
      var indicador_id = $(this).data('id');
      $.get("{{ route('indicadores.index') }}" +'/' + indicador_id +'/edit', function (data) {

          $('#modelHeading').html("Editar Indicador");
          $('#saveBtn').val("edit-book");
          $('#ajaxModel').modal('show');
          $('#indicador_id').val(data.id);
          $('#nombreIndicador').val(data.nombreIndicador);
          $('#codigoIndicador').val(data.codigoIndicador);
          $('#unidadMedidaIndicador').val(data.unidadMedidaIndicador);
          $('#valorIndicador').val(data.valorIndicador);
          $('#fechaIndicador').val(data.fechaIndicador);
      })
   });


    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');

        $.ajax({
          data: $('#bookForm').serialize(),
          url: "{{ route('indicadores.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {

              $('#bookForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();

          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });



 $('body').on('click', '.deleteIndicador', function () {

        var indicador_id = $(this).data("id");
       swal({  icon: "success",
        title: "Eliminado correctamente",
        });

        $.ajax({
            type: "DELETE",
            url: "{{ route('indicadores.store') }}"+'/'+indicador_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:',data);
            }
        });
    });

  });

</script>
</body>
</html>

<!DOCTYPE html>
 
<html lang="en">
<head>
<title>Install DataTables in Laravel - Tutsmake.com</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</head>
      <body>
         <div class="container">
               <h2>Laravel DataTable - Tuts Make</h2>
            <table class="table table-bordered" id="laravel_datatable">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Created at</th>
                      <th>Ganesh</th>
                  </tr>
               </thead>
            </table>
         </div>
  <script>
    $(document).ready( function () {
    $('#laravel_datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('users') }}",
           columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' , render: function (data, type, column, meta) {
                               return '<p style="color: red;">'+column.name+'<p>' ;
                             }
                    },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' },
                     { data: 'created_at', name: 'created_at' , render: function (data, type, column, meta) {
                               return '<a href="Ganesh"> Ganesh</a>' ;
                             }}
                   
                 ]
        });
     });
  </script>
   </body>
</html>
<?php

    include_once 'dbconfig.php';

    ?>

 <!DOCTYPE html>

 <html lang="en">

 <head>

     <title>Aplikasi CRUD Sederhana Dengan PHP OOP PDO</title>

     <meta charset="utf-8">

     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!--Bootstrap-->

     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

 </head>

 <body>

     <div class="container">

         <div class="panel panel-primary">

             <div class="panel-heading">Data Barang</div>

             <div class="panel-body">

                 <a href="add.php" class="btn btn-large btn-default">

                     <i class="glyphicon glyphicon-plus"></i>

                     &nbsp; Tambah Data</a>

                 <br /><br />

                 <table class='table table-bordered table-responsive'>

                     <tr>

                         <th>ID Barang</th>

                         <th>Nama Barang</th>

                         <th>Stok</th>

                         <th>Harga</th>

                         <th colspan="2" align="center">Actions</th>

                     </tr>

                     <?php

                        $query = "SELECT * FROM barang";

                        $records_per_page = 5;

                        $newquery = $brg->paging($query, $records_per_page);

                        $brg->viewData($newquery);

                        ?>

                     <tr>

                         <td colspan="7" align="center">

                             <div class="pagination-wrap">

                                 <?php $brg->paginglink($query, $records_per_page); ?>

                             </div>

                         </td>

                     </tr>

                 </table>

             </div>
             <!--End: Panel-body-->

         </div>
         <!--End: Panel-->

     </div>

     <div class="container">

         <div class="alert alert-success">

             <p><strong>Selamat Belajar :) </strong></p>

             <p>If you have question, feel free to ask me <a href="http://facebook.com/gungunpriatna002">here</a>!</p>

         </div>

     </div>

     <!--Bootstrap-->

     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

 </body>

 </html>
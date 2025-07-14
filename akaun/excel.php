<?php include "../connection.php";

$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM `penghantaran` ORDER BY `penghantaran`.`tarikh` DESC";
 $result = mysqli_query($con, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Plat No.</th>
                            <th>Brand</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Location</th>
                            <th>Date</th>
                            <th>Fuel Serial No.</th>
                            <th>Petrol Type</th>
                            <th>Price (RM)</th>
                        </tr>
                            </thead>
                            <tbody>
  ';
  while($row = mysqli_fetch_array($result))
  {
      $output .= 
            '<tr>
                <td>'.$row['username'].'</td>
                <td>'.$row['no_plat'].'</td>                            
                <td>'.$row['jenama_1'].'</td>                            
                <td>'.$row['jenis_1'].'</td>
                <td>'.$row['kuantiti_1'].'</td>
                <td>'.$row['lokasi_1'].'</td>
                <td>'.$row['tarikh'].'</td>
                <td>'.$row['no_siri'].'</td>
                <td>'.$row['petrol'].'</td>
                <td>RM '.$row['harga'].'</td>
            </tr>
            <tr>
                <td> - </td>
                <td> - </td>
                <td>'.$row['jenama_2'].'</td>                            
                <td>'.$row['jenis_2'].'</td>
                <td>'.$row['kuantiti_2'].'</td>
                <td>'.$row['lokasi_2'].'</td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
            </tr>
            <tr>
                <td> - </td>
                <td> - </td>
                <td>'.$row['jenama_3'].'</td>                            
                <td>'.$row['jenis_3'].'</td>
                <td>'.$row['kuantiti_3'].'</td>
                <td>'.$row['lokasi_3'].'</td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
            </tr>
            <tr>
                <td> - </td>
                <td> - </td>                         
                <td>'.$row['jenama_4'].'</td>                            
                <td>'.$row['jenis_4'].'</td>
                <td>'.$row['kuantiti_4'].'</td>
                <td>'.$row['lokasi_4'].'</td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
            </tr>
            <tr>
                <td> - </td>
                <td> - </td>                          
                <td>'.$row['jenama_5'].'</td>                            
                <td>'.$row['jenis_5'].'</td>
                <td>'.$row['kuantiti_5'].'</td>
                <td>'.$row['lokasi_5'].'</td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
            </tr>
   ';
  }
  $output .= '</tbody>
                </table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>

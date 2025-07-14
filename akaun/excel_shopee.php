<?php include "../connection.php";

$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM `online` WHERE platform='Shopee' ORDER BY `online`.`tarikh` DESC";
 $result = mysqli_query($con, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Username</th>
                            <th>Plat No.</th>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Brand</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Platform</th>
                        </tr>
                            </thead>
                            <tbody>
  ';
  while($row = mysqli_fetch_array($result))
  {
      $output .= 
            '<tr>
                <td>'.$row['tarikh'].'</td>
                <td>'.$row['username'].'</td>                            
                <td>'.$row['no_plat'].'</td>                            
                <td>'.$row['nama_pelanggan'].'</td>
                <td>'.$row['alamat'].'</td>
                <td>'.$row['jenama'].'</td>
                <td>'.$row['jenis'].'</td>
                <td>'.$row['kuantiti'].'</td>
                <td>'.$row['platform'].'</td>
            </tr>
            
   ';
  }
  $output .= '</tbody>
                </table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=shopee.xls');
  echo $output;
 }
}
?>

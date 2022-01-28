<?php>
include "koneksi.php";
$query = 'select*from invoice';
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));

$no = 1;
while ($row = mysqli_fetch_assoc($result)):
?>

<tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $row['product']; ?></td>
    <td><?php echo $row['unit']; ?></td>

    <td>QTY</td>
    <td>sub</td>
    <td>tax%</td>
    <td>tax</td>
    <td>total</td>
    <td>curr</td>
</tr>

<?php
$no++;
endwhile;
?>
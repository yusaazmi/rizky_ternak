<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p><font face="Vivaldi" color="green" size=6 >Das Company</font></p>
    <h1>INVOICE I/00004</h1>
    <h2>2015-04-01</h2>

    <?php
    include "koneksi.php";
    ?>
    <table>
        <tr>
            <td rowspan="6" valign="top">From : </td>
            <td rowspan="6" width="50"></td>
            <td>Das Company</td>
            <td width="700" rowspan="6"></td>
            <td rowspan="6" valign="top">To : </td>
            <td rowspan="6" width="50"></td>
            <td>Sommer Bill</td>
        </tr>
        <tr>
            <td>ZUG Busisness Center</td> 
            <td>362-20th Ave</td>   
        </tr>
        <tr>
            <td>Higway 1</td>
            <td></td>
        </tr>
        <tr>
            <td>BE-9000 Ghent</td>
            <td rowspan="3" valign="top">BE-9000 Ghent</td>
        </tr>
        <tr>
            <td>FC: 201/113/40209</td>
        </tr>
        <tr>
            <td>VA: BE123456789</td>
        </tr>
    </table>
    <p></p>
        <table align="center">
            <tr>
                <th>#</th>
                <th width="200">product</th>
                <th width="100">unit</th>
                <th width="70">qty.</th>
                <th width="100">sub.</th>
                <th width="100">tax%</th>
                <th width="100">tax</th>
                <th width="100">total</th>
                <th width="100">curr.</th>
            </tr>
<?php
$query = 'SELECT*FROM INVOICE';
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));

$no = 1;
while ($row = mysqli_fetch_assoc($result)):
?>

<tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $row['product']; ?></td>
    <td><?php echo $row['unit']; ?></td>
    <td><?php echo $row['qty.']; ?></td>
    <td><?php echo $row['sub']; ?></td>
    <td><?php echo $row['tax%']; ?></td>
    <td><?php echo $row['tax']; ?></td>
    <td><?php echo $row['total']; ?></td>
    <td><?php echo $row['curr.']; ?></td>
   

</tr>

<?php
$no++;
endwhile;
?>

            
        </table>
</body>
</html>
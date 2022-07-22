<?php
include 'db.php';
$query="select * from checkin"; // Fetch all the data from the table customers
$result=mysqli_query($dbCon,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rumah sakit finder</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
  <img class="mr-3" src="logorumahsakit1.png"  width="50" height="50">

  <a class="navbar-brand">Rumah Sakit Finder</a>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
<div class="media">
  <div class="media-body">
    <h5 class="mt-0">Rumah sakit finder</h5>
This is an application build by the student of Sir hafiz to give location 
of hospital in Malaysia and this page  is about check-in input by the app user 
which give the user name, coordinates, address, ip address,  date, and 
user agent </div>
</div>
<br>
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2>All checkin </h2> <br>
            </div>

            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Coordinates</th>
                  <th scope="col">Address</th>
                  <th scope="col">Ip address</th>
                  <th scope="col">Date</th>
                  <th scope="col">User Agent</th>
                </tr>
              </thead>
              <tbody>
                <?php include 'retrieve-data.php'; ?>

                <?php if ($result->num_rows > 0): ?>

                <?php while($array=mysqli_fetch_row($result)): ?>

                <tr>
                    <th scope="row"><?php echo $array[0];?></th>
                    <td><?php echo $array[1];?></td>
                    <td><?php echo $array[2];?></td>
                    <td><?php echo $array[3];?></td>
                    <td><?php echo $array[4];?></td>
                    <td><?php echo $array[5];?></td>
                    <td><?php echo $array[6];?></td>
                </tr>

                <?php endwhile; ?>

                <?php else: ?>
                <tr>
                   <td colspan="3" rowspan="1" headers="">No Data Found</td>
                </tr>
                <?php endif; ?>

                <?php mysqli_free_result($result); ?>

              </tbody>
            </table>
        </div>
    </div>        
</div>

</body>
</html>
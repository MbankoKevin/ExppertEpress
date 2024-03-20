<?php include 'header.php'; ?>
  <div id="banner-area" class="banner-area" style="background-image:url(images/banner/banner1.jpg)">
    <div class="banner-text">
        <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <div class="banner-heading">
                  <h1 class="border-title border-left">Track Package</h1>
                  <ol class="breadcrumb">
                    <li>Home</li>
                    <li>Track</li>
                    <li><a href="track.php">Track Package</a></li>
                  </ol>
                </div>
              </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
      </div><!-- Banner text end -->
  </div><!-- Banner area end --> 
<br><br>
      <div class="row">
<div class="col-md-2">
</div>
        <div class="col-md-8">
            <h3 class="border-title border-left">Fill The Form To Track Your Order</h3>
            <form  method="post" role="form">
              <div class="error-container"></div>
            <div class="row">
              <div class="col-md-3">

              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tracking #</label>
                  <input class="form-control" name="term" 
                  placeholder="e.g CL-12789456" type="text" required>
                </div>
              </div>
              <div class="col-md-3">
    
              </div>
            </div>
            <div class="text-center"><br>
              <button class="btn btn-primary solid blank" name="save" type="submit">Track Shipment</button> 
            </div>
          </form>
          </div>
          <div class="col-md-2">
</div>
      
      </div><!-- Content row -->
      <div class="container">
    <div class="row">

        <?php
        include 'backend/conn.php';
// Check connection
        if (!$link) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if(isset($_POST['save'])){
           $name = $_POST['term'];
           if (empty($name)) {
            echo "<div class='alert alert-danger'>
            <strong>Failed!</strong> Tracking Id Cannot Be Empty.
            </div>";
        }else{

            $sql = "SELECT * FROM track where ship_id LIKE '%$name%'";
            $result = mysqli_query($link, $sql);

            if (mysqli_num_rows($result) > 0) {
    // output data of each row
                while($row = mysqli_fetch_assoc($result)) {?> 
                    <h3 align="center">Tracking information for tracking number <?php echo $row["ship_id"] ?></h3>
                    <div class="col-md-6">
                        <h3 align="center">RECEIVERS DETAILS</h3><br>
                        <div class="table-responsive">
                            <table class="table table-clean-paddings margin-bottom-0" style="background-color: #7c7c7c">

                                <tbody>
                                    <tr>
                                        <td>
                                           <div class="contact-container"><a href="#" style="color: #000;"><b>RECEIVERS <br> NAME:</b></a> </div>
                                       </td> 
                                       <td style="color: #fff; text-transform: uppercase;"><?php echo $row["jname"] ?></td>

                                   </tr>
                                   <tr>

                                    <tr>
                                        <td>
                                           <div class="contact-container"><a href="#" style="color: #000;"><b>RECEIVERS <br> ADDRESS:</b></a> </div>
                                       </td>
                                       <td style="color: #fff; text-transform: uppercase;"><?php echo $row["jadd"] ?></td>

                                   </tr>
                                   <tr>
                                    <td>
                                       <div class="contact-container"><a href="#" style="color: #000;"><b>RECEIVERS <br> COUNTRY:</b></a> </div>
                                   </td>
                                   <td style="color: #fff; text-transform: uppercase;"><?php echo $row["jcountry"] ?></td>

                               </tr>
                               <tr>
                                <td>
                                   <div class="contact-container"><a href="#" style="color:#000;"><b>RECEIVERS <br> Number:</b></a> </div>
                               </td>
                               <td style="color: #fff; text-transform: uppercase;"><?php echo $row["jnumber"] ?></td>

                           </tr>
                           <tr>
                            <td>
                               <div class="contact-container"><a href="#" style="color:#000;"><b>RECEIVERS <br> Email:</b></a> </div>
                           </td>
                           <td style="color: #fff; text-transform: uppercase;"><?php echo $row["jemail"] ?></td>

                       </tr>

                   </tbody>
               </table>
           </div><br>
       </div>

       <div class="col-md-6">
        <h3 align="center">SENDER's DETAILS</h3><br>
        <div class="table-responsive">
            <table class="table table-clean-paddings margin-bottom-0" style="background-color: #7c7c7c">

                <tbody>
                    <tr>
                        <td>
                           <div class="contact-container"><a href="#" style="color: #000;"><b>SENDER'S <br> NAME:</b></a> </div>
                       </td> 
                       <td style="color: #fff; text-transform: uppercase;"><?php echo $row["sname"] ?></td>

                   </tr>
                   <tr>

                    <tr>
                        <td>
                           <div class="contact-container"><a href="#" style="color: #000;"><b>SENDER'S <br> ADDRESS:</b></a> </div>
                       </td>
                       <td style="color: #fff; text-transform: uppercase;"><?php echo $row["sadd"] ?></td>

                   </tr>
                   <tr>
                    <td>
                       <div class="contact-container"><a href="#" style="color: #000;"><b>SENDER'S <br> COUNTRY:</b></a> </div>
                   </td>
                   <td style="color: #fff; text-transform: uppercase;"><?php echo $row["scountry"] ?></td>

               </tr>
               <tr>
                <td>
                   <div class="contact-container"><a href="#" style="color: #000;"><b>SENDER'S <br> Number:</b></a> </div>
               </td>
               <td style="color: #fff; text-transform: uppercase;"><?php echo $row["snumber"] ?></td>

           </tr>
           <tr>
            <td>
               <div class="contact-container"><a href="#" style="color: #000;"><b>SENDER'S <br> Email:</b></a> </div>
           </td>
           <td style="color: #fff; text-transform: uppercase;"><?php echo $row["semail"] ?></td>

       </tr>

   </tbody>
</table>
</div><br>
</div>

<div class="col-md-6">
  <h3 align="center">SHIPMENT DETAILS</h3><br>
  <div class="table-responsive">
    <table class="table table-clean-paddings margin-bottom-0" style="background-color: #7c7c7c">

        <tbody>
            <tr>
                <td>
                   <div class="contact-container"><a href="#" style="color: #000;"><b>TRANSPORTATION <br> MODE:</b></a> </div>
               </td> 
               <td style="color: #fff; text-transform: uppercase;"><?php echo $row["mode"] ?></td>

           </tr>
           <tr>

            <tr>
                <td>
                   <div class="contact-container"><a href="#" style="color: #000;"><b>PRODUCT <br> NAME:</b></a> </div>
               </td>
               <td style="color: #fff; text-transform: uppercase;"><?php echo $row["prod"] ?></td>

           </tr>
           <tr>
            <td>
               <div class="contact-container"><a href="#" style="color: #000;"><b>TRACKING<br> NUMBER:</b></a> </div>
           </td>
           <td style="color: #fff; text-transform: uppercase;"><?php echo $row["ship_id"] ?></td>

       </tr>
       <tr>
        <td>
           <div class="contact-container"><a href="#" style="color: #000;"><b>DELIVERY <br> STATUS:</b></a> </div>
       </td>
       <td style="color: #fff; text-transform: uppercase;"><?php echo $row["deliverys"] ?></td>

   </tr>
   <tr>
    <td>
       <div class="contact-container"><a href="#" style="color: #000;"><b>SHIPMENT <br> DESCRIPTION:</b></a> </div>
   </td>
   <td style="color: #fff; text-transform: uppercase;"><?php echo $row["descrip"] ?></td>

</tr>

<tr>
    <td>
       <div class="contact-container"><a href="#" style="color: #000;"><b>DEPARTURE TIME:</b></a> </div>
   </td>
   <td style="color: #fff; text-transform: uppercase;"><?php echo $row["Ship_time"] ?></td>

</tr>

<tr>
    <td>
       <div class="contact-container"><a href="#" style="color: #000;"><b>DELIVERY TIME:</b></a> </div>
   </td>
   <td style="color: #fff; text-transform: uppercase;"><?php echo $row["dtime"] ?></td>

</tr>
</tbody>
</table>
</div><br>
</div>
<div class="col-md-6">
    <h3 align="center">PACKAGE DETAILS</h3><br>
    <div class="table-responsive">
        <table class="table table-clean-paddings margin-bottom-0" style="background-color: #7c7c7c">

            <tbody>
                <tr>
                    <td>
                       <div class="contact-container"><a href="#" style="color: #000;"><b>PACKAGE CURRENT  <br> LOCATION:</b></a> </div>
                   </td> 
                   <td style="color: #fff; text-transform: uppercase;"><?php echo $row["currentl"] ?></td>

               </tr>
               <tr>

                <tr>
                    <td>
                       <div class="contact-container"><a href="#" style="color: #000;"><b>PACKAGE PICKUP <br> LOCATION:</b></a> </div>
                   </td>
                   <td style="color: #fff; text-transform: uppercase;"><?php echo $row["pickupl"] ?></td>

               </tr>
               <tr>
                <td>
                   <div class="contact-container"><a href="#" style="color: #000;"><b>DEPARTURE<br> DATE:</b></a> </div>
               </td>
               <td style="color: #fff; text-transform: uppercase;"><?php echo $row["Ship_date"] ?></td>

           </tr>
           <tr>
            <td>
               <div class="contact-container"><a href="#" style="color: #000;"><b>DELIVERY <br> DATE:</b></a> </div>
           </td>
           <td style="color: #fff; text-transform: uppercase;"><?php echo $row["ddate"] ?></td>

       </tr>
       <tr>
        <td>
           <div class="contact-container"><a href="#" style="color: #000;"><b>QUANTITY <br> SHIPPED:</b></a> </div>
       </td>
       <td style="color: #fff; text-transform: uppercase;"><?php echo $row["items"] ?></td>

   </tr>
   <tr>
    <td>
       <div class="contact-container"><a href="#" style="color: #000;"><b>PACKAGE <br> WEIGHT:</b></a> </div>
   </td>
   <td style="color: #fff; text-transform: uppercase;"><?php echo $row["weight"] ?></td>

</tr>

<tr>
    <td>
       <div class="contact-container"><a href="#" style="color: #000;"><b>SHIPMENT <br> CATRGORY:</b></a> </div>
   </td>
   <td style="color: #fff; text-transform: uppercase;"><?php echo $row["cat"] ?></td>

</tr>
<tr>
    <td>
       <div class="contact-container"><a href="#" style="color: #000;"><b>SHIPMENT <br> STATUS:</b></a> </div>
   </td>
   <td class="blink_me" style="color: red; text-transform: uppercase; font-weight: bolder;"><?php echo $row["status"] ?></td>

</tr>
</tbody>
</table>
</div><br>
</div>
<br><br>
<h1 align="center"><a href="map.php?id=<?php echo $row["track_id"]; ?>">View Map Here</a></h1>
<!-- <h1 align="center"><a href="#">View Map Here</a></h1> -->






<?php       
}
} else {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong> No Search Done Yet Or Tracking Id Doesnt Exist.
    </div>";
}
}
}

?>


</div> 
</div> 
<br><br><br>
<?php include 'footer.php'; ?>
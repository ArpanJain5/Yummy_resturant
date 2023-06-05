<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>

    .card{
      border: 0.9px solid;
    }
    .card:hover {
      transform: scale(1.02);
      box-shadow: 0px 0 30px rgba(55, 55, 63, 0.15);
    }
    
    </style>
    
    <!-- Popup  -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="d-flex justify-content-center mt-4">
        <p data-attribute="data">
           <?php
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $date = date('Y-m-d H:i:s', strtotime($_POST['date']));
            $time = $_POST['time'];
            $people = $_POST['people'];
            $message = $_POST['message'];

            // Database Connection
            $conn =new mysqli("localhost","root" ,"","test");
            if($conn->connect_error){
                die('Connection Failed :'.$conn->connect_error);
            }else{
                $stmt =$conn->prepare('Insert Into book(name, email, phone, date, time, people, message)
                values(?, ?, ?, ?, ?, ?, ?)');
                $stmt->bind_param("ssissis",$name,$email,$phone,$date,$time,$people,$message);
                $stmt->execute();
                $stmt->close();
                $conn->close();
            }
        ?>
    
<!-- Card View  -->
<div class="card" style="width: 30rem;">
  <img src="https://img.freepik.com/free-photo/chicken-wings-barbecue-sweetly-sour-sauce-picnic-summer-menu-tasty-food-top-view-flat-lay_2829-6471.jpg?w=2000" class="card-img-top" alt="...">
  <div class="card-body">
    <!-- Displaying Data -->
    <h2 class="card-title">CHECK YOUR DETAILS : </h2>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"> Name is <?php echo  "<b>".$_POST['name']."</b>" ?> </li>
    <li class="list-group-item"> Email is <?php echo "<b>" .$_POST['email']."</b>" ?> </li>
    <li class="list-group-item"> Phone Number is <?php echo  "<b>" .$_POST['phone']."</b>" ?> </li>
    <li class="list-group-item"> Date of Booking is <?php echo  "<b>" .$_POST['date']."</b>" ?> </li>
    <li class="list-group-item"> Time of Booking is <?php echo  "<b>" .$_POST['time']."</b>" ?> </li>
    <li class="list-group-item"> No of People - <?php echo  "<b>" .$_POST['people']."</b>" ?> </li>
    <li class="list-group-item"> Message is <?php echo  "<b>" .$_POST['message']."</b>" ?> </li>
  </ul>
  <div class="card-body">
  <button type="button" class="btn btn-success float-start ms-5" onclick="openPopup();">Submit</button>
        <a href="home.html">
            <input type="submit" class="btn btn-danger btn-book-a-table float-end me-5" value="Home">  
        </a>     
  </div>
</div>
</div>
</body>
<script>
function openPopup(){
    Swal.fire({
        title: 'Are you sure?',
        text: "You Want to Submit your details ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'green',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirm!'
      }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                imageUrl: 'https://media.istockphoto.com/photos/chinese-food-blank-background-picture-id545286388?b=1&k=20&m=545286388&s=170667a&w=0&h=NBSXjfSVP0GdwAOBYELxOFwoYZAXYya1HTGUJYBkh8I=',
                imageWidth: 400,
                imageHeight: 200,
                title: 'Your Table Has Been Booked ',
                text: 'Success',
                footer: '<a href="http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=test&table=book">Check Here</a>'
            })
        }
      })
}
</script>
</html>
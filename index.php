<?php include 'config.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EatingDisorder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<!-- <img src="images/bg.png" alt="" class="bgimg"> -->
    <center>
        <div class="center-me">
            <div class="logo">
                <img src="images/eat_img.jpg" id="logo" width="20%" height="30%">
                <h3>Eating Disorder Database</h3>
            </div>
            <br><br>
            <form class="form-inline" method="post">
                    <input class="form-control mr-sm-2" type="search" placeholder="Enter Gene Name/Gene id" aria-label="Search"
                        id="myinput" name="search">
                    <!-- <input type="button" id="btnsearch" value="Search" /> -->
                    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" id="btnsearch" name="submit">Search</button>
            </form>

        </div>
    </center>
    <br><br>
    <br><br>
    <table class="data-table">
        <thead>
            <th>S:No</th>
            <th>Gene ID</th>
            <th>Disease ID</th>
            <th>Disease Name</th>
            <th>Gene Name</th>
            <th>NCBI link</th>
        </thead>
        <tbody>
        <?php 
            if(isset($_POST['submit'])){
                $searchval=$_POST['search'];
                if($searchval=="")
                {
                    $sql="SELECT * FROM `bio_dataset_2` WHERE 1=0";
                }
                else{
                    $sql = "SELECT * FROM `bio_dataset_2` WHERE Gid='$searchval' OR Gname='$searchval'";
                }
            $result= mysqli_query($conn,$sql);
            if($result->num_rows>0){
            $i=1;
            while($rows=$result->fetch_assoc()){
            echo "
                <tr>
                <td>".$i++."</td>
                <td>".$rows['Gid']."</td>
                <td>".$rows['Did']."</td>
                <td>".$rows['Dname']."</td>
                <td>".$rows['Gname']."</td>
                <td><a href=".$rows['Ncbi']." target='_blank'>".$rows['Ncbi']."</a></td>
                </tr>
            ";
            }
        }
    }
    ?>
    </tbody>
    </table>
</body>
</html>
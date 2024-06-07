<?php require_once("header.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="">
    <style>
        .upper-image{
    width: 100%;
    height: 300px;
    background-image: url("house1.png");
    background-repeat: no-repeat;
    background-size: cover;
    padding: 100px 140px;
    font-size: 25px;
}
.bannerarea{
    position: relative;
    background: url("house1.jpg") no-repeat center;
    background-size: cover;
    height: 600px;
    overflow: hidden;
}
.image {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: rgb(0, 0, 0);
}
.image h1{
    font-size: 60px;
    margin-bottom: 30px;
}
.image a{
    padding: 20px 40px;
    background: #52B788;
    border-radius: 10px;
    text-decoration: none;
    color: #000000;
}

.cardContainer{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: row;
    flex-wrap: wrap;
    margin-top: 20px;
}
.card{
    width: 320px;
    margin: 20px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}

.card img{
    width: 100%;
    height: 200px;
}

.cardContent{
    padding: 16px;
}

.cardContent h2,p{
    margin-bottom: 10px;
}
.cardContent h3{
    color: green;
}
span{
    font-weight: bold;
}

.h1tag{
    margin-top: 30px;
    font-size: 20px;
}
.ourwork{
    margin-top: 20px;
    font-size: 20px;
}
.workcontainer{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}

.work{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    margin: 30px;
    font-size: 30px;
}
.whychooseus{
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 30px;
}
.service p{
    margin-bottom: 18px;
}
.service{
    font-size: 20px;
}
    </style>
</head>
<body>

    <div class="bannerarea">
        <div class="image">
            <h1><span>Welcome to Horizon Lands</span></h1>
            <a href="">See More</a>
        </div>
    </div>

    <center class="h1tag">
        <h1>Featured Lands</h1>
    </center>

    <div class="cardContainer">
        <div class="card">
            <img src="land1.jpg" alt="">
            <div class="cardContent">
                <h2>Land in Moratuwa</h2>
                <p>District - Colombo</p>
                <p>Perches - <span>24</span></p>
                <h3>Rs.25,000,000</h3>
            </div>
        </div>

        <div class="card">
            <img src="history.png" alt="">
            <div class="cardContent">
                <h2>Land in Malabe</h2>
                <p>District - Colombo</p>
                <p>Perches - <span>24</span></p>
                <h3>Rs.45,000,000</h3>
            </div>
        </div>

        <div class="card">
            <img src="land3.jpg" alt="">
            <div class="cardContent">
                <h2>Land in Nuwaraeliya</h2>
                <p>District - Nuwaraeliya</p>
                <p>Perches - <span>30</span></p>
                <h3>Rs.9,000,000</h3>
            </div>
        </div>
    </div>

    <center class="ourwork">
        <h1>Our Work</h1>
    </center>

    <div class="workcontainer">
        <div class="work">
            <p>Lands Sold</p>
            <h2>75+</h2>
        </div>

        <div class="work">
            <p>Districts Covered</p>
            <h2>15+</h2>
        </div>

        <div class="work">
            <p>Undergoing Projects</p>
            <h2>2+</h2>
        </div>
    </div>

    <center class="ourwork">
        <h1>Why Choose Us</h1>
    </center>

    <div class="whychooseus">
        <div class="service">
            <p>Trusted sellers</p>
            <p>Lowest rates</p>
            <p>24/7 Customer service</p>
            <p>Direct connection with sellers</p>
        </div>
    </div>

</body>
</html>
<?php require_once("footer.php");?>
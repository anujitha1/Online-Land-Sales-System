<?php require_once("header.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .upper-image{
    width: 100%;
    height: 300px;
    background-image: url("house1.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    padding: 100px 140px;
    font-size: 25px;
    }
        .horizonlands{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px 200px;
        }
        .horizonlands .horizonlandsitem{
            margin: 30px;
        }
        .horizonlands .horizonlandsitem h1{
            margin-bottom: 20px;
        }
        .ourvision{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 30px 200px;
        }
        .ourvision h1{
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="upper-image">
        <h1>About Us</h1>
    </div>

    <div class="horizonlands">
        <div class="horizonlandsitem">
            <img src="horizonlands.png" alt="" width="200px">
        </div>
        <div class="horizonlandsitem">
            <h1>Horizon Lands</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci quas, esse illo, deserunt dignissimos ipsum deleniti hic laborum, dolorem distinctio ut ad animi ratione maiores eius? Corrupti ipsa repudiandae nisi.Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci quas, esse illo, deserunt dignissimos ipsum deleniti hic laborum, dolorem distinctio ut ad animi ratione maiores eius? Corrupti ipsa repudiandae nisi.</p>
        </div>
    </div>

    <div class="ourvision">
        <h1>Our Vision</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci quas, esse illo, deserunt dignissimos ipsum deleniti hic laborum, dolorem distinctio ut ad animi ratione maiores eius? Corrupti ipsa repudiandae nisi.Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci quas, esse illo, deserunt dignissimos ipsum deleniti hic laborum, dolorem distinctio ut ad animi ratione maiores eius? Corrupti ipsa repudiandae nisi.</p>
    </div>


    <div class="horizonlands">
        <div class="horizonlandsitem">
            <h1>History</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci quas, esse illo, deserunt dignissimos ipsum deleniti hic laborum, dolorem distinctio ut ad animi ratione maiores eius? Corrupti ipsa repudiandae nisi.Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci quas, esse illo, deserunt dignissimos ipsum deleniti hic laborum, dolorem distinctio ut ad animi ratione maiores eius? Corrupti ipsa repudiandae nisi.</p>
        </div>
        <div class="horizonlandsitem">
            <img src="history.png" alt="" width="200px">
        </div>
    </div>
</body>
</html>
<?php require_once("footer.php");?>
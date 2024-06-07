<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="header.css">
    <style>
        header{
    box-shadow: rgba(38, 57, 77, 0.342) 0px 20px 70px -10px;
}
.nav{
    display: flex;
    justify-content: space-around;
    align-items: center;
    height: 80px;
}
.navitems a{
    text-decoration: none;
    color: #1B4332;
    margin: 0px 35px 0px 0px;
    padding-bottom: 10px;
    font-size: 16px;
    font-weight: 400;
}
.cartbtn a{
    padding: 14px 28px;
    background: #2a9158;
    border-radius: 10px;
    text-decoration: none;
    color: #ffffff;
    font-size: 16px;
    cursor: pointer;
}
    </style>
</head>
<body>
<header>
        <div class="header">
            <div class="nav">
                <a href="" class="logo"><img src="horizonlands.png" alt="" width="100px"></a>
                <div class="navitems">
                    <h2>My Account</h2>
                </div>
                <div class="cartbtn">
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </header>
</body>
</html>
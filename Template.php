
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css"/>
    </head>
    <body>
        <div id="wrapper">
            <div id="banner">
                 
            </div>
            
            <nav id="navigation">
                <ul id="nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Orders.php">Orders</a></li>
                </ul>
            </nav>
            
            <div id ="content_area">
                <?php echo $content ?>
            </div>
            
            <footer id="footer">
                 Made by grantas33.
            </footer>
                 
    </body>
</html>

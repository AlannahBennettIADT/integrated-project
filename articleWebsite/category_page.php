<?php
require_once "classes/story.php";
require_once "classes/category.php";

 try{
    $story = Story::findAll();
    $categoryList = Story::findByCategory($_GET["id"], 10);

    $allCategory = Category::findByCategory($_GET["id"]);

 }
 catch (Exception $e)
{
     echo $e;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/grid.css">
  <link rel="stylesheet" href="css/style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
      href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet">



  <title>News Article Category Page</title>

</head>
<body>
<!-- Nav Bar -->
<header>
    <div class="container">
        <div class="header width-12">
        <div class="siteIcon">
          <i class="fa-solid fa-laptop-code"></i>
          <h1><a href="stories_create.php">The Tech Times</a></h1>
            </div>
            <div class="navButtons">
                <a href="category_page.php?id=3" class="navButton"> / Social Media /</a>
                <a href="category_page.php?id=1"" class="navButton"> Technology /</a>
                <a href="category_page.php?id=2"" class="navButton"> Gaming / </a>
                <a href="category_page.php?id=4"" class="navButton"> Reviews /</a>
            </div>
        </div>
</header>


<div class="categoryLoop">
<div class="container">
    <?php foreach($categoryList as $story){ ?>
        <div class="horizontalCategory width-4">
            <div class="categoryImage">
                <img src=".<?= $story->img_url?>">
            </div>

            <div class="categoryContent">
                <div class="categoryName">
                  <i class="fa-solid fa-microchip"></i>
                <?php foreach($allCategory as $category){ ?>
                <h5><?= $category->type?></h5>
                <?php } ?>
                </div>
                <h2><a href="article.php?id=<?= $story->id ?>"><?= $story->headline; ?></a></h2>
            </div>
        </div>
        <?php } ?>
    </div>
</div>



<footer>
        <div class="container width-12">
            <div class="footerBlock width-3">
                <h2>HELP & INFORMATION</h2>
                <ul>
                    <li><a href="#">Help </a></li>
                    <li><a href="#">Terms of Use </a></li>
                    <li><a href="#">Cookie Policy </a></li>
                    <li><a href="#">Licensing FAQ </a></li>
                    <li><a href="#">Accessibility</a></li>
                </ul>
            </div>

            <div class="footerBlock width-3">
                <h2>About Us</h2>
                <ul>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Community Guidelines </a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Ethic Statement </a></li>
                </ul>
            </div>

            <div class="footerBlock width-3">
                <h2>Trending Tech Topics</h2>
                <ul>
                    <li><a href="#">Tech Industry Layoffs</a></li>
                    <li><a href="#">ChatGPT </a></li>
                    <li><a href="#">CES 2023</a></li>
                </ul>
            </div>
            <div class="footerBlock width-3">
              <img src="./images/app-store-badges-en 1.png";>
          </div>

        </div>
</footer>
</body>
</html>
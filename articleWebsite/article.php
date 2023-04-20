<?php
require_once "classes/story.php";
require_once "classes/category.php";

 try{
    $story = Story::findById($_GET["id"]);
    $category = Category::findByCategory($story->category_id);

    $categoryGaming = Category::findByCategory(2);
    $categoryTech = Category::findByCategory(1);
    $categoryReviews = Category::findByCategory(4);
    $categorySocialMedia = Category::findByCategory(3);


    $gamingHorizontal = Story::findByCategory(2,3);
    $technologyHorizontal = Story::findByCategory(1,3,4);
    $bigReviews = Story::findByCategory(4,4);
    $gamingTopStories = Story::findByCategory(2,2,3);
    $socialMediaStories = Story::findByCategory(3,3,1);
    $socialMediaMain = Story::findByCategory(3,1,4);
    $technologyList = Story::findByCategory(1,5);

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



  <title>News Article Page</title>

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


<section class="article">
    <div class="container">
        <div class="articleHeading width-8">
        <div class="extras">
                <h4><?= $story->author; ?></h4>
                <h5><?= $story->pub_date; ?></h5>
                <h5><?= $story->location; ?></h5>
            </div>
            <h2><?= $story->headline; ?></h2>
            <h3> <?= $story->short_headline; ?></h3>
            <img src=".<?= $story->img_url?>">
        </div>
    </div>
    <div class="container">
            <div class="mainArticle width-7">
                <h3><?= $story->article; ?></h3>
            </div>
    </div>
    <div class="container width-4">
        <div class="panelsSide width-4">
        <?php foreach($socialMediaStories as $story){ ?>
          <div class="sidePanels width-4">
            <div class="sidePanel">
              <div class="imageContent">
              <img src=".<?= $story->img_url?>">
            </div>
            <div class="sideContent">
              <h2><a href="article.php?id=<?= $story->id ?>"><?= $story->headline; ?></a></h2>
              <h4><?= $story->short_headline; ?></h4>
              <p><i class="fa-solid fa-circle-user"></i><?= $story->author; ?></p>
            </div>
            <?php foreach($categorySocialMedia as $category){ ?>
                <h3><?= $category->type?></h3>
                <?php } ?>
            </div>
          </div>
          <?php } ?>
        </div>
          </div>
        </div>
      </div>
    </div>
</section>





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
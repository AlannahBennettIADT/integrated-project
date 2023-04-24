<?php
require_once "classes/story.php";
require_once "classes/category.php";

 try{
    $stories = Story::findAll();
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



  <title>News Article Homepage</title>
</head>
<body>

<!-- Nav Bar -->
<header>
    <div class="container">
        <div class="header width-12">
        <div class="siteIcon">
          <i class="fa-solid fa-laptop-code"></i>
                <h1><a href="#">The Tech Times</a></h1>
            </div>
            <div class="navButtons">
                <a href="category_page.php?id=3" class="navButton"> / Social Media /</a>
                <a href="category_page.php?id=1"" class="navButton"> Technology /</a>
                <a href="category_page.php?id=2"" class="navButton"> Gaming / </a>
                <a href="category_page.php?id=4"" class="navButton"> Reviews /</a>
            </div>
        </div>
</header>

<!-- Header -->
<section class="header">
    <div class="container">
    <div class="width-7">
      <div class="mainSplit v1  width-7">
        <h2><a href="article.php?id=1"> YouTube CEO Susan Wojcicki steps down after nine years</a></h2>
      </div>
        <div class="hrLines width-7">
          <h2>TOP STORIES</h2>
        </div>
        
      <div class="gamingHeader width-7">
        <?php foreach($gamingTopStories as $story){ ?>
        <div class="games01 width-3">
            <img src=".<?= $story->img_url?>">
            <div class="categoryName">
                <i class="fa-solid fa-headset"></i>
                <?php foreach($categoryGaming as $category){ ?>
                <h5><?= $category->type?></h5>
                <?php } ?>
            </div>
            <h2><a href="article.php?id=<?= $story->id ?>"><?= $story->headline; ?></a></h2>
            <h4><?= $story->short_headline; ?></h4>
        </div>
        <?php } ?>
      </div>
    </div>

      <div class="mainSplit v2 width-5">
        <div class="panelsSide width-5">
        <h1> More in Social Media  </h1>
        <?php foreach($socialMediaStories as $story){ ?>
          <div class="sidePanels width-5">
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
            <h2><a href="category_page.php?id=3" class="button">More Stories&nbsp;&nbsp;<i class="fa-solid fa-arrow-right"></i></a></h2>
        
        </div>
          </div>
        </div>
      </div>
</section>

<!-- Gaming Category -->
<section class="gaming">
    <div class="container">
        <div class="categoryHeader h1 width-12">
            <div class="horizontalHeading">
                <i class="fa-solid fa-terminal"></i>
                <h3>GAMING</h3>
            </div>
        </div>
    </div>

    <div class="container">
    <?php foreach($gamingHorizontal as $story){ ?>
        <div class="horizontalCategory width-4">
            <div class="categoryImage">
            <img src=".<?= $story->img_url?>">
            </div>

            <div class="categoryContent">

                <div class="categoryName">
                    <i class="fa-solid fa-headset"></i>
                <?php foreach($categoryGaming as $category){ ?>
                <h5><?= $category->type?></h5>
                <?php } ?>
                </div>
                <h2><a href="article.php?id=<?= $story->id ?>"><?= $story->headline; ?></a></h2>
            </div>
        </div>
        <?php } ?>
    </div>
</section>

<!-- Technology Category -->
<section class="technology">
    <div class="container">
        <div class="categoryHeader h2 width-12">
            <div class="horizontalHeading heading02">
                <i class="fa-solid fa-terminal"></i>
                <h3>TECHNOLOGY</h3>
            </div>
        </div>
    </div>

    <div class="container">
    <?php foreach($technologyHorizontal as $story){ ?>
        <div class="horizontalCategory width-4">
            <div class="categoryImage">
                <img src=".<?= $story->img_url?>">
            </div>

            <div class="categoryContent">

                <div class="categoryName">
                    <i class="fa-solid fa-microchip"></i>
                    <?php foreach($categoryTech as $category){ ?>
                <h5><?= $category->type?></h5>
                <?php } ?>
                </div>
                <h2><a href="article.php?id=<?= $story->id ?>"><?= $story->headline; ?></a></h2>
            </div>
        </div>
        <?php } ?>
    </div>
</section>

<!-- Second Header Section -->
<section class="secondMainSection">
    <div class="container">
    <div class="width-1">
        <div class="circle">
          <h1>1</h1>
        </div>
        <div class="circle">
          <h1>2</h1>
        </div>
        <div class="circle">
          <h1>3</h1>
        </div>
        <div class="circle">
          <h1>4</h1>
        </div>
        <div class="circle">
          <h1>5</h1>
        </div>
    </div>

    <div class="width-3">
    <?php foreach($technologyList as $story){ ?>
        <div class="topThree">
          <div class="topThreeContent">
            <div class="categoryName">
            <i class="fa-solid fa-microchip"></i>
            <?php foreach($categoryTech as $category){ ?>
                <h5><?= $category->type?></h5>
                <?php } ?>
          </div>
          <h3><a href="article.php?id=<?= $story->id ?>"><?= $story->headline; ?></a></h3>
          <h5><?= $story->author; ?></h5>
          </div>
        </div>
        <?php } ?>
    </div>


    <?php foreach($socialMediaMain as $story){ ?>
      <div class="mainSecond width-8">
        <img src=".<?= $story->img_url?>">
        <div class="mainSecondContent">
        <h2><a href="article.php?id=<?= $story->id ?>"><?= $story->headline; ?></a></h2>
        <h3><?= $story->short_headline; ?></h3>
        <?php foreach($categorySocialMedia as $category){ ?>
          <div class="sidePanel">
                <h3><?= $category->type?></h3>
                </div>
                <?php } ?>
        </div>
      </div>
      <?php } ?>
    </div>
</section>

<!-- Heading for Reviews -->
<section class="reviewHeadingMain">
      <div class="container">
        <div class="categoryHeader h2 width-12">
          <div class="horizontalHeading heading02">
            <i class="fa-solid fa-terminal"></i>
            <h3>REVIEWS</h3>
          </div>
        </div>
      </div>
</section>

<!-- Reviews -->
<section class="reviewsBig width-12">
        <div class="container ">
        <?php foreach($bigReviews as $story){ ?>
            <div class="techReviews width-3">
                <div class="techReview">
                    <img src=".<?= $story->img_url?>">
                    <div class="categoryName">
                        <i class="fa-regular fa-comment"></i>
                        <?php foreach($categoryReviews as $category){ ?>
                        <h5><?= $category->type?></h5>
                        <?php } ?>
                    </div>
                    <h3><a href="article.php?id=<?= $story->id ?>"><?= $story->headline ?></a></h3>
                </div>
                <div class="authorAndDate">
                    <h5><?= $story->author; ?></h5>
                    <i class="fa-solid fa-calendar-days"></i>
                    <h5><?= $story->pub_date; ?></h5>
                </div>
                <div class="readtime">
                    <i class="fa-solid fa-globe"></i>
                    <h5><?= $story->location; ?></h5>
                </div>
            </div>
            <?php } ?>
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

        </div>
</footer>
    
</body>
</html>
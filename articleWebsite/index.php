<?php

require_once "classes/story.php";
// require_once "classes/category.php";

 try{
    $stories = Story::findAll();
 }
 catch (Exception $e)
{
     echo $e;
}

?>


<html>
    <head>
        <title>Stories</title>
        <style>
            table, th, td {
                border: 1px solid black;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Author</th>
                    <th>Headline</th>
                    <th>Short Headline</th>
                    <th>Sub Heading</th>
                    <th>Article</th>
                    <th>Summary</th>
                    <th>Publish Date</th>
                    <th>Publish Time</th>
                    <th>Location</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stories as $s) { ?>
                <tr>
                    <td><?= $s->id?></td>
                    <td><?= $s->author?></td>
                    <td><?= $s->headline ?></td>
                    <td><?= $s->short_headline ?></td>
                    <td><?= $s->sub_heading?></td>
                    <td><?= $s->article?></td>
                    <td><?= $s->summary?></td>
                    <td><?= $s->pub_date?></td>
                    <td><?= $s->pub_time?></td>
                    <td><?= $s->location?></td>
                    <td><img src=".<?= $s->img_url?>" width="200px"  height="100px"></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="width-12">
            <?php
            foreach($stories as $story){ ?>
            <div class="width-2">
                <h4><?= $story->headline; ?></h4>
                <h4><?= $story->author; ?></h4>
            </div>
        <?php } ?>
    </div>
    </body>
</html>
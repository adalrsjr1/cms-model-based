<?php
/**
 * Created by PhpStorm.
 * User: Adalberto
 * Date: 30/05/2015
 * Time: 16:09
 */
require_once('ModelLoader.php');

$xml = ModelLoader::loadModel('../model/My.cms');
$model = new ModelInstance($xml);

$pages = $model->getPages();
$i = 0;
?>

<html>
    <head>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div>
        <?php echo $model->getHeader($pages[$i])["id"]?>
    </div>
    <div>

    </div>
    <div>
        <?php echo $model->getFooter($pages[$i])["id"]?>
    </div>
    </body>
</html>




<!--echo $xml->pages[0]['id'] . '<br>';
echo $xml->pages[0]['footer'] . '<br>';
echo $xml->pages[0]->content['id'] . '<br>';
echo $xml->pages[0]->content->innerContent[0]->Paragraphs[0]['content'] . '<br>';



$pages = $model->getPages();
echo $model->getFooter($pages[0])['id'] . '<br>';
echo $model->getHeader($pages[0])['id'] . '<br>';

echo ModelLoader::getXSI($xml->pages[0]->content->innerContent);

*/
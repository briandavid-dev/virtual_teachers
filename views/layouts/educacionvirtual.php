<?php


use app\assets\DashboardAsset;

DashboardAsset::register($this);
$theme = $this->theme;

?>


<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="utf-8">

<!-- favicon -->
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="icon" type="image/x-icon" href="favicon.ico" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="distribution" content="global">
<meta name="robots" content="INDEX,FOLLOW,NOODP">


<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- HEADER START -->


        <?php $this->head() ?>
      
      </head>
      <body>
        
        <?php $this->beginBody() ?>
        
        <main>

            <?php print $content; ?>
          
        </main>

        <?php $this->endBody() ?>


</body>
  <!-- FOOTER START -->
 

  <!-- FOOTER END -->

 
</html>
<?php $this->endPage() ?>
 


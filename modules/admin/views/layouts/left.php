<?php
use yii\bootstrap\Nav;

?>
<aside class="left-side sidebar-offcanvas">

    <section class="sidebar">

        <?php if (!Yii::$app->user->isGuest) : ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>Hello, <?= @Yii::$app->user->identity->email ?></p>
                    <a href="<?= $directoryAsset ?>/#">
                        <i class="fa fa-circle text-success"></i> Online
                    </a>
                </div>
            </div>
        <?php endif ?>

        <?php if(Yii::$app->user->identity->role == 5): ?>
        <?=
        Nav::widget(
            [
                'encodeLabels' => false,
                'options' => ['class' => 'sidebar-menu'],
                'items' => Yii::$app->params['LeftMenu'],
            ]
        );
        ?>
        <?php elseif (Yii::$app->user->identity->role == 10): ?>
        <?=
        Nav::widget(
            [
                'encodeLabels' => false,
                'options' => ['class' => 'sidebar-menu'],
                'items' => Yii::$app->params['adminLeftMenu'],
            ]
        );
        ?>
        <?php endif; ?>
        <!-- You can delete next ul.sidebar-menu. It's just demo. -->



    </section>

</aside>

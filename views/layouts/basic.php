<?php
use app\assets\AppAsset;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\components\AlertWidget;
use yii\helpers\Url;
/**
 * Created by PhpStorm.
 * User: phpNT
 * Date: 28.02.2015
 * Time: 1:48
 */
/* @var $content string
 * @var $this \yii\web\View */
AppAsset::register($this);
$this->beginPage();
?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <?= Html::csrfMetaTags() ?>
        <meta charset="<?= Yii::$app->charset ?>">
        <?php $this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']); ?>
        <title><?= Yii::$app->name ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody(); ?>

    <div class="wrap">
        <?php
        NavBar::begin(
            [
                'options' => [
                    'class' => 'navbar navbar-default',
                    'id' => 'main-menu'
                ],
                'renderInnerContainer' => true,
                'innerContainerOptions' => [
                    'class' => 'container'
                ],
              //  'brandLabel' => '<img src="'.\Yii::$app->request->BaseUrl.'/img/brand.gif"/>',
              'brandLabel'=>'<span class="label label-info">moneyCan</span>',
                'brandUrl' => [
                    '/main/index'
                ],
                'brandOptions' => [
                    'class' => 'navbar-brand'
                ]
            ]
        );
        if (!Yii::$app->user->isGuest):
            ?>
            <div class="navbar-form navbar-right">
                <button class="btn btn-sm btn-default"
                        data-container="body"
                        data-toggle="popover"
                        data-trigger="focus"
                        data-placement="bottom"
                        data-title="<?= Yii::$app->user->identity['username'] ?>"
                        data-content="
                            <a href='<?= Url::to(['/main/logout']) ?>' data-method='post'>Выход</a>
                        ">
                    <span class="glyphicon glyphicon-user"></span>
                </button>
            </div>
        <?php
        endif;
        $menuItems = [
            [
                'label' => 'О проекте <span class="glyphicon glyphicon-question-sign"></span>',
                'url' => [
                    '#'
                ],
                'linkOptions' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'style' => 'cursor: pointer; outline: none;'
                ],
            ],
        ];
        if (Yii::$app->user->isGuest):
            $menuItems[] = [
                'label' => '<span class="glyphicon glyphicon-user"></span> Регистрация',
                'url' => ['/main/reg']
            ];
            $menuItems[] = [
                'label' => '<span class="glyphicon glyphicon-log-in"></span> Войти',
                'url' => ['/main/login']
            ];
          else:
            $menuItems[] = [
                'label' => 'Выйти('.Yii::$app->user->identity['username'].')',
                'url' => ['/main/logout'],
                'linkOptions'=>['data-method'=>'post'
              ]
            ];
        endif;
        echo Nav::widget([
            'items' => $menuItems,
            'activateParents' => true,
            'encodeLabels' => false,
            'options' => [
                'class' => 'navbar-nav navbar-right'
            ]
        ]);
        Modal::begin([
            'header' => '<h2>phpNT</h2>',
            'id' => 'modal'
        ]);
        echo 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
         The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
         as opposed to using  content here making it look like readable English.';
        Modal::end();
        ActiveForm::begin(
            [
                'action' => ['/найти'],
                'method' => 'get',
                'options' => [
                    'class' => 'navbar-form navbar-right'
                ]
            ]
        );
        echo '<div class="input-group input-group-sm">';
        echo Html::input(
            'type: text',
            'search',
            '',
            [
                'placeholder' => 'Найти ...',
                'class' => 'form-control'
            ]
        );
        echo '<span class="input-group-btn">';
        echo Html::submitButton(
            '<span class="glyphicon glyphicon-search"></span>',
            [
                'class' => 'btn btn-success',
                'onClick' => 'window.location.href = this.form.action + "-" + this.form.search.value.replace(/[^\w\а-яё\А-ЯЁ]+/g, "_") + ".html";'
            ]
        );
        echo '</span></div>';
        ActiveForm::end();
        NavBar::end();
        ?>
        <div class="container">
            <?= AlertWidget::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
         <span class="badge">
               <span class="glyphicon glyphicon-copyright-mark"></span> BANK <?= date('Y') ?>
        </span>
        <span class="label label-info">moneyCan</span>
        </div>
    </footer>

    <?php $this->endBody(); ?>
    </body>
    </html>
<?php
$this->endPage();

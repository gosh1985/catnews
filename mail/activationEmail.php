<?php

 /* @var $this yii\web\View
  @var $user app\models\User
 */
use yii\helpers\Html;
echo 'Привет '.Html::encode($user->username).'.';
echo Html::a('Для активации аккаунта перейдите по этой ссылке.',
    Yii::$app->urlManager->createAbsoluteUrl(
        [
            '/main/activate-account',
            'key' => $user->secret_key
        ]
    ));

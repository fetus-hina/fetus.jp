{{strip}}
{{use class="yii\helpers\Html"}}
{{\app\assets\AppAsset::register($this)|@void}}
{{$this->beginPage()|@void}}
<!DOCTYPE html>
<html lang="{{$app->language|escape}}">
  <head>
    <meta charset="{{$app->charset|escape}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{Html::csrfMetaTags()}}
    <title>{{$this->title|escape}}</title>
    {{$this->head()}}
  </head>
  <body>
    {{$this->beginBody()|@void}}
    <div class="wrap">
      {{use class="yii\bootstrap\Nav"}}
      {{use class="yii\bootstrap\NavBar"}}
      {{NavBar::begin([
        'brandLabel' => $app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
          'class' => 'navbar-inverse navbar-fixed-top'
        ]
      ])|@void}}
      {{Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
          ['label' => 'Home', 'url' => ['/site/index']]
        ]
      ])}}
      {{NavBar::end()|@void}}
      <div class="container">
        {{$content}}
      </div>
    </div>
    <footer class="footer">
      <div class="container">
        <p class="pull-left">
          &copy; AIZAWA Hina
        </p>
        <p class="pull-right">
          {{\Yii::powered()}}
        </p>
      </div>
    </footer>
    {{$this->endBody()|@void}}
  </body>
</html>
{{$this->endPage()|@void}}
{{/strip}}

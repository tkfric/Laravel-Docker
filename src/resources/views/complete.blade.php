<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>遅刻理由ジェネレーター</title>
        <!-- Reset -->
        <link href="{{ asset('/css/reset.css') }}" rel="stylesheet" type="text/css">
        <!-- Style -->
        <link href="{{ asset('/css/top.css') }}" rel="stylesheet" type="text/css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="wrapper">
            <header class="header">
                <div class="inner clearfix">
                    <h1 class="header__title">遅刻理由</h1>
                    <div class="header__title__sub">
                        <p class="header__title_sub--generator">ジェネレーター</p>
                        <p class="header__title__sub--misawa">by 地獄のミサワ</p>
                    </div>
                    <div class="header__catch">
                        <p>地獄の言い訳<br>作成支援</p>
                    </div>
                </div>
            </header>
            <main class="main">
                <div class="inner clearfix">
                    <div class="main__contents">
                        <p class="main__contents--description">よう、兄弟。遅刻理由が作成できたぜ。<br>ナイスでパーフェクトな理由だろ？</p>
                        <p class="main__contents--reasonarea">
                        @foreach ($generatedData as $k => $v)
                            {{ $v }} <br>
                        @endforeach
                        </p>
                        <div class="main__contents--btnArea">
                            <button type="" class="main__contents--btn">理由をコピーする</button>
                        </div>
                    </div>
                    <div class="main__img">
                        <img src="{{ asset('/image/misawa.jpeg') }}" alt="">
                    </div>
                </div>
            </main>
            <footer class="footer">
                <div class="inner clearfix">
                    <p class="footer__copyright footer__text">&copy; Hackathon2019</p>
                    <p class="footer__notice footer__text">&#x203B; 自己責任でご利用ください</p>
                </div>
            </footer>
        </div>
    </body>
</html>

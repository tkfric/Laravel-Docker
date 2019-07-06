<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>遅刻理由ジェネレーター</title>
        <!-- Reset -->
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet" type="text/css">
        <!-- Style -->
        <link href="{{ asset('css/top.css') }}" rel="stylesheet" type="text/css">
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
                        <p class="main__contents--description">よう、兄弟。遅刻しちまったか。まあ慌てるな。<br>キーワードを打ち込んでくれりゃあ俺が理由を作成するぜ。</p>
                        <form action="/misawa/generate" method="post">
                            {{ csrf_field() }}
                            <ul class="main__contents--keyword">
                                <li>
                                    <p>&#x25B6; 名前</p>
                                    @if ($errors->get('name'))
                                        <div class="error">
                                            <ul>
                                                @foreach ($errors->get('name') as $error)
                                                    <li>※{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <input type="text" class="main__contents--inputarea" name="name" placeholder="ex) ミサワ">
                                </li>
                            <ul class="main__contents--keyword">
                                <li>
                                    <p>&#x25B6; 人物</p>
                                    @if ($errors->get('person'))
                                        <div class="error">
                                            <ul>
                                                @foreach ($errors->get('person') as $error)
                                                    <li>※{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <input type="text" class="main__contents--inputarea" name="person" placeholder="ex) おかん">
                                </li>
                                <li>
                                    <p>&#x25B6; 場所</p>
                                    @if ($errors->get('place'))
                                        <div class="error">
                                            <ul>
                                                @foreach ($errors->get('place') as $error)
                                                    <li>※{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <input type="text" class="main__contents--inputarea" name="place" placeholder="ex) 本能寺">
                                </li>
                                <li>
                                    <p>&#x25B6; 遅刻時間</p>
                                    @if ($errors->get('time'))
                                        <div class="error">
                                            <ul>
                                                @foreach ($errors->get('time') as $error)
                                                    <li>※{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <input type="text" class="main__contents--inputarea" name="time" placeholder="ex) 2時間">
                                </li>
                            </ul>
                            <div class="main__contents--btn">
                                <button type="submit" class="main__contents--submit">遅刻理由を作成する</button>
                            </div>
                        </form>
                    </div>
                    <div class="main__img">
                        <img src="{{ asset('image/misawa.jpeg') }}" alt="">
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

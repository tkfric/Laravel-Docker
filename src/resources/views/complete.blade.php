<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>遅刻理由ジェネレーター</title>

        <!-- Reset -->
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/top.css') }}" rel="stylesheet" type="text/css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <style>
            html, body, div, span, applet, object, iframe,
            h1, h2, h3, h4, h5, h6, p, blockquote, pre,
            a, abbr, acronym, address, big, cite, code,
            del, dfn, em, img, ins, kbd, q, s, samp,
            small, strike, strong, sub, sup, tt, var,
            b, u, i, center,
            dl, dt, dd, ol, ul, li,
            fieldset, form, label, legend,
            table, caption, tbody, tfoot, thead, tr, th, td,
            article, aside, canvas, details, embed, 
            figure, figcaption, footer, header, hgroup, 
            menu, nav, output, ruby, section, summary,
            time, mark, audio, video {
                margin: 0;
                padding: 0;
                border: 0;
                font-size: 100%;
                font: inherit;
                vertical-align: baseline;
            }
            /* HTML5 display-role reset for older browsers */
            article, aside, details, figcaption, figure, 
            footer, header, hgroup, menu, nav, section {
                display: block;
            }
            body {
                line-height: 1;
            }
            ol, ul {
                list-style: none;
            }
            blockquote, q {
                quotes: none;
            }
            blockquote:before, blockquote:after,
            q:before, q:after {
                content: '';
                content: none;
            }
            table {
                border-collapse: collapse;
                border-spacing: 0;
            }


            /*---------------
                common 
            ---------------*/
            html {
                min-height: 100%;
                position: relative;
            }

            body {
                font-family: serif;
            }

            .clearfix::after {
                content: '';
                clear: both;
                display: block;
            }

            .inner{
                margin: 0 auto;
                width: 1100px;
            }


            /*---------------
                header 
            ---------------*/
            .header {
                background-color: #000;
                box-sizing: border-box;
                font-size: 0;
                font-weight: 900;
                padding: 10px 0;
                width: 100%;
            }

            .header__title {
                background-color: #fff;
                display: inline-block;
                float: left;
                font-size: 110px;
                height: 100px;
                line-height: 105px;
                padding: 5px;
                text-align: center;
                width: 450px;
            }

            .header__title__sub {
                float: left;
                margin-left: 10px;
                width: 370px;
            }

            .header__title_sub--generator {
                background-color: #fff;
                font-size: 50px;
                height: 55px;
                line-height: 55px;
                text-align: center;
            }

            .header__title__sub--misawa {
                background-color: #696969;
                color: #fff;
                font-size: 30px;
                height: 55px;
                line-height: 55px;
                text-align: center;
                width: 100%;                
            }

            .header__catch {
                border: 1px solid #fff;
                box-sizing: border-box;
                color: #fff;
                display: inline-block;
                float: left;
                font-size: 35px;
                height: 110px;
                line-height: 50px;
                margin-left: 10px;
                text-align: center;
                width: 250px;
            }

            /*---------------
                main
            ---------------*/
            .main {
                font-weight: 600;
            }

            .main__contents {
                float: left;
                font-size: 18px;
                padding: 40px 0;
                width: 700px;
            }

            
            .main__contents--description {
                line-height: 25px;
                margin-bottom: 40px;
            }

            .main__contents--reasonarea {
                border: 1px solid #000;
                box-sizing: border-box;
                height: 200px;
                padding: 5px;
                width: 400px;
            }

            .main__contents--btn {
                margin-top: 30px;
                padding-left: 100px; 
            }

            .main__contents--copy {
                background-color: #696969;
                border-radius: 25px;
                color: #fff;
                outline: none;
                padding: 10px 0;
                width: 200px;
            }

            .main__contents--copy:active {
                opacity: .7;
            }

            .main__img {
                float: right;
                width: 400px;
            }

            /*---------------
                footer
            ---------------*/
            .footer {
                background-color: #696969;
                bottom: 0;
                padding: 20px 0;
                position: absolute;
                width: 100%;
            }


            .footer__text {
                color: #fff;
                display: inline-block;
                font-size: 14px;
            }

            .footer__copyright {
                float: left;
            }

            .footer__notice {
                float: right;
            }
        </style>
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
                        <div class="main__contents--btn">
                            <button type="" class="main__contents--copy">理由をコピーする</button>
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

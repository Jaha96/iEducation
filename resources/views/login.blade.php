<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Нэвтрэх</title>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
</head>

<body>

<div class="container container--static">
    <div class="info-box left">
        <h2 class="heading">Нууц үг сэргээх</h2>
        <p class="info-text">
            Та бүртгүүлсэн и-мэйл хаягаа оруулан <b>'илгээх'</b> товчийг дарснаар таны и-мэйл хаяг руу нууц үг сэргээх
            холбоос очих болно.
        </p>
    </div>

    <div class="info-box right">
        <h2 class="heading">Go CMS v1.0.3</h2>
        <p class="info-text">
           Go CMS is based on powerful Laravel and ReactJS framework
        </p>
        <button class="button button--login">Дэлгэрэнгүй</button>
    </div>
</div>

<div class="container container--sliding">
    <div class="slider-content login">
        <h2 class="heading alt">Нэвтрэх</h2>
        <form action="{{ url('login') }}" method="post" id="login">
            {{ csrf_field() }}
            <input class="email" name="email" type="text" placeholder="Нэвтрэх нэр">
            <input class="password" name="password" type="password" placeholder="Нууц үг">

            <button type="submit" class="button button--login alt">Нэвтрэх</button>
            <p class="info-text alt pull-right forget-link">
                <a href="javascript:void(0)" id="restoreFormLink">Нууц үгээ мартсан?</a>
            </p>
        </form>
        @if (isset($errors) && count($errors) > 0)
            <p class="err-msg">
                И-мэйл эсвэл нууц үг буруу байна!!!
            </p>
        @endif
        <div class="copyright">
            GoCMS &copy 2016 - Aspire to Infinity
        </div>
    </div>

    <div class="slider-content restore">
        <h2 class="heading alt">Нууц үг сэргээх</h2>
        <form id="signup">
            <input class="email" type="text" placeholder="Бүртгүүлсэн и-мэйл хаягаа оруулна уу">
        </form>
        <p class="info-text alt pull-left restore-link"><a href="javascript:void(0)" id="loginFormLink"> <i
                        class="fa fa-arrow-circle-left"></i> Буцах</a></p>
        <button class="button button--send alt pull-right">Илгээх</button>

        <div class="copyright">
            GoCMS &copy 2016 - Aspire to Infinity
        </div>
    </div>
</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<script>
    $(function () {
        var login = $('#loginFormLink');
        var restoreLink = $('#restoreFormLink');
        var restoreContent = $('.container--sliding .slider-content.restore');
        var loginContent = $('.container--sliding .slider-content.login');
        var slider = $('.container--sliding');

        restoreLink.on('click', function () {
            loginContent.css('display', 'none');
            restoreContent.css('display', 'initial');
            slider.animate({
                'left': '70%'
            }, 350, 'easeOutBack');
        });

        login.on('click', function () {
            restoreContent.css('display', 'none');
            loginContent.css('display', 'initial');
            slider.animate({
                'left': '30%'
            }, 350, 'easeOutBack');
        });
    });
</script>
</body>
</html>

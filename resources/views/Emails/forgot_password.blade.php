<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Alegreya" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" type="text/css" />
    <style>
        div {
            margin-bottom: 2%;
            text-align: center
        }

        h1 {
            color: #393d47;
            direction: ltr;
            font-family: Tahoma, Verdana, Segoe, sans-serif;
            font-size: 25px;
            font-weight: normal;
            letter-spacing: normal;
            line-height: 120%;
            text-align: center;
            margin-top: 0;
            margin-bottom: 0.5%;
        }

        .btn_href {
            display: inline-block;
            color: #393d47;
            background-color: #ffc727;
            border-radius: 20px;
            width: auto;
            border: 1px solid #FFC727;
            padding-top: 10px;
            padding-bottom: 10px;
            font-family: Tahoma, Verdana, Segoe, sans-serif;
            text-align: center;
            mso-border-alt: none;
            word-break: keep-all;
            padding-left: 50px;
            padding-right: 50px;
            font-size: 18px;
            display: inline-block;
            letter-spacing: normal;
            text-decoration: none;
        }

        .grp1 {
            font-size: 14px;
            text-align: center;
            font-family: Tahoma, Verdana, Segoe, sans-serif;
            mso-line-height-alt: 21px;
            color: #393d47;
            line-height: 1.5;
        }

        img {
            height: 200px;
            border: 0;
            width: 300px;
            max-width: 100%;
        }

        grp2 {
            font-size: 12px;
            font-family: Tahoma, Verdana, Segoe, sans-serif;
            text-align: center;
            mso-line-height-alt: 18px;
            color: #393d47;
            line-height: 1.5;
        }

    </style>
</head>

<body>
    <div style="line-height:10px">
        <img alt="reset-password" src="{{ url('/images/gif-resetpass.gif') }}" title="reset-password" width="350" />
    </div>
    <h1>Mot de passe oublié?</h1>
    <div class="txtTinyMce-wrapper grp1">
        <span>Ne vous inquiétez pas, nous vous avons!</span>
        <span>Prenons-nous un nouveau mot de passe.</span>
    </div>
    <div>
        <a href="{{config('memrise.FRONT_END_URL')}}/change-password/{{$token}}" class="btn_href" target="_blank">
            Réinitialiser le mot de passe
        </a>
    </div>
    <div class="txtTinyMce-wrapper grp2">
        <p style="margin: 0; mso-line-height-alt: 19.5px;">
            <span style="font-size:13px;">Si vous n'avez pas demandé de modifier votre mot de passe, ignorez simplement cet e-mail.</span>
        </p>
    </div>
    <div class="txtTinyMce-wrapper"
        style="font-size: 12px; font-family: Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #393d47; line-height: 1.2;">
        <p style="margin: 0; font-size: 14px; text-align: center;">
            <span style="font-size:14px;color:red">
                Ce lien expirera <b>{{config('memrise.TOKEN_EXPIRED')}}</b> MinuteS.
            </span>
        </p>
    </div>
</body>

</html>

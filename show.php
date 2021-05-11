<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
        body{
            padding: 0;
            margin:auto;
            background-color:#fff ;
            color: #1c2f60;
            transition:background-color 300ms ;
            overflow: hidden;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .bImg{
            width: fit-content;
            margin: auto;
            margin-top: 2px;
            position: relative;
        }
        /* #input_text{width: 100px;} */
    </style>
    <title>Show</title>
</head>

<body >
    <div class="col-md-6 bImg">

        <?php
            ini_set('display_errors', 1);
            error_reporting(E_ALL);

            require 'I18N/Arabic.php';
            $Arabic = new I18N_Arabic('Glyphs');

            $font = realpath('fonts/ae_AlHor.ttf');

            $input_text = $Arabic->utf8Glyphs($_POST['txt_input']);

            $width  = 580;
            $height = 586;

            $textImage = imagecreate($width, $height);
            $color = imagecolorallocate($textImage, 0, 0, 0);

            $background = imagecreatefromjpeg('images/عيد مبارك.jpg');
            imagettftext($background, 15, 0, 95,480, $color, $font,$input_text);
            $output = imagecreatetruecolor($width, $height);

            imagecopy($output, $background, 0, 0, 20, 13, $width, $height);

            ob_start();
            imagepng($output);
            print '<p><img src="data:image/png;base64,'.base64_encode(ob_get_clean()).'" width="100%" /></p>';

        ?>
    </div>
</body>

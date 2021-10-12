<?php

namespace MyApp;


class Token
{


    // トークンの設定
    public static function create()
    {
        if (!isset($_SESSION['token'])) {
            $_SESSION['token'] = bin2hex(random_bytes(32));
        }
    }

    // トークンのバリデーション
    public static function validate()
    {
        if (
            empty($_SESSION['token']) ||
            $_SESSION['token'] !== filter_input(INPUT_POST, 'token')
        ) {
            exit('Invalid post request');
        }
    }
}

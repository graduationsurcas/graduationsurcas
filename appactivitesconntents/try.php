<?php

include_once './server/config.php';
include_once './server/appdboperations.php';
include_once '../class/cryptpass.php';


print_r(appdboperations::ServiceProviderSignIn("admin@gmail.com", "12345"));
//

//require 'vendor/autoload.php';
//use Stichoza\GoogleTranslate\TranslateClient;
//
//$str = "This package is developed for educational purposes only. Do not depend on this package as it may break anytime as it is based on the Google Translate website. Consider buying Official Google Translate API for other types of usage.";
//
//echo TranslateClient::translate('en', 'de', $str);






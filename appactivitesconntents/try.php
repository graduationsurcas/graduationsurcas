<?php

include_once './server/config.php';
include_once './server/appdboperations.php';

print_r(appdboperations::getServiceProviderInformation(1));



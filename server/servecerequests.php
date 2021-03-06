<?php

header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');
session_start();

if ($_SESSION['login'] && isset($_POST["destination"])) {
    include_once 'dboperation.php';
    include_once 'config.php';
    include_once 'reports.php';
    $adminid = $_SESSION['login-admin-id'];

    switch ($_POST["destination"]) {
        case "enternewplace":
            if (isset($_POST["new-place-name"]) &&
                    isset($_POST["new-place-type"]) &&
                    isset($_POST["new-place-address"]) &&
                    isset($_POST["new-place-location-latitude"]) &&
                    isset($_POST["new-place-location-Longitude"]) &&
                    isset($_POST["new-place-view"]) &&
                    isset($_POST["new-place-desc"]) &&
                    isset($_FILES["file"])
            ) {
                dboperation::newPlace($_SESSION['login-admin-id'], 
                        $_POST["new-place-name"], $_POST["new-place-type"],
                        $_POST["new-place-address"],
                        $_POST["new-place-location-latitude"], 
                        $_POST["new-place-location-Longitude"],
                        $_POST["new-place-view"], $_POST["new-place-desc"],
                        $_FILES["file"]);
                dboperation::action_report(ADDNEWPLACE, $adminid);
            } else {
                parmNotAccess();
            }
            break;
        case "placespagelist":
            if (isset($_POST['selectfrom']) && isset($_POST['selectamount'])) {
                echo dboperation::getPlacesList($_POST['selectfrom'], $_POST['selectamount']);
            } else {
                parmNotAccess();
            }
            break;
        case "itemspagelist":
            if (isset($_POST['selectfrom']) && isset($_POST['selectamount'])) {
                echo dboperation::getItemsList($_POST['selectfrom'], $_POST['selectamount']);
            } else {
                parmNotAccess();
            }
            break;
            
        case "placessearch":
            if (isset($_POST['searchkey'])) {
                dboperation::placeSearch($_POST['searchkey']);
            } else {
                parmNotAccess();
            }
            break;
        case "itemssearch":
            if (isset($_POST['searchkey'])) {
                dboperation::itemsSearch($_POST['searchkey']);
            } else {
                parmNotAccess();
            }
            break;
        case "itemupdate":

            if (isset($_POST['itemid']) &&
                    isset($_POST['itemtype']) &&
                    isset($_POST['itemname']) &&
                    isset($_POST['itemview']) &&
                    isset($_POST['itemview'])
            ) {
                dboperation::updateItem($_POST['itemid'], $_POST['itemtype'], $_POST['itemname'], ($_POST['itemview'] == 1) ? 1 : 0, $_POST['itemdescription']);
                $report = UPDATEITAM . " | item id = " . $_POST['itemid'];
                dboperation::action_report($report, $adminid);
            } else {
                parmNotAccess();
            }
            break;
        case "placeupdate":
            if (isset($_POST['placetype']) &&
                    isset($_POST['placename']) &&
                    isset($_POST['placeaddress']) &&
                    isset($_POST['placelocationlat']) &&
                    isset($_POST['placelocationlng']) &&
                    isset($_POST['placedescription']) &&
                    isset($_POST['placview']) &&
                    isset($_POST['placeid'])
            ) {

                dboperation::updatePlaces($_POST['placeid'], $_POST['placetype'], $_POST['placename'], $_POST['placeaddress'], $_POST['placelocationlat'], $_POST['placelocationlng'], $_POST['placview'], $_POST['placedescription']);
                $report = UPDATEPLACE . " | place id = " . $_POST['placeid'];
                dboperation::action_report($report, $adminid);
            } else {
                parmNotAccess();
            }
            break;

        case "placeremove": {
                if (isset($_POST['placeid']) && isset($_POST['pass'])) {
                    include_once '../class/cryptpass.php';
                    $email = strval($_SESSION['login-admin-email']);
                    dboperation::removePlaces($_POST['placeid'], $_POST['pass'], $email);
                    $report = REMOVEPLCAE . " | place id = " . $_POST['placeid'];
                    dboperation::action_report($report, $adminid);
                }
            }break;
        case "itemremove": {
                if (isset($_POST['itemid']) && isset($_POST['pass'])) {

                    include_once '../class/cryptpass.php';
                    $email = strval($_SESSION['login-admin-email']);
                    dboperation::removeItem($_POST['itemid'], $_POST['pass'], $email);
                    $report = REMOVEITEM . " | item id = " . $_POST['itemid'];
                    dboperation::action_report($report, $adminid);
                }
            }break;
            
            
            case "sheararearemove": {
                if (isset($_POST['itemid']) && isset($_POST['pass'])) {

                    include_once '../class/cryptpass.php';
                    $email = strval($_SESSION['login-admin-email']);
                    dboperation::removesharearea($_POST['itemid'], $_POST['pass'], $email);
                    $report = REMOVEITEM . " | item id = " . $_POST['itemid'];
                    dboperation::action_report($report, $adminid);
                }
            }break;
            
            case "feedbackremove": {
                if (isset($_POST['itemid']) && isset($_POST['pass'])) {

                    include_once '../class/cryptpass.php';
                    $email = strval($_SESSION['login-admin-email']);
                    dboperation::removefeedback($_POST['itemid'], $_POST['pass'], $email);
                    $report = REMOVEITEM . " | item id = " . $_POST['itemid'];
                    dboperation::action_report($report, $adminid);
                }
            }break;
        case "newitem": {
                if (
                        $_POST['new_item_place'] &&
                        $_POST['new_item_type'] &&
                        $_POST['new_item_name'] &&
                        $_POST['new_item_description'] &&
                        $_POST['new_item_view'] &&
                        $_FILES["file"]
                ) {
                    dboperation::newItem($_SESSION['login-admin-id'], $_POST['new_item_type'], $_POST['new_item_place'], $_POST['new_item_name'], $_POST['new_item_description'], ($_POST['new_item_view'] == '2') ? 0 : 1, $_FILES["file"]);
                    dboperation::action_report(ADDNEWITEM, $adminid);
                } else {
                    
                }
            }break;
        case"itemimages": {
                if ($_POST["itemid"]) {
                    echo dboperation::getItemsImages($_POST["itemid"]);
                }
            }break;
        case"commentremove": {
                if (isset($_POST["commentid"])) {
                    echo dboperation::removeItemComment($_POST["commentid"]);
                }
            }break;
        case "commentpagelist":
            if (isset($_POST['selectfrom']) && isset($_POST['selectamount'])) {
                echo dboperation::getItemsCommentsList($_POST['selectfrom'], $_POST['selectamount']);
            } else {
                parmNotAccess();
            }
            break;
        case "singleitemcomment":
            if (isset($_POST['selectfrom']) && isset($_POST['selectamount']) && $_POST["itemid"]) {
                echo dboperation::getItemCommentsList($_POST['selectfrom'], $_POST['selectamount'], $_POST["itemid"]);
            } else {
                parmNotAccess();
            }
            break;
        case "singleitemcommentscount":
            if (isset($_POST["itemid"])) {
                echo dboperation::itemCommentsTotalCount($_POST["itemid"]);
            } else {
                parmNotAccess();
            }
            break;
        case "serviceproviderupdate":
            if (isset($_POST['id']) &&
                    isset($_POST['name']) &&
                    isset($_POST['phone']) &&
                    isset($_POST['email']) &&
                    isset($_POST['accountstatus'])
            ) {
                $accountstatus = ($_POST['accountstatus'] == "block") ? "true" : "false";
                dboperation::updateServiceProvider($_POST['id'], $_POST['name'], $_POST['email'], $_POST['phone'], $accountstatus);
                $report = UPDATESERVICEPROVIDER . " | Service proivder id = " . $_POST['id'];
                dboperation::action_report($report, $adminid);
            } else {
                parmNotAccess();
            }
            break;
        case "serviceproviderupdatepass":
            if (isset($_POST['id']) &&
                    isset($_POST['pass'])
            ) {
                include_once '../class/cryptpass.php';
                dboperation::updateServiceProviderPassword($_POST['id'], $_POST['pass']);
            } else {
                parmNotAccess();
            }
            break;
        case "serviceproviderremove": {
                if (isset($_POST['serviceproviderid']) && isset($_POST['pass'])) {
                    include_once '../class/cryptpass.php';
                    $email = strval($_SESSION['login-admin-email']);
                    dboperation::removeServiceProvider($_POST['serviceproviderid'], $_POST['pass'], $email);
                    $report = REMOVESERVICEPROVIDER . " | Service proivder id = " . $_POST['serviceproviderid'];
                    dboperation::action_report($report, $adminid);
                }
            }break;
        case "serviceproviderslist":
            if (isset($_POST['selectfrom']) && isset($_POST['selectamount'])) {
                echo dboperation::getServiceProvidersList($_POST['selectfrom'], $_POST['selectamount']);
            } else {
                parmNotAccess();
            }
            break;
        case "servicerequestslist":
            if (isset($_POST['selectfrom']) && isset($_POST['selectamount'])) {
                echo dboperation::getServiceRequestsList($_POST['selectfrom'], $_POST['selectamount']);
            } else {
                parmNotAccess();
            }
            break;
        case "service":
            if (isset($_POST['selectfrom']) && isset($_POST['selectamount'])) {
                echo dboperation::getServiceRequests($_POST['selectfrom'], $_POST['selectamount']);
            } else {
                parmNotAccess();
            }
            break;

        case "getserviseproviderinfo":
            if (isset($_POST['providerid'])) {
                echo dboperation::getServiceProviderInfo($_POST['providerid']);
            } else {
                parmNotAccess();
            }

            break;

        case "removeservicerequest":
            if (isset($_POST['servicerequestid'])) {
                echo dboperation::removeServiceRequests($_POST['servicerequestid']);
            } else {
                parmNotAccess();
            }break;
        case "confirmservicerequest":
            if (isset($_POST['servicerequestid'])) {
                echo dboperation::confirmServiceRequests($_POST['servicerequestid'], $adminid);
            } else {
                parmNotAccess();
            }break;

        case "getusercount":
            echo json_encode(dboperation::getUserCount());

            break;

        case "getstatisticscount":
            echo json_encode(dboperation::getStatisticsCount());
            break;
        default:
            break;
        case "enternewadmin":
            if (isset($_POST["new-admin-type"]) &&
                    isset($_POST["new-admin-name"]) &&
                    isset($_POST["new-email-email"]) &&
                    isset($_POST["new-admin-password"])
            ) {
                include_once '../class/cryptpass.php';
                dboperation::newadmin( $_POST["new-admin-name"],
                        $_POST["new-email-email"], $_POST["new-admin-type"],
                        $_POST["new-admin-password"]);
                dboperation::action_report(ADDNEWADMIN, $_SESSION['login-admin-name']);
            } else {
                parmNotAccess();
            }
            break;
            case "enternewplacetype":
            if (isset($_POST["new-place-name"])
            ) {
                include_once '../class/cryptpass.php';
                dboperation::addnewaplace( $_POST["new-place-name"]);
                dboperation::action_report(ADDNEWADMIN, $_SESSION['login-admin-name']);
            } else {
                parmNotAccess();
            }
            break;
            case "updateconstant":
            if (isset($_POST["constantid"]) &&
                    isset($_POST["new-constant-title"])
            ) {
                dboperation::updatePlacesNavTap( $_POST["constantid"],$_POST["new-constant-title"]);
                dboperation::action_report(ADDNEWADMIN, $_SESSION['login-admin-name']);
            } else {
                parmNotAccess();
            }
            break;
            case "enternewservicestype":
            if (isset($_POST["new-services-type"])
            ) {
                include_once '../class/cryptpass.php';
                dboperation::addnewaservices( $_POST["new-services-type"]);
                dboperation::action_report(ADDNEWADMIN, $_SESSION['login-admin-name']);
            } else {
                parmNotAccess();
            }
            break;
            case "enternewitemtype":
            if (isset($_POST["new-item-type"])
            ) {
                include_once '../class/cryptpass.php';
                dboperation::addnewaitem( $_POST["new-item-type"]);
                dboperation::action_report(ADDNEWADMIN, $_SESSION['login-admin-name']);
            } else {
                parmNotAccess();
            }
            break;
            case "resetadminpass":
                    if (isset($_POST["new-useremail-rest"])) {
             include_once '../class/cryptpass.php';
            include_once './Services.php';
             dboperation::restpass( $_POST["new-useremail-rest"]);
            }
            break;
            case "updateprofile":
                    if (isset($_POST["user-profile-name"])&&isset($_POST["user-profile-email"])
                            &&isset($_POST["user-profile-password-new"])&&isset($_POST["user-profile-password-old"])) {
             include_once '../class/cryptpass.php';
             dboperation::updateuserprofile($_SESSION['login-admin-id'], $_POST["user-profile-email"], 
                     $_POST["user-profile-name"], $_POST["user-profile-password-old"],
                     $_POST["user-profile-password-new"]);
            }
            break;
            case "addnewnotification":
                    if (isset($_POST["add-new-notification"])) {
             include_once '../class/cryptpass.php';
             dboperation::addnewNotification($_POST["add-new-notification"]);
            }
            break;
//             'remove-service-id': $("#remove-service-id").val(),
//            'remove-service-admin-pass': $('input[id=remove-service-admin-pass]').val()
            case "serviceremove":
             include_once '../class/cryptpass.php';
                 $email = strval($_SESSION['login-admin-email']);
             dboperation::removeService($_POST["remove-service-id"], $_POST["remove-service-admin-pass"],$email);
          
            break;
        
    }

    function parmNotAccess() {
        $response = array("status" => "false", "message" => "one of parm's is not accessible");
        echo json_encode($response);
    }

}


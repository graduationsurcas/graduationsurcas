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
            if (isset($_POST["placename"]) &&
                    isset($_POST["placetype"]) &&
                    isset($_POST["placeaddress"]) &&
                    isset($_POST["placelocationlat"]) &&
                    isset($_POST["placelocationlng"]) &&
                    isset($_POST["placview"]) &&
                    isset($_POST["placedescription"])
            ) {
                dboperation::newPlace($_SESSION['login-admin-id'], $_POST["placename"], $_POST["placetype"], $_POST["placeaddress"], $_POST["placelocationlat"], $_POST["placelocationlng"], $_POST["placview"], $_POST["placedescription"]);
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
    }

    function parmNotAccess() {
        $response = array("status" => "false", "message" => "one of parm's is not accessible");
        echo json_encode($response);
    }

}



<?php
class Bootstrap
{
    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        // print_r($url);
        $lenurl = count($url);
        // print_r($url);

        if (empty($url[0])) {
            require_once "projects/common/vendor/Controller.php";
            require_once 'projects/common/controllers/default/indexController.php';
            $object_controller = new IndexController();
            $object_controller->index();
            return false;
        }
        else if($url[0] == "master"){
            require_once "projects/common/vendor/Controller.php";
            require_once 'projects/common/controllers/default/masterController.php';
            $object_controller = new masterController();
            $object_controller->index();
            return false;
        }
        else {
            $project = $url[0]; //lenurl = 1

            if ($project == 'pi') {

                if ($lenurl < 2) {
                    // echo "ERR 404: Request not found! 1";
                    // return false;
                    require_once "projects/" . $project . "/vendor/Controller.php";
                    require_once "projects/" . $project . "/controllers/default/indexController.php";
                    $object_controller = new IndexController();
                    $object_controller->index();
                }
                $ctrlerSubPath = "";
                for ($i = 1; $i < $lenurl - 1; $i++) {
                    $ctrlerSubPath = $ctrlerSubPath . $url[$i] . '/';
                }
                $controller = $url[$lenurl - 1] . "Controller";
                // echo $ctrlerSubPath;
                // echo $controller;
                $ctrlerPath = "";

                if (file_exists("projects/" . $project . "/controllers/default/" . $ctrlerSubPath . '/' . $controller . ".php")) {
                    $ctrlerPath = "projects/" . $project . "/controllers/default/" . $ctrlerSubPath . '/' . $controller . ".php";
                } elseif (file_exists("projects/" . $project . "/controllers/users/" . $ctrlerSubPath . '/' . $controller . ".php")) {
                    $ctrlerPath = "projects/" . $project . "/controllers/users/" . $ctrlerSubPath . '/' . $controller . ".php";
                } elseif (file_exists("projects/" . $project . "/controllers/admin/" . $ctrlerSubPath . '/' . $controller . ".php")) {
                    $ctrlerPath = "projects/" . $project . "/controllers/admin/" . $ctrlerSubPath . '/' . $controller . ".php";
                } else {
                    $ctrlerPath = "";
                }

                if ($ctrlerPath != "") {
                    require_once "projects/pi/vendor/Controller.php";
                    require_once $ctrlerPath;
                    $object_controller = new $controller;
                    $object_controller->index();
                } else {
                    echo "ERR 404: Request not found! 2";
                    return false;
                }
            } elseif ($project == 'qc') {
                if ($lenurl < 2) {
                    // echo "ERR 404: Request not found! 1";
                    // return false;
                    require_once "projects/" . $project . "/vendor/Controller.php";
                    require_once "projects/" . $project . "/controllers/default/indexController.php";
                    $object_controller = new IndexController();
                    $object_controller->index();
                    return false;
                }
                $ctrlerSubPath = "";
                for ($i = 1; $i < $lenurl - 1; $i++) {
                    $ctrlerSubPath = $ctrlerSubPath . $url[$i] . '/';
                }
                $controller = $url[$lenurl - 1] . "Controller";
                // echo $ctrlerSubPath;
                // echo $controller;
                $ctrlerPath = "";

                if (file_exists("projects/" . $project . "/controllers/default/" . $ctrlerSubPath . '/' . $controller . ".php")) {
                    $ctrlerPath = "projects/" . $project . "/controllers/default/" . $ctrlerSubPath . '/' . $controller . ".php";
                } elseif (file_exists("projects/" . $project . "/controllers/users/" . $ctrlerSubPath . '/' . $controller . ".php")) {
                    $ctrlerPath = "projects/" . $project . "/controllers/users/" . $ctrlerSubPath . '/' . $controller . ".php";
                } elseif (file_exists("projects/" . $project . "/controllers/admin/" . $ctrlerSubPath . '/' . $controller . ".php")) {
                    $ctrlerPath = "projects/" . $project . "/controllers/admin/" . $ctrlerSubPath . '/' . $controller . ".php";
                } else {
                    $ctrlerPath = "";
                }

                if ($ctrlerPath != "") {
                    require_once "projects/qc/vendor/Controller.php";
                    require_once $ctrlerPath;
                    $object_controller = new $controller;
                    $object_controller->index();
                } else {
                    echo "ERR 404: Request not found!";
                    return false;
                }
            } else {
                echo "ERR 404: Request not found!";
                return false;
            }
        }
    }
}
?>
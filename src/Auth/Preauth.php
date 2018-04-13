<?php

namespace Pdsi\Auth;

use Pdsi\Contract\Auth\Preauth as PreauthContract;
use DartoHelm\App\Satellite;
use Pdsi\DartoHelm\DartoSqlUtils;
use Pdsi\DartoHelm\DartoUserHandler;

class Preauth implements PreauthContract {

    public $preauth;
    public $preauth_secret;
    public $redirect_to;

    public function __construct($configPreauth)
    {
        $this->preauth = $configPreauth['preauth'];
        $this->preauth_secret = $configPreauth['preauth_secret'];
        $this->redirect_to = $configPreauth['redirectTo'];
    }

    public function authenticate()
    {
        $sat = new Satellite(
            $this->preauth,
            $this->preauth_secret,
            DartoUserHandler::class,
            DartoSqlUtils::class
        );

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Content-Type: application/json');
            echo json_encode($sat->processServerPreauthReq());
        } else {
            if (!empty($_SESSION['authenticated'])) { //logged in user
                unset($_SESSION['authenticated']); // unset session
                unset($_SESSION['user_data']); // unset session
            }

            $ret = $sat->verifyTokenRedirect();

            if (array_key_exists('error', $ret)) {
                echo "invalid token";
                return;
            }

            header("Location: {$this->redirect_to}");
            ## $this->redirect('/index.php/site/index');
        }
    }

}

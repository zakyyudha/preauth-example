<?php

namespace Pdsi\DartoHelm;

use Adldap\Adldap;
use Adldap\Models\ModelNotFoundException;
use DartoHelm\Handler\User;

class DartoUserHandler extends User{

    public $ldapConnect;
    public $ldap;
//
//    public function __construct($configLdap)
//    {
//        $this->ldapConnect = new Adldap();
//        $this->ldapConnect->addProvider($configLdap);
//        $this->ldap = $this->ldapConnect->connect();
//    }

    public function find($username)
    {
        $this->ldapConnect = new Adldap();
        $this->ldapConnect->addProvider($this->getConfig());
        $this->ldap = $this->ldapConnect->connect();
        try{
            $data = $this->ldap->search()->findByOrFail('uid', $username);
        }catch (ModelNotFoundException $e){
            return false;
        }

        return [
            'username' => $data->uid[0],
            'nama' => $data->sn[0],
            'uid' => $data->uid[0]
        ];
    }

    public function setLogin($username)
    {
        $_SESSION['user_data'] = $this->find($username);;
        $_SESSION['authenticated'] = true;
    }

    public function getConfig()
    {
        return include(__DIR__ . '/../../config/ldap.php');
    }
}
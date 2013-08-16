<?php

namespace VJ\Models;

class User extends \Phalcon\Mvc\Collection
{

    public $_id;

    public $luser;

    public $nick;

    public $lnick;

    public $salt;

    public $pass;

    public $new_pass;       // should be true

    public $mail;

    public $qq;

    public $rp;

    public $vjb;

    public $rank;

    public $g;              //gravatar email

    public $gmd5;

    public $gender;

    public $tlogin;

    public $iplogin;

    public $treg;

    public $ipreg;

    public $sig;            //signature

    public $sigm;

    public $group;

    public $priv;           //privilege

    public $privacy;

    public $stars;

    public $pbms;

    public $settings;

    public function getSource()
    {
        return 'User';
    }

}
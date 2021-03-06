<?php

namespace VJ\Models;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document */
class User
{

    /** @ODM\Id */
    public $id;

    /** @ODM\String */
    public $uid;

    /** @ODM\String */
    public $luser;

    /** @ODM\String */
    public $nick;

    /** @ODM\String */
    public $lnick;

    /** @ODM\String */
    public $salt;

    /** @ODM\String */
    public $pass;

    /** @ODM\String */
    public $passfmt; // should always be 1

    /** @ODM\String */
    public $ipmatch;

    /** @ODM\String */
    public $mail;

    /** @ODM\String */
    public $qq;

    /** @ODM\Float */
    public $rp;

    /** @ODM\Float */
    public $vjb;

    /** @ODM\Int */
    public $rank;

    /** @ODM\String */
    public $g; //gravatar email

    /** @ODM\String */
    public $gmd5;

    /** @ODM\String */
    public $gender;

    /** @ODM\Date */
    public $tlogin;

    /** @ODM\String */
    public $iplogin;

    /** @ODM\Date */
    public $treg;

    /** @ODM\String */
    public $ipreg;

    /** @ODM\String */
    public $sig; //signature

    /** @ODM\String */
    public $sigm;

    /** @ODM\String */
    public $group;

    /** @ODM\String */
    public $acl; //privilege

    /** @ODM\String */
    public $aclrule;

    /** @ODM\Hash */
    public $privacy;

    /** @ODM\Hash */
    public $stars;

    /** @ODM\Hash */
    public $pbms;

    /** @ODM\Hash */
    public $settings;

    /** @ODM\String */
    public $banned;

    /** @ODM\String */
    public $deleted;

}
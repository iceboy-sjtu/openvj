<?php

namespace VJ\User\Account;

use \VJ\I;
use \VJ\Utils;
use \VJ\Models;

class Login
{

    const LOGIN_FROM_AUTH   = 0;
    const LOGIN_FROM_COOKIE = 1;
    const LOGIN_FROM_CERT   = 2;
    const LOGIN_FROM_API    = 3;
    const LOGIN_FROM_SSH    = 4;
    const LOGIN_FROM_MC     = 5;

    /**
     * 使用COOKIE登录
     *
     * @param $token
     * @param $uid
     * @param $key
     *
     * @return array
     */
    public static function fromCookie($token, $uid, $key)
    {

        $token = \VJ\Validator::mongoId($token);
        if ($token == null) {
            return I::error('ARGUMENT_INVALID', 'token');
        }

        $uid = (int)$uid;
        $key = (string)$key;

        global $mongo;
        $res = $mongo->SavedSession->findOne(['_id' => $token]);

        if ($res == null) {
            return I::error('FAILED');
        }

        // Valid?
        if ($res['_id'] !== $uid || $res['key'] !== $key) {
            return I::error('FAILED');
        }

        // Session expired?
        if (time() > $res['exptime']->sec) {

            $mongo->SavedSession->remove(['_id' => $token], ['justOne' => true]);

            return I::error('FAILED');

        }

        $res = $mongo->User->findOne(['_id' => $uid]);
        // User is deleted
        if ($res == null) {
            return I::error('FAILED');
        }

        // Login succeeded
        self::_log($uid, self::LOGIN_FROM_COOKIE, true);

        unset($res['salt'], $res['pass']);

        return $res;

    }

    /**
     * 尝试使用用户名密码登录
     *
     * @param     $user
     * @param     $pass_md5
     * @param int $from
     *
     * @return array
     */
    public static function fromPassword($user, $pass, $from = self::LOGIN_FROM_AUTH, $md5 = false)
    {

        $user = strtolower($user);
        $pass = (string)$pass;

        if (strlen($user) === 0) {
            return I::error('ARGUMENT_REQUIRED', 'username');
        }

        if (strlen($pass) === 0) {
            return I::error('ARGUMENT_REQUIRED', 'password');
        }

        $u = Models\User::findFirst([
            'conditions' => ['luser' => $user]
        ]);

        if (!$u) {
            return I::error('USER_NOTFOUND');
        }

        if (isset($u->new_pass)) {
            // This account uses a newer password hashing method
            $hash = \VJ\User\Account::makeHash($pass, $u->salt, $md5);
        } else {
            // An older hashing method
            $hash = \VJ\User\Account::makeHash_deprecated($user, $pass, $u->salt, $md5);
        }

        if ($u->pass !== $hash) {
            $login_OK = false;
        } else {
            $login_OK = true;
        }

        self::_log($u->_id, $from, $login_OK);

        if (!$login_OK) {
            return I::error('PASSWORD_WRONG');
        }

        // Upgrade old passwords
        if (!isset($u->new_pass) && $md5 == false) {
            $u->salt = \VJ\Security\Randomizer::toHex(30);
            $u->pass = \VJ\User\Account::makeHash($pass, $u->salt);
            $u->save();
        }

        $res = (array)$u;
        unset($res['salt'], $res['pass']);

        return $res;

    }

    /**
     * 增加登录记录
     *
     * @param $uid
     * @param $from
     * @param $ok
     */
    private static function _log($uid, $from, $ok)
    {

        global $mongo;

        $uid  = (int)$uid;
        $from = (int)$from;
        $ok   = (bool)$ok;

        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            $ua = \VJ\Escaper::html(Utils::strcut($_SERVER['HTTP_USER_AGENT']));
        } else {
            $ua = '';
        }

        $mongo->LoginInfo->insert([

            'time' => new \MongoDate(),
            'uid'  => $uid,
            'ok'   => $ok,
            'from' => $from,
            'ip'   => \VJ\Escaper::html($_SERVER['REMOTE_ADDR']),
            'ua'   => $ua

        ]);

    }

    /**
     * 登录为用户
     *
     * @param $data
     *
     * @return array|bool
     */
    public static function user($data)
    {

        global $mongo, $__SESSION, $__GROUP_PRIV;

        $priv = $data['priv'] + $__GROUP_PRIV[(int)$data['group']];

        // 检查该账号是否可登录
        if (!isset($priv[PRIV_LOG_IN]) || $priv[PRIV_LOG_IN] !== false) {
            return I::error('NO_PRIV', 'PRIV_LOG_IN');
        }

        // 修改最后登录时间
        $mongo->User->update(['_id' => $data['_id']], [
            '$set' => [

                'tlogin'  => time(),
                'iplogin' => \VJ\Escaper::html($_SERVER['REMOTE_ADDR'])

            ]
        ]);

        $u_data = \VJ\Validator::filter($data, [

            'nick'     => null,
            'gmd5'     => null,
            'group'    => 'int',
            'rank'     => null,
            'rp'       => null,
            'vjb'      => null,
            'settings' => null

        ]);

        $u_data['id']   = (int)$data['_id'];
        $u_data['priv'] = $priv;

        $__SESSION->set('user', $u_data);

        return true;

    }

    /**
     * 登录为游客
     *
     * @return bool
     */
    public static function guest()
    {

        global $__SESSION, $__GROUP_PRIV;

        $__SESSION->set('user', [

            'id'       => UID_GUEST,
            'nick'     => NICK_GUEST,
            'gmd5'     => '',
            'group'    => GROUP_GUEST,
            'rank'     => 0,
            'rp'       => 0.0,
            'vjb'      => 0.0,
            'priv'     => $__GROUP_PRIV[GROUP_GUEST],
            'settings' => []

        ]);

        return true;

    }

}
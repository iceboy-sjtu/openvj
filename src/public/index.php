<?php

require __DIR__.'/../app/includes/init.php';

//============================================

global $__CONFIG;

\VJ\Phalcon::initView();
\VJ\Phalcon::initSession();

if ($__CONFIG->Security->forceSSL) {
    \VJ\Security\SSL::force();
}

\VJ\Security\CSRF::initToken();
\VJ\Security\Session::initCharacter();

\VJ\User\Security\Privilege::initialize();
\VJ\User\Account::initialize();

//============================================

$app = new \Phalcon\Mvc\Application(\Phalcon\DI::getDefault());
echo $app->handle()->getContent();

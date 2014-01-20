<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

if (NOS_ENTRY_POINT != 'admin') {
    return ;
}

// On login success
\Event::register('admin.loginSuccess', function () {
    $user = Session::user();
    \Nos\Login\Model_Login::add('login', array(
        'driver'    => 'nos',
        'method'    => 'form',
        'state'     => 'success',
        'login'     => $user->user_email,
        'user_id'   => $user->user_id,
    ));
});

// On login fail
\Event::register('admin.loginFail', function () {
    \Nos\Login\Model_Login::add('login', array(
        'driver'    => 'nos',
        'method'    => 'form',
        'state'     => 'fail',
        'login'     => \Input::post('email'),
    ));
});

// On autologin success
\Event::register('admin.loginSuccessWithCookie', function () {
    $user = Session::user();
    \Nos\Login\Model_Login::add('login', array(
        'driver'    => 'nos',
        'method'    => 'cookie',
        'state'     => 'success',
        'login'     => $user->user_email,
        'user_id'   => $user->user_id,
    ));
});

// On autologin fail
\Event::register('admin.loginFailWithCookie', function () {
    $user = Session::user();
    \Nos\Login\Model_Login::add('login', array(
        'driver'    => 'nos',
        'method'    => 'cookie',
        'state'     => 'success',
        'login'     => $user->user_email,
        'user_id'   => $user->user_id,
    ));
});

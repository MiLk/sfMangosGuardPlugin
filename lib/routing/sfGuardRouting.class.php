<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id$
 */
class sfGuardRouting
{
  /**
   * Listens to the routing.load_configuration event.
   *
   * @param sfEvent An sfEvent instance
   * @static
   */
  static public function listenToRoutingLoadConfigurationEvent(sfEvent $event)
  {
    $r = $event->getSubject();

    // preprend our routes
    $r->prependRoute('sf_guard_signin', new sfRoute('/guard/login', array('module' => 'sfGuardAuth', 'action' => 'signin'))); 
    $r->prependRoute('sf_guard_signout', new sfRoute('/guard/logout', array('module' => 'sfGuardAuth', 'action' => 'signout'))); 
  }

  static public function addRouteForForgotPassword(sfEvent $event)
  {
    $r = $event->getSubject();

    $r->prependRoute('sf_guard_forgot_password', new sfRoute('/guard/forgot_password', array('module' => 'sfGuardForgotPassword', 'action' => 'index')));
    $r->prependRoute('sf_guard_forgot_password_change', new sfDoctrineRoute('/guard/forgot_password/:unique_key', array(
      'module' => 'sfGuardForgotPassword',
      'action' => 'change'
    ), array(
      'sf_method' => array('get', 'post')
    ), array(
      'model' => 'sfGuardForgotPassword',
      'type' => 'object'
    )));
  }

  /**
   * Adds an sfRoute for registration.
   *
   * @param sfEvent $event
   * @static
   */
  static public function addRouteForRegister(sfEvent $event)
  {
    $event->getSubject()->prependRoute('sf_guard_register', new sfRoute('/guard/register', array('module' => 'sfGuardRegister', 'action' => 'index'))); 
  }
}

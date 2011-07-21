<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Processes the "remember me" cookie.
 * 
 * This filter should be added to the application filters.yml file **above**
 * the security filter:
 * 
 *    remember_me:
 *      class: sfGuardRememberMeFilter
 * 
 *    security: ~
 * 
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id$
 */
class sfGuardRememberMeFilter extends sfFilter
{

  /**
   * Executes the filter chain.
   *
   * @param sfFilterChain $filterChain
   */
  public function execute($filterChain)
  {
    $cookieName = sfConfig::get('app_sf_guard_plugin_remember_cookie_name','sfRemember');

    if(
      $this->isFirstCall()
      &&
      $this->context->getUser()->isAnonymous()
      &&
      $cookie = $this->context->getRequest()->getCookie($cookieName)
    )
    {
      $remkey = Doctrine_Core::getTable('sfGuardRememberKey')->createQuery('r')
        ->select('r.user_id')
        ->where('r.remember_key = ?',$cookie);

      if($remkey->count())
      {
        $account_id = $remkey->fetchOne()->getUserId();

        $q = Doctrine_Core::getTable('Account')->createQuery('r')
          ->where('r.id = ?',$account_id);

        if($q->count())
        {
          $this->context->getUser()->signIn($q->fetchOne());
        }
      }
    }

    $filterChain->execute();
  }

}

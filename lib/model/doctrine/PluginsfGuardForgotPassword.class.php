<?php

/**
 * PluginsfGuardForgotPassword
 * 
 * @property Account $User
 *
 * @method Account            getUser()         Returns the current record's "User" value
 * @method sfGuardRememberKey setUser()         Sets the current record's "User" value
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class PluginsfGuardForgotPassword extends BasesfGuardForgotPassword
{

  public function setUp()
  {
    parent::setUp();
    $this->hasOne('Account as User',array(
     'local' => 'user_id',
     'foreign' => 'id',
     'onDelete' => 'CASCADE'));
  }

}
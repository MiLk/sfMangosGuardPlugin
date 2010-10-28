<?php

/**
 * Remember me model.
 * 
 * @property Account $User
 *
 * @method Account            getUser()         Returns the current record's "User" value
 * @method sfGuardRememberKey setUser()         Sets the current record's "User" value
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage model
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id$
 */
abstract class PluginsfGuardRememberKey extends BasesfGuardRememberKey
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

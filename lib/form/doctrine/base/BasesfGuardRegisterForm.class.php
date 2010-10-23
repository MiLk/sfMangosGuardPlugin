<?php

/**
 * BasesfGuardRegisterForm for registering new users
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id: BasesfGuardChangeUserPasswordForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class BasesfGuardRegisterForm extends sfGuardUserAdminForm
{
  public function setup()
  {
    parent::setup();

    unset(
      $this['gmlevel'],
      $this['joindate'],
      $this['last_ip'],
      $this['locked'],
      $this['active_realm_id'],
      $this['mutetime'],
      $this['locale']
    );

    $this->widgetSchema['sha_pass_hash']->setLabel('Password');
    $this->validatorSchema['sha_pass_hash']->setOption('required', true);
  }
}
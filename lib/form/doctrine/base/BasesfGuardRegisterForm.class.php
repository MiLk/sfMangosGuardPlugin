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

  /**
   * Process a cleaned up value before it is used by the updateObject() method.
   *
   * Set the username in uppercase
   *
   * The method return the processed value or false to remove the value
   * from the array of cleaned up values.
   */
  public function updateUsernameColumn($value)
  {
    if(!empty($value)) $value = strtoupper($value);
    return $value;
  }

  /**
   * Process a cleaned up value before it is used by the updateObject() method.
   *
   * Encrypt the password with the algorythm used by MaNGOS
   *
   * The method return the processed value or false to remove the value
   * from the array of cleaned up values.
   */
  public function updateShaPassHashColumn($value)
  {
    if(!empty($value)) $value = sha1(strtoupper($this->getValue('username')).':'.strtoupper($value));
    return $value;
  }

  public function  updateObject($values = null)
  {
    parent::updateObject($values);
    $this->getObject()->__unset('joindate');
    print_r('<pre>');
    print_r($this->getObject()->getData());
    print_r('</pre>');
  }
}
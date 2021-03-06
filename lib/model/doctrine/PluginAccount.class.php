<?php

/**
 * Account
 * 
 * @property sfGuardRememberKey $RememberKeys
 * @property sfGuardForgotPassword $ForgotPassword
 *
 * @method sfGuardRememberKey    getRememberKeys()    Returns the current record's "RememberKeys" value
 * @method sfGuardForgotPassword getForgotPassword()  Returns the current record's "ForgotPassword" value
 * @method Account               setRememberKeys()    Sets the current record's "RememberKeys" value
 * @method Account               setForgotPassword()  Sets the current record's "ForgotPassword" value
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class PluginAccount extends BaseAccount
{

  public function setUp()
  {
    parent::setUp();
    $this->hasOne('sfGuardRememberKey as RememberKeys',array(
     'local' => 'id',
     'foreign' => 'user_id'));

    $this->hasOne('sfGuardForgotPassword as ForgotPassword',array(
     'local' => 'id',
     'foreign' => 'user_id'));
  }

  /**
   * Returns the string representation of the object: "Full Name (username)"
   *
   * @return string
   */
  public function __toString()
  {
    return (string) $this->getUsername();
  }

  /**
   * Sets the user password.
   *
   * @param string $password
   */
  public function setPassword($password)
  {
    if(!$password && 0 == strlen($password))
    {
      return;
    }

    $this->_set('sha_pass_hash',sha1(strtoupper($this->getUsername()).':'.strtoupper($password)));
  }

  /**
   * Returns whether or not the given password is valid.
   *
   * @param string $password
   * @return boolean
   */
  public function checkPassword($password)
  {
    return $this->checkPasswordByGuard($password);
  }

  /**
   * Returns whether or not the given password is valid.
   *
   * @param string $password
   * @return boolean
   */
  public function checkPasswordByGuard($password)
  {
    return $this->getShaPassHash() == sha1(strtoupper($this->getUsername()).':'.strtoupper($password));
  }

  /**
   * Sets the password hash.
   *
   * @param string $v
   */
  public function setPasswordHash($v)
  {
    if(!is_null($v) && !is_string($v))
    {
      $v = (string) $v;
    }

    if($this->password !== $v)
    {
      $this->_set('sha_pass_hash',$v);
    }
  }
  
  public function generatePassword()
  {
    return substr(sha1(md5(uniqid(rand(), true))),rand(0,10),rand(8,10));
  }

  public function getIsActive()
  {
    return true;
  }

}

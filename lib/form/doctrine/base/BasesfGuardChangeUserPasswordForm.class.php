<?php

/**
 * BasesfGuardChangeUserPasswordForm for changing a users password
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id: BasesfGuardChangeUserPasswordForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class BasesfGuardChangeUserPasswordForm extends BasesfGuardUserForm
{
  public function setup()
  {
    parent::setup();

    $this->useFields(array('password'));

    $this->widgetSchema['sha_pass_hash'] = new sfWidgetFormInputPassword();
    $this->validatorSchema['sha_pass_hash']->setOption('required', true);
    $this->widgetSchema['password_again'] = new sfWidgetFormInputPassword();
    $this->validatorSchema['password_again'] = clone $this->validatorSchema['sha_pass_hash'];
    $this->validatorSchema['password_again']->setOption('required', true);

    $this->mergePostValidator(new sfValidatorSchemaCompare('sha_pass_hash', sfValidatorSchemaCompare::EQUAL, 'password_again', array(), array('invalid' => 'The two passwords must be the same.')));
  }
}
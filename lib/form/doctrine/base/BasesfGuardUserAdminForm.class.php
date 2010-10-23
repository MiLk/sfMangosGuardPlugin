<?php

/**
 * BasesfGuardUserAdminForm
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id$
 */
class BasesfGuardUserAdminForm extends BaseAccountForm
{
  /**
   * @see sfForm
   */
  public function setup()
  {
    parent::setup();

    unset(
      $this['last_login'],
      $this['created_at'],
      $this['updated_at']
    );

    $this->widgetSchema['sha_pass_hash'] = new sfWidgetFormInputPassword();
    $this->validatorSchema['sha_pass_hash']->setOption('required', false);
    $this->widgetSchema['password_again'] = new sfWidgetFormInputPassword();
    $this->validatorSchema['password_again'] = clone $this->validatorSchema['sha_pass_hash'];

    $this->widgetSchema->moveField('password_again', 'after', 'sha_pass_hash');

    $this->mergePostValidator(new sfValidatorSchemaCompare('sha_pass_hash', sfValidatorSchemaCompare::EQUAL, 'password_again', array(), array('invalid' => 'The two passwords must be the same.')));
  }
}
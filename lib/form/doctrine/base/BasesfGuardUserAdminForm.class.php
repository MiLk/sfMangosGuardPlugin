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
      $this['sessionkey'],
      $this['v'],
      $this['s'],
      $this['failed_logins'],
      $this['last_login']
    );

    $this->widgetSchema['sha_pass_hash'] = new sfWidgetFormInputPassword();
    $this->validatorSchema['sha_pass_hash']->setOption('required', false);
    $this->widgetSchema['password_again'] = new sfWidgetFormInputPassword();
    $this->validatorSchema['password_again'] = clone $this->validatorSchema['sha_pass_hash'];
    $this->widgetSchema['email'] = new sfWidgetFormInputText();
    
    $expansions = array(
     0 => 'Classic',
     1 => 'Burning Crusade',
     2 => 'Wrath of The Lich King',
     3 => 'Cataclysm',
    );
    $this->widgetSchema['expansion'] = new sfWidgetFormChoice(array('choices' => $expansions));
    $this->validatorSchema['expansion'] = new sfValidatorChoice(array('choices' => $expansions));

    $this->widgetSchema->moveField('password_again', 'after', 'sha_pass_hash');

    $this->mergePostValidator(new sfValidatorSchemaCompare('sha_pass_hash', sfValidatorSchemaCompare::EQUAL, 'password_again', array(), array('invalid' => 'The two passwords must be the same.')));
  }
}
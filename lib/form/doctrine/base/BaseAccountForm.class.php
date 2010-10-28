<?php

/**
 * Account form base class.
 *
 * @method Account getObject() Returns the current form's model object
 *
 * @package    aurem
 * @subpackage form
 * @author     MiLk
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAccountForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'username'        => new sfWidgetFormInputText(),
      'sha_pass_hash'   => new sfWidgetFormInputText(),
      'gmlevel'         => new sfWidgetFormInputText(),
      'sessionkey'      => new sfWidgetFormTextarea(),
      'v'               => new sfWidgetFormTextarea(),
      's'               => new sfWidgetFormTextarea(),
      'email'           => new sfWidgetFormTextarea(),
      'joindate'        => new sfWidgetFormDateTime(),
      'last_ip'         => new sfWidgetFormInputText(),
      'failed_logins'   => new sfWidgetFormInputText(),
      'locked'          => new sfWidgetFormInputText(),
      'last_login'      => new sfWidgetFormDateTime(),
      'active_realm_id' => new sfWidgetFormInputText(),
      'expansion'       => new sfWidgetFormInputText(),
      'mutetime'        => new sfWidgetFormInputText(),
      'locale'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'username'        => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'sha_pass_hash'   => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'gmlevel'         => new sfValidatorInteger(array('required' => false)),
      'sessionkey'      => new sfValidatorString(array('required' => false)),
      'v'               => new sfValidatorString(array('required' => false)),
      's'               => new sfValidatorString(array('required' => false)),
      'email'           => new sfValidatorString(array('required' => false)),
      'joindate'        => new sfValidatorDateTime(array('required' => false)),
      'last_ip'         => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'failed_logins'   => new sfValidatorInteger(array('required' => false)),
      'locked'          => new sfValidatorInteger(array('required' => false)),
      'last_login'      => new sfValidatorDateTime(array('required' => false)),
      'active_realm_id' => new sfValidatorInteger(array('required' => false)),
      'expansion'       => new sfValidatorInteger(array('required' => false)),
      'mutetime'        => new sfValidatorInteger(array('required' => false)),
      'locale'          => new sfValidatorInteger(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Account', 'column' => array('username')))
    );

    $this->widgetSchema->setNameFormat('account[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Account';
  }

}

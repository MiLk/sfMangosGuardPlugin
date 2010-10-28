<?php

/**
 * AccountBanned form base class.
 *
 * @method AccountBanned getObject() Returns the current form's model object
 *
 * @package    aurem
 * @subpackage form
 * @author     MiLk
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAccountBannedForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'bandate'   => new sfWidgetFormInputHidden(),
      'unbandate' => new sfWidgetFormInputText(),
      'bannedby'  => new sfWidgetFormInputText(),
      'banreason' => new sfWidgetFormInputText(),
      'active'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'bandate'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('bandate')), 'empty_value' => $this->getObject()->get('bandate'), 'required' => false)),
      'unbandate' => new sfValidatorInteger(array('required' => false)),
      'bannedby'  => new sfValidatorString(array('max_length' => 50)),
      'banreason' => new sfValidatorString(array('max_length' => 255)),
      'active'    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('account_banned[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AccountBanned';
  }

}

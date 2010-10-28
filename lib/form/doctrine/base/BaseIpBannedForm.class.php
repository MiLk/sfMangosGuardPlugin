<?php

/**
 * IpBanned form base class.
 *
 * @method IpBanned getObject() Returns the current form's model object
 *
 * @package    aurem
 * @subpackage form
 * @author     MiLk
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseIpBannedForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'ip'        => new sfWidgetFormInputHidden(),
      'bandate'   => new sfWidgetFormInputHidden(),
      'unbandate' => new sfWidgetFormInputText(),
      'bannedby'  => new sfWidgetFormInputText(),
      'banreason' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'ip'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('ip')), 'empty_value' => $this->getObject()->get('ip'), 'required' => false)),
      'bandate'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('bandate')), 'empty_value' => $this->getObject()->get('bandate'), 'required' => false)),
      'unbandate' => new sfValidatorInteger(),
      'bannedby'  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'banreason' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ip_banned[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'IpBanned';
  }

}

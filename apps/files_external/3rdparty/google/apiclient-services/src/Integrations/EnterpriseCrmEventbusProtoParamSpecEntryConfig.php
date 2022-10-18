<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Integrations;

class EnterpriseCrmEventbusProtoParamSpecEntryConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $descriptivePhrase;
  /**
   * @var string
   */
  public $helpText;
  /**
   * @var bool
   */
  public $hideDefaultValue;
  /**
   * @var string
   */
  public $inputDisplayOption;
  /**
   * @var bool
   */
  public $isHidden;
  /**
   * @var string
   */
  public $label;
  /**
   * @var string
   */
  public $parameterNameOption;
  /**
   * @var string
   */
  public $subSectionLabel;
  /**
   * @var string
   */
  public $uiPlaceholderText;

  /**
   * @param string
   */
  public function setDescriptivePhrase($descriptivePhrase)
  {
    $this->descriptivePhrase = $descriptivePhrase;
  }
  /**
   * @return string
   */
  public function getDescriptivePhrase()
  {
    return $this->descriptivePhrase;
  }
  /**
   * @param string
   */
  public function setHelpText($helpText)
  {
    $this->helpText = $helpText;
  }
  /**
   * @return string
   */
  public function getHelpText()
  {
    return $this->helpText;
  }
  /**
   * @param bool
   */
  public function setHideDefaultValue($hideDefaultValue)
  {
    $this->hideDefaultValue = $hideDefaultValue;
  }
  /**
   * @return bool
   */
  public function getHideDefaultValue()
  {
    return $this->hideDefaultValue;
  }
  /**
   * @param string
   */
  public function setInputDisplayOption($inputDisplayOption)
  {
    $this->inputDisplayOption = $inputDisplayOption;
  }
  /**
   * @return string
   */
  public function getInputDisplayOption()
  {
    return $this->inputDisplayOption;
  }
  /**
   * @param bool
   */
  public function setIsHidden($isHidden)
  {
    $this->isHidden = $isHidden;
  }
  /**
   * @return bool
   */
  public function getIsHidden()
  {
    return $this->isHidden;
  }
  /**
   * @param string
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }
  /**
   * @param string
   */
  public function setParameterNameOption($parameterNameOption)
  {
    $this->parameterNameOption = $parameterNameOption;
  }
  /**
   * @return string
   */
  public function getParameterNameOption()
  {
    return $this->parameterNameOption;
  }
  /**
   * @param string
   */
  public function setSubSectionLabel($subSectionLabel)
  {
    $this->subSectionLabel = $subSectionLabel;
  }
  /**
   * @return string
   */
  public function getSubSectionLabel()
  {
    return $this->subSectionLabel;
  }
  /**
   * @param string
   */
  public function setUiPlaceholderText($uiPlaceholderText)
  {
    $this->uiPlaceholderText = $uiPlaceholderText;
  }
  /**
   * @return string
   */
  public function getUiPlaceholderText()
  {
    return $this->uiPlaceholderText;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoParamSpecEntryConfig::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoParamSpecEntryConfig');

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

namespace Google\Service\Contentwarehouse;

class NlpSemanticParsingProtoActionsOnGoogleTypedValue extends \Google\Model
{
  /**
   * @var bool
   */
  public $boolValue;
  protected $dateTimeValueType = NlpSemanticParsingProtoActionsOnGoogleDateTime::class;
  protected $dateTimeValueDataType = '';
  public $numberValue;
  /**
   * @var string
   */
  public $stringValue;

  /**
   * @param bool
   */
  public function setBoolValue($boolValue)
  {
    $this->boolValue = $boolValue;
  }
  /**
   * @return bool
   */
  public function getBoolValue()
  {
    return $this->boolValue;
  }
  /**
   * @param NlpSemanticParsingProtoActionsOnGoogleDateTime
   */
  public function setDateTimeValue(NlpSemanticParsingProtoActionsOnGoogleDateTime $dateTimeValue)
  {
    $this->dateTimeValue = $dateTimeValue;
  }
  /**
   * @return NlpSemanticParsingProtoActionsOnGoogleDateTime
   */
  public function getDateTimeValue()
  {
    return $this->dateTimeValue;
  }
  public function setNumberValue($numberValue)
  {
    $this->numberValue = $numberValue;
  }
  public function getNumberValue()
  {
    return $this->numberValue;
  }
  /**
   * @param string
   */
  public function setStringValue($stringValue)
  {
    $this->stringValue = $stringValue;
  }
  /**
   * @return string
   */
  public function getStringValue()
  {
    return $this->stringValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingProtoActionsOnGoogleTypedValue::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingProtoActionsOnGoogleTypedValue');

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

class KnowledgeAnswersIntentQuerySimpleValue extends \Google\Model
{
  /**
   * @var bool
   */
  public $boolValue;
  public $doubleValue;
  protected $identifierType = KnowledgeAnswersIntentQueryIdentifier::class;
  protected $identifierDataType = '';
  /**
   * @var string
   */
  public $intValue;
  /**
   * @var string
   */
  public $stringValue;
  /**
   * @var string
   */
  public $ungroundedValue;

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
  public function setDoubleValue($doubleValue)
  {
    $this->doubleValue = $doubleValue;
  }
  public function getDoubleValue()
  {
    return $this->doubleValue;
  }
  /**
   * @param KnowledgeAnswersIntentQueryIdentifier
   */
  public function setIdentifier(KnowledgeAnswersIntentQueryIdentifier $identifier)
  {
    $this->identifier = $identifier;
  }
  /**
   * @return KnowledgeAnswersIntentQueryIdentifier
   */
  public function getIdentifier()
  {
    return $this->identifier;
  }
  /**
   * @param string
   */
  public function setIntValue($intValue)
  {
    $this->intValue = $intValue;
  }
  /**
   * @return string
   */
  public function getIntValue()
  {
    return $this->intValue;
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
  /**
   * @param string
   */
  public function setUngroundedValue($ungroundedValue)
  {
    $this->ungroundedValue = $ungroundedValue;
  }
  /**
   * @return string
   */
  public function getUngroundedValue()
  {
    return $this->ungroundedValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersIntentQuerySimpleValue::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersIntentQuerySimpleValue');

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

class NlpSemanticParsingProtoActionsOnGoogleAogSlot extends \Google\Model
{
  /**
   * @var string
   */
  public $entityId;
  /**
   * @var int
   */
  public $numBytes;
  /**
   * @var string
   */
  public $original;
  /**
   * @var string
   */
  public $parameterName;
  protected $slotListType = NlpSemanticParsingProtoActionsOnGoogleSlotList::class;
  protected $slotListDataType = '';
  protected $slotMapType = NlpSemanticParsingProtoActionsOnGoogleSlotMap::class;
  protected $slotMapDataType = '';
  /**
   * @var int
   */
  public $startByte;
  protected $valueType = NlpSemanticParsingProtoActionsOnGoogleSlotValue::class;
  protected $valueDataType = '';

  /**
   * @param string
   */
  public function setEntityId($entityId)
  {
    $this->entityId = $entityId;
  }
  /**
   * @return string
   */
  public function getEntityId()
  {
    return $this->entityId;
  }
  /**
   * @param int
   */
  public function setNumBytes($numBytes)
  {
    $this->numBytes = $numBytes;
  }
  /**
   * @return int
   */
  public function getNumBytes()
  {
    return $this->numBytes;
  }
  /**
   * @param string
   */
  public function setOriginal($original)
  {
    $this->original = $original;
  }
  /**
   * @return string
   */
  public function getOriginal()
  {
    return $this->original;
  }
  /**
   * @param string
   */
  public function setParameterName($parameterName)
  {
    $this->parameterName = $parameterName;
  }
  /**
   * @return string
   */
  public function getParameterName()
  {
    return $this->parameterName;
  }
  /**
   * @param NlpSemanticParsingProtoActionsOnGoogleSlotList
   */
  public function setSlotList(NlpSemanticParsingProtoActionsOnGoogleSlotList $slotList)
  {
    $this->slotList = $slotList;
  }
  /**
   * @return NlpSemanticParsingProtoActionsOnGoogleSlotList
   */
  public function getSlotList()
  {
    return $this->slotList;
  }
  /**
   * @param NlpSemanticParsingProtoActionsOnGoogleSlotMap
   */
  public function setSlotMap(NlpSemanticParsingProtoActionsOnGoogleSlotMap $slotMap)
  {
    $this->slotMap = $slotMap;
  }
  /**
   * @return NlpSemanticParsingProtoActionsOnGoogleSlotMap
   */
  public function getSlotMap()
  {
    return $this->slotMap;
  }
  /**
   * @param int
   */
  public function setStartByte($startByte)
  {
    $this->startByte = $startByte;
  }
  /**
   * @return int
   */
  public function getStartByte()
  {
    return $this->startByte;
  }
  /**
   * @param NlpSemanticParsingProtoActionsOnGoogleSlotValue
   */
  public function setValue(NlpSemanticParsingProtoActionsOnGoogleSlotValue $value)
  {
    $this->value = $value;
  }
  /**
   * @return NlpSemanticParsingProtoActionsOnGoogleSlotValue
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingProtoActionsOnGoogleAogSlot::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingProtoActionsOnGoogleAogSlot');

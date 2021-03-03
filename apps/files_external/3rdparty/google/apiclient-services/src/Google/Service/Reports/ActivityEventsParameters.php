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

class Google_Service_Reports_ActivityEventsParameters extends Google_Collection
{
  protected $collection_key = 'multiValue';
  public $boolValue;
  public $intValue;
  protected $messageValueType = 'Google_Service_Reports_ActivityEventsParametersMessageValue';
  protected $messageValueDataType = '';
  public $multiIntValue;
  protected $multiMessageValueType = 'Google_Service_Reports_ActivityEventsParametersMultiMessageValue';
  protected $multiMessageValueDataType = 'array';
  public $multiValue;
  public $name;
  public $value;

  public function setBoolValue($boolValue)
  {
    $this->boolValue = $boolValue;
  }
  public function getBoolValue()
  {
    return $this->boolValue;
  }
  public function setIntValue($intValue)
  {
    $this->intValue = $intValue;
  }
  public function getIntValue()
  {
    return $this->intValue;
  }
  /**
   * @param Google_Service_Reports_ActivityEventsParametersMessageValue
   */
  public function setMessageValue(Google_Service_Reports_ActivityEventsParametersMessageValue $messageValue)
  {
    $this->messageValue = $messageValue;
  }
  /**
   * @return Google_Service_Reports_ActivityEventsParametersMessageValue
   */
  public function getMessageValue()
  {
    return $this->messageValue;
  }
  public function setMultiIntValue($multiIntValue)
  {
    $this->multiIntValue = $multiIntValue;
  }
  public function getMultiIntValue()
  {
    return $this->multiIntValue;
  }
  /**
   * @param Google_Service_Reports_ActivityEventsParametersMultiMessageValue[]
   */
  public function setMultiMessageValue($multiMessageValue)
  {
    $this->multiMessageValue = $multiMessageValue;
  }
  /**
   * @return Google_Service_Reports_ActivityEventsParametersMultiMessageValue[]
   */
  public function getMultiMessageValue()
  {
    return $this->multiMessageValue;
  }
  public function setMultiValue($multiValue)
  {
    $this->multiValue = $multiValue;
  }
  public function getMultiValue()
  {
    return $this->multiValue;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setValue($value)
  {
    $this->value = $value;
  }
  public function getValue()
  {
    return $this->value;
  }
}

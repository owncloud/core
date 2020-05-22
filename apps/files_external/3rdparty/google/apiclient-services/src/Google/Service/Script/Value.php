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

class Google_Service_Script_Value extends Google_Model
{
  public $boolValue;
  public $bytesValue;
  public $dateValue;
  protected $listValueType = 'Google_Service_Script_ListValue';
  protected $listValueDataType = '';
  public $nullValue;
  public $numberValue;
  public $protoValue;
  public $stringValue;
  protected $structValueType = 'Google_Service_Script_Struct';
  protected $structValueDataType = '';

  public function setBoolValue($boolValue)
  {
    $this->boolValue = $boolValue;
  }
  public function getBoolValue()
  {
    return $this->boolValue;
  }
  public function setBytesValue($bytesValue)
  {
    $this->bytesValue = $bytesValue;
  }
  public function getBytesValue()
  {
    return $this->bytesValue;
  }
  public function setDateValue($dateValue)
  {
    $this->dateValue = $dateValue;
  }
  public function getDateValue()
  {
    return $this->dateValue;
  }
  /**
   * @param Google_Service_Script_ListValue
   */
  public function setListValue(Google_Service_Script_ListValue $listValue)
  {
    $this->listValue = $listValue;
  }
  /**
   * @return Google_Service_Script_ListValue
   */
  public function getListValue()
  {
    return $this->listValue;
  }
  public function setNullValue($nullValue)
  {
    $this->nullValue = $nullValue;
  }
  public function getNullValue()
  {
    return $this->nullValue;
  }
  public function setNumberValue($numberValue)
  {
    $this->numberValue = $numberValue;
  }
  public function getNumberValue()
  {
    return $this->numberValue;
  }
  public function setProtoValue($protoValue)
  {
    $this->protoValue = $protoValue;
  }
  public function getProtoValue()
  {
    return $this->protoValue;
  }
  public function setStringValue($stringValue)
  {
    $this->stringValue = $stringValue;
  }
  public function getStringValue()
  {
    return $this->stringValue;
  }
  /**
   * @param Google_Service_Script_Struct
   */
  public function setStructValue(Google_Service_Script_Struct $structValue)
  {
    $this->structValue = $structValue;
  }
  /**
   * @return Google_Service_Script_Struct
   */
  public function getStructValue()
  {
    return $this->structValue;
  }
}

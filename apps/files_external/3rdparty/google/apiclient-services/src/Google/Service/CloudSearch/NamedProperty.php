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

class Google_Service_CloudSearch_NamedProperty extends Google_Model
{
  public $booleanValue;
  protected $dateValuesType = 'Google_Service_CloudSearch_DateValues';
  protected $dateValuesDataType = '';
  protected $doubleValuesType = 'Google_Service_CloudSearch_DoubleValues';
  protected $doubleValuesDataType = '';
  protected $enumValuesType = 'Google_Service_CloudSearch_EnumValues';
  protected $enumValuesDataType = '';
  protected $htmlValuesType = 'Google_Service_CloudSearch_HtmlValues';
  protected $htmlValuesDataType = '';
  protected $integerValuesType = 'Google_Service_CloudSearch_IntegerValues';
  protected $integerValuesDataType = '';
  public $name;
  protected $objectValuesType = 'Google_Service_CloudSearch_ObjectValues';
  protected $objectValuesDataType = '';
  protected $textValuesType = 'Google_Service_CloudSearch_TextValues';
  protected $textValuesDataType = '';
  protected $timestampValuesType = 'Google_Service_CloudSearch_TimestampValues';
  protected $timestampValuesDataType = '';

  public function setBooleanValue($booleanValue)
  {
    $this->booleanValue = $booleanValue;
  }
  public function getBooleanValue()
  {
    return $this->booleanValue;
  }
  /**
   * @param Google_Service_CloudSearch_DateValues
   */
  public function setDateValues(Google_Service_CloudSearch_DateValues $dateValues)
  {
    $this->dateValues = $dateValues;
  }
  /**
   * @return Google_Service_CloudSearch_DateValues
   */
  public function getDateValues()
  {
    return $this->dateValues;
  }
  /**
   * @param Google_Service_CloudSearch_DoubleValues
   */
  public function setDoubleValues(Google_Service_CloudSearch_DoubleValues $doubleValues)
  {
    $this->doubleValues = $doubleValues;
  }
  /**
   * @return Google_Service_CloudSearch_DoubleValues
   */
  public function getDoubleValues()
  {
    return $this->doubleValues;
  }
  /**
   * @param Google_Service_CloudSearch_EnumValues
   */
  public function setEnumValues(Google_Service_CloudSearch_EnumValues $enumValues)
  {
    $this->enumValues = $enumValues;
  }
  /**
   * @return Google_Service_CloudSearch_EnumValues
   */
  public function getEnumValues()
  {
    return $this->enumValues;
  }
  /**
   * @param Google_Service_CloudSearch_HtmlValues
   */
  public function setHtmlValues(Google_Service_CloudSearch_HtmlValues $htmlValues)
  {
    $this->htmlValues = $htmlValues;
  }
  /**
   * @return Google_Service_CloudSearch_HtmlValues
   */
  public function getHtmlValues()
  {
    return $this->htmlValues;
  }
  /**
   * @param Google_Service_CloudSearch_IntegerValues
   */
  public function setIntegerValues(Google_Service_CloudSearch_IntegerValues $integerValues)
  {
    $this->integerValues = $integerValues;
  }
  /**
   * @return Google_Service_CloudSearch_IntegerValues
   */
  public function getIntegerValues()
  {
    return $this->integerValues;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_CloudSearch_ObjectValues
   */
  public function setObjectValues(Google_Service_CloudSearch_ObjectValues $objectValues)
  {
    $this->objectValues = $objectValues;
  }
  /**
   * @return Google_Service_CloudSearch_ObjectValues
   */
  public function getObjectValues()
  {
    return $this->objectValues;
  }
  /**
   * @param Google_Service_CloudSearch_TextValues
   */
  public function setTextValues(Google_Service_CloudSearch_TextValues $textValues)
  {
    $this->textValues = $textValues;
  }
  /**
   * @return Google_Service_CloudSearch_TextValues
   */
  public function getTextValues()
  {
    return $this->textValues;
  }
  /**
   * @param Google_Service_CloudSearch_TimestampValues
   */
  public function setTimestampValues(Google_Service_CloudSearch_TimestampValues $timestampValues)
  {
    $this->timestampValues = $timestampValues;
  }
  /**
   * @return Google_Service_CloudSearch_TimestampValues
   */
  public function getTimestampValues()
  {
    return $this->timestampValues;
  }
}

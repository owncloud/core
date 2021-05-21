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

class Google_Service_Document_GoogleCloudDocumentaiV1DocumentEntityNormalizedValue extends Google_Model
{
  protected $addressValueType = 'Google_Service_Document_GoogleTypePostalAddress';
  protected $addressValueDataType = '';
  public $booleanValue;
  protected $dateValueType = 'Google_Service_Document_GoogleTypeDate';
  protected $dateValueDataType = '';
  protected $datetimeValueType = 'Google_Service_Document_GoogleTypeDateTime';
  protected $datetimeValueDataType = '';
  protected $moneyValueType = 'Google_Service_Document_GoogleTypeMoney';
  protected $moneyValueDataType = '';
  public $text;

  /**
   * @param Google_Service_Document_GoogleTypePostalAddress
   */
  public function setAddressValue(Google_Service_Document_GoogleTypePostalAddress $addressValue)
  {
    $this->addressValue = $addressValue;
  }
  /**
   * @return Google_Service_Document_GoogleTypePostalAddress
   */
  public function getAddressValue()
  {
    return $this->addressValue;
  }
  public function setBooleanValue($booleanValue)
  {
    $this->booleanValue = $booleanValue;
  }
  public function getBooleanValue()
  {
    return $this->booleanValue;
  }
  /**
   * @param Google_Service_Document_GoogleTypeDate
   */
  public function setDateValue(Google_Service_Document_GoogleTypeDate $dateValue)
  {
    $this->dateValue = $dateValue;
  }
  /**
   * @return Google_Service_Document_GoogleTypeDate
   */
  public function getDateValue()
  {
    return $this->dateValue;
  }
  /**
   * @param Google_Service_Document_GoogleTypeDateTime
   */
  public function setDatetimeValue(Google_Service_Document_GoogleTypeDateTime $datetimeValue)
  {
    $this->datetimeValue = $datetimeValue;
  }
  /**
   * @return Google_Service_Document_GoogleTypeDateTime
   */
  public function getDatetimeValue()
  {
    return $this->datetimeValue;
  }
  /**
   * @param Google_Service_Document_GoogleTypeMoney
   */
  public function setMoneyValue(Google_Service_Document_GoogleTypeMoney $moneyValue)
  {
    $this->moneyValue = $moneyValue;
  }
  /**
   * @return Google_Service_Document_GoogleTypeMoney
   */
  public function getMoneyValue()
  {
    return $this->moneyValue;
  }
  public function setText($text)
  {
    $this->text = $text;
  }
  public function getText()
  {
    return $this->text;
  }
}

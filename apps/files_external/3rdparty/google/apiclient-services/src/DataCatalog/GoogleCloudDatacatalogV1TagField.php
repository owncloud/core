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

namespace Google\Service\DataCatalog;

class GoogleCloudDatacatalogV1TagField extends \Google\Model
{
  public $boolValue;
  public $displayName;
  public $doubleValue;
  protected $enumValueType = GoogleCloudDatacatalogV1TagFieldEnumValue::class;
  protected $enumValueDataType = '';
  public $order;
  public $richtextValue;
  public $stringValue;
  public $timestampValue;

  public function setBoolValue($boolValue)
  {
    $this->boolValue = $boolValue;
  }
  public function getBoolValue()
  {
    return $this->boolValue;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
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
   * @param GoogleCloudDatacatalogV1TagFieldEnumValue
   */
  public function setEnumValue(GoogleCloudDatacatalogV1TagFieldEnumValue $enumValue)
  {
    $this->enumValue = $enumValue;
  }
  /**
   * @return GoogleCloudDatacatalogV1TagFieldEnumValue
   */
  public function getEnumValue()
  {
    return $this->enumValue;
  }
  public function setOrder($order)
  {
    $this->order = $order;
  }
  public function getOrder()
  {
    return $this->order;
  }
  public function setRichtextValue($richtextValue)
  {
    $this->richtextValue = $richtextValue;
  }
  public function getRichtextValue()
  {
    return $this->richtextValue;
  }
  public function setStringValue($stringValue)
  {
    $this->stringValue = $stringValue;
  }
  public function getStringValue()
  {
    return $this->stringValue;
  }
  public function setTimestampValue($timestampValue)
  {
    $this->timestampValue = $timestampValue;
  }
  public function getTimestampValue()
  {
    return $this->timestampValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1TagField::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1TagField');

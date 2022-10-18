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

class GoogleCloudIntegrationsV1alphaValueType extends \Google\Model
{
  protected $booleanArrayType = GoogleCloudIntegrationsV1alphaBooleanParameterArray::class;
  protected $booleanArrayDataType = '';
  /**
   * @var bool
   */
  public $booleanValue;
  protected $doubleArrayType = GoogleCloudIntegrationsV1alphaDoubleParameterArray::class;
  protected $doubleArrayDataType = '';
  public $doubleValue;
  protected $intArrayType = GoogleCloudIntegrationsV1alphaIntParameterArray::class;
  protected $intArrayDataType = '';
  /**
   * @var string
   */
  public $intValue;
  /**
   * @var string
   */
  public $jsonValue;
  protected $stringArrayType = GoogleCloudIntegrationsV1alphaStringParameterArray::class;
  protected $stringArrayDataType = '';
  /**
   * @var string
   */
  public $stringValue;

  /**
   * @param GoogleCloudIntegrationsV1alphaBooleanParameterArray
   */
  public function setBooleanArray(GoogleCloudIntegrationsV1alphaBooleanParameterArray $booleanArray)
  {
    $this->booleanArray = $booleanArray;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaBooleanParameterArray
   */
  public function getBooleanArray()
  {
    return $this->booleanArray;
  }
  /**
   * @param bool
   */
  public function setBooleanValue($booleanValue)
  {
    $this->booleanValue = $booleanValue;
  }
  /**
   * @return bool
   */
  public function getBooleanValue()
  {
    return $this->booleanValue;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaDoubleParameterArray
   */
  public function setDoubleArray(GoogleCloudIntegrationsV1alphaDoubleParameterArray $doubleArray)
  {
    $this->doubleArray = $doubleArray;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaDoubleParameterArray
   */
  public function getDoubleArray()
  {
    return $this->doubleArray;
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
   * @param GoogleCloudIntegrationsV1alphaIntParameterArray
   */
  public function setIntArray(GoogleCloudIntegrationsV1alphaIntParameterArray $intArray)
  {
    $this->intArray = $intArray;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaIntParameterArray
   */
  public function getIntArray()
  {
    return $this->intArray;
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
  public function setJsonValue($jsonValue)
  {
    $this->jsonValue = $jsonValue;
  }
  /**
   * @return string
   */
  public function getJsonValue()
  {
    return $this->jsonValue;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaStringParameterArray
   */
  public function setStringArray(GoogleCloudIntegrationsV1alphaStringParameterArray $stringArray)
  {
    $this->stringArray = $stringArray;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaStringParameterArray
   */
  public function getStringArray()
  {
    return $this->stringArray;
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
class_alias(GoogleCloudIntegrationsV1alphaValueType::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaValueType');

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

class Google_Service_Cloudchannel_GoogleCloudChannelV1ParameterDefinition extends Google_Collection
{
  protected $collection_key = 'allowedValues';
  protected $allowedValuesType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1Value';
  protected $allowedValuesDataType = 'array';
  protected $maxValueType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1Value';
  protected $maxValueDataType = '';
  protected $minValueType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1Value';
  protected $minValueDataType = '';
  public $name;
  public $optional;
  public $parameterType;

  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1Value[]
   */
  public function setAllowedValues($allowedValues)
  {
    $this->allowedValues = $allowedValues;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1Value[]
   */
  public function getAllowedValues()
  {
    return $this->allowedValues;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1Value
   */
  public function setMaxValue(Google_Service_Cloudchannel_GoogleCloudChannelV1Value $maxValue)
  {
    $this->maxValue = $maxValue;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1Value
   */
  public function getMaxValue()
  {
    return $this->maxValue;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1Value
   */
  public function setMinValue(Google_Service_Cloudchannel_GoogleCloudChannelV1Value $minValue)
  {
    $this->minValue = $minValue;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1Value
   */
  public function getMinValue()
  {
    return $this->minValue;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOptional($optional)
  {
    $this->optional = $optional;
  }
  public function getOptional()
  {
    return $this->optional;
  }
  public function setParameterType($parameterType)
  {
    $this->parameterType = $parameterType;
  }
  public function getParameterType()
  {
    return $this->parameterType;
  }
}

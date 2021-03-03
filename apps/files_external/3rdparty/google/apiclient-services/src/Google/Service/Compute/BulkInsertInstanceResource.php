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

class Google_Service_Compute_BulkInsertInstanceResource extends Google_Model
{
  public $count;
  protected $instancePropertiesType = 'Google_Service_Compute_InstanceProperties';
  protected $instancePropertiesDataType = '';
  protected $locationPolicyType = 'Google_Service_Compute_LocationPolicy';
  protected $locationPolicyDataType = '';
  public $minCount;
  public $namePattern;
  protected $perInstancePropertiesType = 'Google_Service_Compute_BulkInsertInstanceResourcePerInstanceProperties';
  protected $perInstancePropertiesDataType = 'map';
  public $sourceInstanceTemplate;

  public function setCount($count)
  {
    $this->count = $count;
  }
  public function getCount()
  {
    return $this->count;
  }
  /**
   * @param Google_Service_Compute_InstanceProperties
   */
  public function setInstanceProperties(Google_Service_Compute_InstanceProperties $instanceProperties)
  {
    $this->instanceProperties = $instanceProperties;
  }
  /**
   * @return Google_Service_Compute_InstanceProperties
   */
  public function getInstanceProperties()
  {
    return $this->instanceProperties;
  }
  /**
   * @param Google_Service_Compute_LocationPolicy
   */
  public function setLocationPolicy(Google_Service_Compute_LocationPolicy $locationPolicy)
  {
    $this->locationPolicy = $locationPolicy;
  }
  /**
   * @return Google_Service_Compute_LocationPolicy
   */
  public function getLocationPolicy()
  {
    return $this->locationPolicy;
  }
  public function setMinCount($minCount)
  {
    $this->minCount = $minCount;
  }
  public function getMinCount()
  {
    return $this->minCount;
  }
  public function setNamePattern($namePattern)
  {
    $this->namePattern = $namePattern;
  }
  public function getNamePattern()
  {
    return $this->namePattern;
  }
  /**
   * @param Google_Service_Compute_BulkInsertInstanceResourcePerInstanceProperties[]
   */
  public function setPerInstanceProperties($perInstanceProperties)
  {
    $this->perInstanceProperties = $perInstanceProperties;
  }
  /**
   * @return Google_Service_Compute_BulkInsertInstanceResourcePerInstanceProperties[]
   */
  public function getPerInstanceProperties()
  {
    return $this->perInstanceProperties;
  }
  public function setSourceInstanceTemplate($sourceInstanceTemplate)
  {
    $this->sourceInstanceTemplate = $sourceInstanceTemplate;
  }
  public function getSourceInstanceTemplate()
  {
    return $this->sourceInstanceTemplate;
  }
}

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

namespace Google\Service\Compute;

class BulkInsertInstanceResource extends \Google\Model
{
  /**
   * @var string
   */
  public $count;
  protected $instancePropertiesType = InstanceProperties::class;
  protected $instancePropertiesDataType = '';
  protected $locationPolicyType = LocationPolicy::class;
  protected $locationPolicyDataType = '';
  /**
   * @var string
   */
  public $minCount;
  /**
   * @var string
   */
  public $namePattern;
  protected $perInstancePropertiesType = BulkInsertInstanceResourcePerInstanceProperties::class;
  protected $perInstancePropertiesDataType = 'map';
  /**
   * @var string
   */
  public $sourceInstanceTemplate;

  /**
   * @param string
   */
  public function setCount($count)
  {
    $this->count = $count;
  }
  /**
   * @return string
   */
  public function getCount()
  {
    return $this->count;
  }
  /**
   * @param InstanceProperties
   */
  public function setInstanceProperties(InstanceProperties $instanceProperties)
  {
    $this->instanceProperties = $instanceProperties;
  }
  /**
   * @return InstanceProperties
   */
  public function getInstanceProperties()
  {
    return $this->instanceProperties;
  }
  /**
   * @param LocationPolicy
   */
  public function setLocationPolicy(LocationPolicy $locationPolicy)
  {
    $this->locationPolicy = $locationPolicy;
  }
  /**
   * @return LocationPolicy
   */
  public function getLocationPolicy()
  {
    return $this->locationPolicy;
  }
  /**
   * @param string
   */
  public function setMinCount($minCount)
  {
    $this->minCount = $minCount;
  }
  /**
   * @return string
   */
  public function getMinCount()
  {
    return $this->minCount;
  }
  /**
   * @param string
   */
  public function setNamePattern($namePattern)
  {
    $this->namePattern = $namePattern;
  }
  /**
   * @return string
   */
  public function getNamePattern()
  {
    return $this->namePattern;
  }
  /**
   * @param BulkInsertInstanceResourcePerInstanceProperties[]
   */
  public function setPerInstanceProperties($perInstanceProperties)
  {
    $this->perInstanceProperties = $perInstanceProperties;
  }
  /**
   * @return BulkInsertInstanceResourcePerInstanceProperties[]
   */
  public function getPerInstanceProperties()
  {
    return $this->perInstanceProperties;
  }
  /**
   * @param string
   */
  public function setSourceInstanceTemplate($sourceInstanceTemplate)
  {
    $this->sourceInstanceTemplate = $sourceInstanceTemplate;
  }
  /**
   * @return string
   */
  public function getSourceInstanceTemplate()
  {
    return $this->sourceInstanceTemplate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BulkInsertInstanceResource::class, 'Google_Service_Compute_BulkInsertInstanceResource');

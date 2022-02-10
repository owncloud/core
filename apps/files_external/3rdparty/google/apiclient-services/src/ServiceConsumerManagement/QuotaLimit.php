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

namespace Google\Service\ServiceConsumerManagement;

class QuotaLimit extends \Google\Model
{
  /**
   * @var string
   */
  public $defaultLimit;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $duration;
  /**
   * @var string
   */
  public $freeTier;
  /**
   * @var string
   */
  public $maxLimit;
  /**
   * @var string
   */
  public $metric;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $unit;
  /**
   * @var string[]
   */
  public $values;

  /**
   * @param string
   */
  public function setDefaultLimit($defaultLimit)
  {
    $this->defaultLimit = $defaultLimit;
  }
  /**
   * @return string
   */
  public function getDefaultLimit()
  {
    return $this->defaultLimit;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  /**
   * @return string
   */
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param string
   */
  public function setFreeTier($freeTier)
  {
    $this->freeTier = $freeTier;
  }
  /**
   * @return string
   */
  public function getFreeTier()
  {
    return $this->freeTier;
  }
  /**
   * @param string
   */
  public function setMaxLimit($maxLimit)
  {
    $this->maxLimit = $maxLimit;
  }
  /**
   * @return string
   */
  public function getMaxLimit()
  {
    return $this->maxLimit;
  }
  /**
   * @param string
   */
  public function setMetric($metric)
  {
    $this->metric = $metric;
  }
  /**
   * @return string
   */
  public function getMetric()
  {
    return $this->metric;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setUnit($unit)
  {
    $this->unit = $unit;
  }
  /**
   * @return string
   */
  public function getUnit()
  {
    return $this->unit;
  }
  /**
   * @param string[]
   */
  public function setValues($values)
  {
    $this->values = $values;
  }
  /**
   * @return string[]
   */
  public function getValues()
  {
    return $this->values;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QuotaLimit::class, 'Google_Service_ServiceConsumerManagement_QuotaLimit');

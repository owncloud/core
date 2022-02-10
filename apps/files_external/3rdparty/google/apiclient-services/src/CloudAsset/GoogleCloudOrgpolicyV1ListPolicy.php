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

namespace Google\Service\CloudAsset;

class GoogleCloudOrgpolicyV1ListPolicy extends \Google\Collection
{
  protected $collection_key = 'deniedValues';
  /**
   * @var string
   */
  public $allValues;
  /**
   * @var string[]
   */
  public $allowedValues;
  /**
   * @var string[]
   */
  public $deniedValues;
  /**
   * @var bool
   */
  public $inheritFromParent;
  /**
   * @var string
   */
  public $suggestedValue;

  /**
   * @param string
   */
  public function setAllValues($allValues)
  {
    $this->allValues = $allValues;
  }
  /**
   * @return string
   */
  public function getAllValues()
  {
    return $this->allValues;
  }
  /**
   * @param string[]
   */
  public function setAllowedValues($allowedValues)
  {
    $this->allowedValues = $allowedValues;
  }
  /**
   * @return string[]
   */
  public function getAllowedValues()
  {
    return $this->allowedValues;
  }
  /**
   * @param string[]
   */
  public function setDeniedValues($deniedValues)
  {
    $this->deniedValues = $deniedValues;
  }
  /**
   * @return string[]
   */
  public function getDeniedValues()
  {
    return $this->deniedValues;
  }
  /**
   * @param bool
   */
  public function setInheritFromParent($inheritFromParent)
  {
    $this->inheritFromParent = $inheritFromParent;
  }
  /**
   * @return bool
   */
  public function getInheritFromParent()
  {
    return $this->inheritFromParent;
  }
  /**
   * @param string
   */
  public function setSuggestedValue($suggestedValue)
  {
    $this->suggestedValue = $suggestedValue;
  }
  /**
   * @return string
   */
  public function getSuggestedValue()
  {
    return $this->suggestedValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudOrgpolicyV1ListPolicy::class, 'Google_Service_CloudAsset_GoogleCloudOrgpolicyV1ListPolicy');

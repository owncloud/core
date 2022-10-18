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

namespace Google\Service\SecurityCommandCenter;

class GoogleCloudSecuritycenterV1ResourceValueConfig extends \Google\Collection
{
  protected $collection_key = 'tagValues';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $resourceValue;
  /**
   * @var string[]
   */
  public $tagValues;

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
  public function setResourceValue($resourceValue)
  {
    $this->resourceValue = $resourceValue;
  }
  /**
   * @return string
   */
  public function getResourceValue()
  {
    return $this->resourceValue;
  }
  /**
   * @param string[]
   */
  public function setTagValues($tagValues)
  {
    $this->tagValues = $tagValues;
  }
  /**
   * @return string[]
   */
  public function getTagValues()
  {
    return $this->tagValues;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudSecuritycenterV1ResourceValueConfig::class, 'Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1ResourceValueConfig');

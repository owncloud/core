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

namespace Google\Service\AccessContextManager;

class GcpUserAccessBinding extends \Google\Collection
{
  protected $collection_key = 'accessLevels';
  /**
   * @var string[]
   */
  public $accessLevels;
  /**
   * @var string
   */
  public $groupKey;
  /**
   * @var string
   */
  public $name;

  /**
   * @param string[]
   */
  public function setAccessLevels($accessLevels)
  {
    $this->accessLevels = $accessLevels;
  }
  /**
   * @return string[]
   */
  public function getAccessLevels()
  {
    return $this->accessLevels;
  }
  /**
   * @param string
   */
  public function setGroupKey($groupKey)
  {
    $this->groupKey = $groupKey;
  }
  /**
   * @return string
   */
  public function getGroupKey()
  {
    return $this->groupKey;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GcpUserAccessBinding::class, 'Google_Service_AccessContextManager_GcpUserAccessBinding');

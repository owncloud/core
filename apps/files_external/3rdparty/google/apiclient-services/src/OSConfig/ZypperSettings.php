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

namespace Google\Service\OSConfig;

class ZypperSettings extends \Google\Collection
{
  protected $collection_key = 'severities';
  /**
   * @var string[]
   */
  public $categories;
  /**
   * @var string[]
   */
  public $excludes;
  /**
   * @var string[]
   */
  public $exclusivePatches;
  /**
   * @var string[]
   */
  public $severities;
  /**
   * @var bool
   */
  public $withOptional;
  /**
   * @var bool
   */
  public $withUpdate;

  /**
   * @param string[]
   */
  public function setCategories($categories)
  {
    $this->categories = $categories;
  }
  /**
   * @return string[]
   */
  public function getCategories()
  {
    return $this->categories;
  }
  /**
   * @param string[]
   */
  public function setExcludes($excludes)
  {
    $this->excludes = $excludes;
  }
  /**
   * @return string[]
   */
  public function getExcludes()
  {
    return $this->excludes;
  }
  /**
   * @param string[]
   */
  public function setExclusivePatches($exclusivePatches)
  {
    $this->exclusivePatches = $exclusivePatches;
  }
  /**
   * @return string[]
   */
  public function getExclusivePatches()
  {
    return $this->exclusivePatches;
  }
  /**
   * @param string[]
   */
  public function setSeverities($severities)
  {
    $this->severities = $severities;
  }
  /**
   * @return string[]
   */
  public function getSeverities()
  {
    return $this->severities;
  }
  /**
   * @param bool
   */
  public function setWithOptional($withOptional)
  {
    $this->withOptional = $withOptional;
  }
  /**
   * @return bool
   */
  public function getWithOptional()
  {
    return $this->withOptional;
  }
  /**
   * @param bool
   */
  public function setWithUpdate($withUpdate)
  {
    $this->withUpdate = $withUpdate;
  }
  /**
   * @return bool
   */
  public function getWithUpdate()
  {
    return $this->withUpdate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ZypperSettings::class, 'Google_Service_OSConfig_ZypperSettings');

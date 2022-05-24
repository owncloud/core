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

class WindowsUpdateSettings extends \Google\Collection
{
  protected $collection_key = 'exclusivePatches';
  /**
   * @var string[]
   */
  public $classifications;
  /**
   * @var string[]
   */
  public $excludes;
  /**
   * @var string[]
   */
  public $exclusivePatches;

  /**
   * @param string[]
   */
  public function setClassifications($classifications)
  {
    $this->classifications = $classifications;
  }
  /**
   * @return string[]
   */
  public function getClassifications()
  {
    return $this->classifications;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WindowsUpdateSettings::class, 'Google_Service_OSConfig_WindowsUpdateSettings');

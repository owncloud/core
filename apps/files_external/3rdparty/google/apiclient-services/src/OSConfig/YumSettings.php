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

class YumSettings extends \Google\Collection
{
  protected $collection_key = 'exclusivePackages';
  /**
   * @var string[]
   */
  public $excludes;
  /**
   * @var string[]
   */
  public $exclusivePackages;
  /**
   * @var bool
   */
  public $minimal;
  /**
   * @var bool
   */
  public $security;

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
  public function setExclusivePackages($exclusivePackages)
  {
    $this->exclusivePackages = $exclusivePackages;
  }
  /**
   * @return string[]
   */
  public function getExclusivePackages()
  {
    return $this->exclusivePackages;
  }
  /**
   * @param bool
   */
  public function setMinimal($minimal)
  {
    $this->minimal = $minimal;
  }
  /**
   * @return bool
   */
  public function getMinimal()
  {
    return $this->minimal;
  }
  /**
   * @param bool
   */
  public function setSecurity($security)
  {
    $this->security = $security;
  }
  /**
   * @return bool
   */
  public function getSecurity()
  {
    return $this->security;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(YumSettings::class, 'Google_Service_OSConfig_YumSettings');

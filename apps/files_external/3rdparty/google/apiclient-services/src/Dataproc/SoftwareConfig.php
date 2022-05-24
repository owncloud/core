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

namespace Google\Service\Dataproc;

class SoftwareConfig extends \Google\Collection
{
  protected $collection_key = 'optionalComponents';
  /**
   * @var string
   */
  public $imageVersion;
  /**
   * @var string[]
   */
  public $optionalComponents;
  /**
   * @var string[]
   */
  public $properties;

  /**
   * @param string
   */
  public function setImageVersion($imageVersion)
  {
    $this->imageVersion = $imageVersion;
  }
  /**
   * @return string
   */
  public function getImageVersion()
  {
    return $this->imageVersion;
  }
  /**
   * @param string[]
   */
  public function setOptionalComponents($optionalComponents)
  {
    $this->optionalComponents = $optionalComponents;
  }
  /**
   * @return string[]
   */
  public function getOptionalComponents()
  {
    return $this->optionalComponents;
  }
  /**
   * @param string[]
   */
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return string[]
   */
  public function getProperties()
  {
    return $this->properties;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SoftwareConfig::class, 'Google_Service_Dataproc_SoftwareConfig');

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

namespace Google\Service\Contentwarehouse;

class ImageContentStarburstVersionGroup extends \Google\Collection
{
  protected $collection_key = 'starburstTokens';
  /**
   * @var float[]
   */
  public $descriptorFloat;
  /**
   * @var string
   */
  public $descriptorShort;
  /**
   * @var string
   */
  public $enumVersion;
  /**
   * @var string
   */
  public $minorVersion;
  /**
   * @var int[]
   */
  public $starburstTokens;
  /**
   * @var int
   */
  public $version;

  /**
   * @param float[]
   */
  public function setDescriptorFloat($descriptorFloat)
  {
    $this->descriptorFloat = $descriptorFloat;
  }
  /**
   * @return float[]
   */
  public function getDescriptorFloat()
  {
    return $this->descriptorFloat;
  }
  /**
   * @param string
   */
  public function setDescriptorShort($descriptorShort)
  {
    $this->descriptorShort = $descriptorShort;
  }
  /**
   * @return string
   */
  public function getDescriptorShort()
  {
    return $this->descriptorShort;
  }
  /**
   * @param string
   */
  public function setEnumVersion($enumVersion)
  {
    $this->enumVersion = $enumVersion;
  }
  /**
   * @return string
   */
  public function getEnumVersion()
  {
    return $this->enumVersion;
  }
  /**
   * @param string
   */
  public function setMinorVersion($minorVersion)
  {
    $this->minorVersion = $minorVersion;
  }
  /**
   * @return string
   */
  public function getMinorVersion()
  {
    return $this->minorVersion;
  }
  /**
   * @param int[]
   */
  public function setStarburstTokens($starburstTokens)
  {
    $this->starburstTokens = $starburstTokens;
  }
  /**
   * @return int[]
   */
  public function getStarburstTokens()
  {
    return $this->starburstTokens;
  }
  /**
   * @param int
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return int
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageContentStarburstVersionGroup::class, 'Google_Service_Contentwarehouse_ImageContentStarburstVersionGroup');

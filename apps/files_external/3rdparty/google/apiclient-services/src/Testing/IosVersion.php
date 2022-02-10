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

namespace Google\Service\Testing;

class IosVersion extends \Google\Collection
{
  protected $collection_key = 'tags';
  /**
   * @var string
   */
  public $id;
  /**
   * @var int
   */
  public $majorVersion;
  /**
   * @var int
   */
  public $minorVersion;
  /**
   * @var string[]
   */
  public $supportedXcodeVersionIds;
  /**
   * @var string[]
   */
  public $tags;

  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param int
   */
  public function setMajorVersion($majorVersion)
  {
    $this->majorVersion = $majorVersion;
  }
  /**
   * @return int
   */
  public function getMajorVersion()
  {
    return $this->majorVersion;
  }
  /**
   * @param int
   */
  public function setMinorVersion($minorVersion)
  {
    $this->minorVersion = $minorVersion;
  }
  /**
   * @return int
   */
  public function getMinorVersion()
  {
    return $this->minorVersion;
  }
  /**
   * @param string[]
   */
  public function setSupportedXcodeVersionIds($supportedXcodeVersionIds)
  {
    $this->supportedXcodeVersionIds = $supportedXcodeVersionIds;
  }
  /**
   * @return string[]
   */
  public function getSupportedXcodeVersionIds()
  {
    return $this->supportedXcodeVersionIds;
  }
  /**
   * @param string[]
   */
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  /**
   * @return string[]
   */
  public function getTags()
  {
    return $this->tags;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IosVersion::class, 'Google_Service_Testing_IosVersion');

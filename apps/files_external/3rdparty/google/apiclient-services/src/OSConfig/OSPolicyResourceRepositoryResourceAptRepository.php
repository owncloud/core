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

class OSPolicyResourceRepositoryResourceAptRepository extends \Google\Collection
{
  protected $collection_key = 'components';
  /**
   * @var string
   */
  public $archiveType;
  /**
   * @var string[]
   */
  public $components;
  /**
   * @var string
   */
  public $distribution;
  /**
   * @var string
   */
  public $gpgKey;
  /**
   * @var string
   */
  public $uri;

  /**
   * @param string
   */
  public function setArchiveType($archiveType)
  {
    $this->archiveType = $archiveType;
  }
  /**
   * @return string
   */
  public function getArchiveType()
  {
    return $this->archiveType;
  }
  /**
   * @param string[]
   */
  public function setComponents($components)
  {
    $this->components = $components;
  }
  /**
   * @return string[]
   */
  public function getComponents()
  {
    return $this->components;
  }
  /**
   * @param string
   */
  public function setDistribution($distribution)
  {
    $this->distribution = $distribution;
  }
  /**
   * @return string
   */
  public function getDistribution()
  {
    return $this->distribution;
  }
  /**
   * @param string
   */
  public function setGpgKey($gpgKey)
  {
    $this->gpgKey = $gpgKey;
  }
  /**
   * @return string
   */
  public function getGpgKey()
  {
    return $this->gpgKey;
  }
  /**
   * @param string
   */
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  /**
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OSPolicyResourceRepositoryResourceAptRepository::class, 'Google_Service_OSConfig_OSPolicyResourceRepositoryResourceAptRepository');

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

namespace Google\Service\Container;

class ServerConfig extends \Google\Collection
{
  protected $collection_key = 'validNodeVersions';
  protected $channelsType = ReleaseChannelConfig::class;
  protected $channelsDataType = 'array';
  /**
   * @var string
   */
  public $defaultClusterVersion;
  /**
   * @var string
   */
  public $defaultImageType;
  /**
   * @var string[]
   */
  public $validImageTypes;
  /**
   * @var string[]
   */
  public $validMasterVersions;
  /**
   * @var string[]
   */
  public $validNodeVersions;

  /**
   * @param ReleaseChannelConfig[]
   */
  public function setChannels($channels)
  {
    $this->channels = $channels;
  }
  /**
   * @return ReleaseChannelConfig[]
   */
  public function getChannels()
  {
    return $this->channels;
  }
  /**
   * @param string
   */
  public function setDefaultClusterVersion($defaultClusterVersion)
  {
    $this->defaultClusterVersion = $defaultClusterVersion;
  }
  /**
   * @return string
   */
  public function getDefaultClusterVersion()
  {
    return $this->defaultClusterVersion;
  }
  /**
   * @param string
   */
  public function setDefaultImageType($defaultImageType)
  {
    $this->defaultImageType = $defaultImageType;
  }
  /**
   * @return string
   */
  public function getDefaultImageType()
  {
    return $this->defaultImageType;
  }
  /**
   * @param string[]
   */
  public function setValidImageTypes($validImageTypes)
  {
    $this->validImageTypes = $validImageTypes;
  }
  /**
   * @return string[]
   */
  public function getValidImageTypes()
  {
    return $this->validImageTypes;
  }
  /**
   * @param string[]
   */
  public function setValidMasterVersions($validMasterVersions)
  {
    $this->validMasterVersions = $validMasterVersions;
  }
  /**
   * @return string[]
   */
  public function getValidMasterVersions()
  {
    return $this->validMasterVersions;
  }
  /**
   * @param string[]
   */
  public function setValidNodeVersions($validNodeVersions)
  {
    $this->validNodeVersions = $validNodeVersions;
  }
  /**
   * @return string[]
   */
  public function getValidNodeVersions()
  {
    return $this->validNodeVersions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServerConfig::class, 'Google_Service_Container_ServerConfig');

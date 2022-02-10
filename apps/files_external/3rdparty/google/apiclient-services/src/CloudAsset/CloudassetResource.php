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

namespace Google\Service\CloudAsset;

class CloudassetResource extends \Google\Model
{
  /**
   * @var array[]
   */
  public $data;
  /**
   * @var string
   */
  public $discoveryDocumentUri;
  /**
   * @var string
   */
  public $discoveryName;
  /**
   * @var string
   */
  public $location;
  /**
   * @var string
   */
  public $parent;
  /**
   * @var string
   */
  public $resourceUrl;
  /**
   * @var string
   */
  public $version;

  /**
   * @param array[]
   */
  public function setData($data)
  {
    $this->data = $data;
  }
  /**
   * @return array[]
   */
  public function getData()
  {
    return $this->data;
  }
  /**
   * @param string
   */
  public function setDiscoveryDocumentUri($discoveryDocumentUri)
  {
    $this->discoveryDocumentUri = $discoveryDocumentUri;
  }
  /**
   * @return string
   */
  public function getDiscoveryDocumentUri()
  {
    return $this->discoveryDocumentUri;
  }
  /**
   * @param string
   */
  public function setDiscoveryName($discoveryName)
  {
    $this->discoveryName = $discoveryName;
  }
  /**
   * @return string
   */
  public function getDiscoveryName()
  {
    return $this->discoveryName;
  }
  /**
   * @param string
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return string
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param string
   */
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  /**
   * @return string
   */
  public function getParent()
  {
    return $this->parent;
  }
  /**
   * @param string
   */
  public function setResourceUrl($resourceUrl)
  {
    $this->resourceUrl = $resourceUrl;
  }
  /**
   * @return string
   */
  public function getResourceUrl()
  {
    return $this->resourceUrl;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CloudassetResource::class, 'Google_Service_CloudAsset_CloudassetResource');

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

class Google_Service_CloudAsset_CloudassetResource extends Google_Model
{
  public $data;
  public $discoveryDocumentUri;
  public $discoveryName;
  public $location;
  public $parent;
  public $resourceUrl;
  public $version;

  public function setData($data)
  {
    $this->data = $data;
  }
  public function getData()
  {
    return $this->data;
  }
  public function setDiscoveryDocumentUri($discoveryDocumentUri)
  {
    $this->discoveryDocumentUri = $discoveryDocumentUri;
  }
  public function getDiscoveryDocumentUri()
  {
    return $this->discoveryDocumentUri;
  }
  public function setDiscoveryName($discoveryName)
  {
    $this->discoveryName = $discoveryName;
  }
  public function getDiscoveryName()
  {
    return $this->discoveryName;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  public function getParent()
  {
    return $this->parent;
  }
  public function setResourceUrl($resourceUrl)
  {
    $this->resourceUrl = $resourceUrl;
  }
  public function getResourceUrl()
  {
    return $this->resourceUrl;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}

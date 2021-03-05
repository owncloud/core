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

class Google_Service_Compute_LicenseCode extends Google_Collection
{
  protected $collection_key = 'licenseAlias';
  public $creationTimestamp;
  public $description;
  public $id;
  public $kind;
  protected $licenseAliasType = 'Google_Service_Compute_LicenseCodeLicenseAlias';
  protected $licenseAliasDataType = 'array';
  public $name;
  public $selfLink;
  public $state;
  public $transferable;

  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Compute_LicenseCodeLicenseAlias[]
   */
  public function setLicenseAlias($licenseAlias)
  {
    $this->licenseAlias = $licenseAlias;
  }
  /**
   * @return Google_Service_Compute_LicenseCodeLicenseAlias[]
   */
  public function getLicenseAlias()
  {
    return $this->licenseAlias;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setTransferable($transferable)
  {
    $this->transferable = $transferable;
  }
  public function getTransferable()
  {
    return $this->transferable;
  }
}

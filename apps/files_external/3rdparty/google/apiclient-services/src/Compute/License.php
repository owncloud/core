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

namespace Google\Service\Compute;

class License extends \Google\Model
{
  public $chargesUseFee;
  public $creationTimestamp;
  public $description;
  public $id;
  public $kind;
  public $licenseCode;
  public $name;
  protected $resourceRequirementsType = LicenseResourceRequirements::class;
  protected $resourceRequirementsDataType = '';
  public $selfLink;
  public $transferable;

  public function setChargesUseFee($chargesUseFee)
  {
    $this->chargesUseFee = $chargesUseFee;
  }
  public function getChargesUseFee()
  {
    return $this->chargesUseFee;
  }
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
  public function setLicenseCode($licenseCode)
  {
    $this->licenseCode = $licenseCode;
  }
  public function getLicenseCode()
  {
    return $this->licenseCode;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param LicenseResourceRequirements
   */
  public function setResourceRequirements(LicenseResourceRequirements $resourceRequirements)
  {
    $this->resourceRequirements = $resourceRequirements;
  }
  /**
   * @return LicenseResourceRequirements
   */
  public function getResourceRequirements()
  {
    return $this->resourceRequirements;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(License::class, 'Google_Service_Compute_License');

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
  /**
   * @var bool
   */
  public $chargesUseFee;
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $licenseCode;
  /**
   * @var string
   */
  public $name;
  protected $resourceRequirementsType = LicenseResourceRequirements::class;
  protected $resourceRequirementsDataType = '';
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var bool
   */
  public $transferable;

  /**
   * @param bool
   */
  public function setChargesUseFee($chargesUseFee)
  {
    $this->chargesUseFee = $chargesUseFee;
  }
  /**
   * @return bool
   */
  public function getChargesUseFee()
  {
    return $this->chargesUseFee;
  }
  /**
   * @param string
   */
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  /**
   * @return string
   */
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
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
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setLicenseCode($licenseCode)
  {
    $this->licenseCode = $licenseCode;
  }
  /**
   * @return string
   */
  public function getLicenseCode()
  {
    return $this->licenseCode;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param bool
   */
  public function setTransferable($transferable)
  {
    $this->transferable = $transferable;
  }
  /**
   * @return bool
   */
  public function getTransferable()
  {
    return $this->transferable;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(License::class, 'Google_Service_Compute_License');

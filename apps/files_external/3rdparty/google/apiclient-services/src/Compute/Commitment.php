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

class Commitment extends \Google\Collection
{
  protected $collection_key = 'resources';
  /**
   * @var bool
   */
  public $autoRenew;
  /**
   * @var string
   */
  public $category;
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
  public $endTimestamp;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  protected $licenseResourceType = LicenseResourceCommitment::class;
  protected $licenseResourceDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $plan;
  /**
   * @var string
   */
  public $region;
  protected $reservationsType = Reservation::class;
  protected $reservationsDataType = 'array';
  protected $resourcesType = ResourceCommitment::class;
  protected $resourcesDataType = 'array';
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $startTimestamp;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $statusMessage;
  /**
   * @var string
   */
  public $type;

  /**
   * @param bool
   */
  public function setAutoRenew($autoRenew)
  {
    $this->autoRenew = $autoRenew;
  }
  /**
   * @return bool
   */
  public function getAutoRenew()
  {
    return $this->autoRenew;
  }
  /**
   * @param string
   */
  public function setCategory($category)
  {
    $this->category = $category;
  }
  /**
   * @return string
   */
  public function getCategory()
  {
    return $this->category;
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
  public function setEndTimestamp($endTimestamp)
  {
    $this->endTimestamp = $endTimestamp;
  }
  /**
   * @return string
   */
  public function getEndTimestamp()
  {
    return $this->endTimestamp;
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
   * @param LicenseResourceCommitment
   */
  public function setLicenseResource(LicenseResourceCommitment $licenseResource)
  {
    $this->licenseResource = $licenseResource;
  }
  /**
   * @return LicenseResourceCommitment
   */
  public function getLicenseResource()
  {
    return $this->licenseResource;
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
   * @param string
   */
  public function setPlan($plan)
  {
    $this->plan = $plan;
  }
  /**
   * @return string
   */
  public function getPlan()
  {
    return $this->plan;
  }
  /**
   * @param string
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param Reservation[]
   */
  public function setReservations($reservations)
  {
    $this->reservations = $reservations;
  }
  /**
   * @return Reservation[]
   */
  public function getReservations()
  {
    return $this->reservations;
  }
  /**
   * @param ResourceCommitment[]
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return ResourceCommitment[]
   */
  public function getResources()
  {
    return $this->resources;
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
   * @param string
   */
  public function setStartTimestamp($startTimestamp)
  {
    $this->startTimestamp = $startTimestamp;
  }
  /**
   * @return string
   */
  public function getStartTimestamp()
  {
    return $this->startTimestamp;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setStatusMessage($statusMessage)
  {
    $this->statusMessage = $statusMessage;
  }
  /**
   * @return string
   */
  public function getStatusMessage()
  {
    return $this->statusMessage;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Commitment::class, 'Google_Service_Compute_Commitment');

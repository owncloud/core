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
  public $category;
  public $creationTimestamp;
  public $description;
  public $endTimestamp;
  public $id;
  public $kind;
  protected $licenseResourceType = LicenseResourceCommitment::class;
  protected $licenseResourceDataType = '';
  public $name;
  public $plan;
  public $region;
  protected $reservationsType = Reservation::class;
  protected $reservationsDataType = 'array';
  protected $resourcesType = ResourceCommitment::class;
  protected $resourcesDataType = 'array';
  public $selfLink;
  public $startTimestamp;
  public $status;
  public $statusMessage;
  public $type;

  public function setCategory($category)
  {
    $this->category = $category;
  }
  public function getCategory()
  {
    return $this->category;
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
  public function setEndTimestamp($endTimestamp)
  {
    $this->endTimestamp = $endTimestamp;
  }
  public function getEndTimestamp()
  {
    return $this->endTimestamp;
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
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPlan($plan)
  {
    $this->plan = $plan;
  }
  public function getPlan()
  {
    return $this->plan;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
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
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setStartTimestamp($startTimestamp)
  {
    $this->startTimestamp = $startTimestamp;
  }
  public function getStartTimestamp()
  {
    return $this->startTimestamp;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setStatusMessage($statusMessage)
  {
    $this->statusMessage = $statusMessage;
  }
  public function getStatusMessage()
  {
    return $this->statusMessage;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Commitment::class, 'Google_Service_Compute_Commitment');

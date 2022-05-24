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

class InterconnectLocation extends \Google\Collection
{
  protected $collection_key = 'regionInfos';
  /**
   * @var string
   */
  public $address;
  /**
   * @var string
   */
  public $availabilityZone;
  /**
   * @var string
   */
  public $city;
  /**
   * @var string
   */
  public $continent;
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
  public $facilityProvider;
  /**
   * @var string
   */
  public $facilityProviderFacilityId;
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
  public $name;
  /**
   * @var string
   */
  public $peeringdbFacilityId;
  protected $regionInfosType = InterconnectLocationRegionInfo::class;
  protected $regionInfosDataType = 'array';
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $status;
  /**
   * @var bool
   */
  public $supportsPzs;

  /**
   * @param string
   */
  public function setAddress($address)
  {
    $this->address = $address;
  }
  /**
   * @return string
   */
  public function getAddress()
  {
    return $this->address;
  }
  /**
   * @param string
   */
  public function setAvailabilityZone($availabilityZone)
  {
    $this->availabilityZone = $availabilityZone;
  }
  /**
   * @return string
   */
  public function getAvailabilityZone()
  {
    return $this->availabilityZone;
  }
  /**
   * @param string
   */
  public function setCity($city)
  {
    $this->city = $city;
  }
  /**
   * @return string
   */
  public function getCity()
  {
    return $this->city;
  }
  /**
   * @param string
   */
  public function setContinent($continent)
  {
    $this->continent = $continent;
  }
  /**
   * @return string
   */
  public function getContinent()
  {
    return $this->continent;
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
  public function setFacilityProvider($facilityProvider)
  {
    $this->facilityProvider = $facilityProvider;
  }
  /**
   * @return string
   */
  public function getFacilityProvider()
  {
    return $this->facilityProvider;
  }
  /**
   * @param string
   */
  public function setFacilityProviderFacilityId($facilityProviderFacilityId)
  {
    $this->facilityProviderFacilityId = $facilityProviderFacilityId;
  }
  /**
   * @return string
   */
  public function getFacilityProviderFacilityId()
  {
    return $this->facilityProviderFacilityId;
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
  public function setPeeringdbFacilityId($peeringdbFacilityId)
  {
    $this->peeringdbFacilityId = $peeringdbFacilityId;
  }
  /**
   * @return string
   */
  public function getPeeringdbFacilityId()
  {
    return $this->peeringdbFacilityId;
  }
  /**
   * @param InterconnectLocationRegionInfo[]
   */
  public function setRegionInfos($regionInfos)
  {
    $this->regionInfos = $regionInfos;
  }
  /**
   * @return InterconnectLocationRegionInfo[]
   */
  public function getRegionInfos()
  {
    return $this->regionInfos;
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
   * @param bool
   */
  public function setSupportsPzs($supportsPzs)
  {
    $this->supportsPzs = $supportsPzs;
  }
  /**
   * @return bool
   */
  public function getSupportsPzs()
  {
    return $this->supportsPzs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InterconnectLocation::class, 'Google_Service_Compute_InterconnectLocation');

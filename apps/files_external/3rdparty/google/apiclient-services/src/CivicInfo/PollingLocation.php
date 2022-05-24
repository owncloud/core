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

namespace Google\Service\CivicInfo;

class PollingLocation extends \Google\Collection
{
  protected $collection_key = 'sources';
  protected $addressType = SimpleAddressType::class;
  protected $addressDataType = '';
  /**
   * @var string
   */
  public $endDate;
  public $latitude;
  public $longitude;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $notes;
  /**
   * @var string
   */
  public $pollingHours;
  protected $sourcesType = Source::class;
  protected $sourcesDataType = 'array';
  /**
   * @var string
   */
  public $startDate;
  /**
   * @var string
   */
  public $voterServices;

  /**
   * @param SimpleAddressType
   */
  public function setAddress(SimpleAddressType $address)
  {
    $this->address = $address;
  }
  /**
   * @return SimpleAddressType
   */
  public function getAddress()
  {
    return $this->address;
  }
  /**
   * @param string
   */
  public function setEndDate($endDate)
  {
    $this->endDate = $endDate;
  }
  /**
   * @return string
   */
  public function getEndDate()
  {
    return $this->endDate;
  }
  public function setLatitude($latitude)
  {
    $this->latitude = $latitude;
  }
  public function getLatitude()
  {
    return $this->latitude;
  }
  public function setLongitude($longitude)
  {
    $this->longitude = $longitude;
  }
  public function getLongitude()
  {
    return $this->longitude;
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
  public function setNotes($notes)
  {
    $this->notes = $notes;
  }
  /**
   * @return string
   */
  public function getNotes()
  {
    return $this->notes;
  }
  /**
   * @param string
   */
  public function setPollingHours($pollingHours)
  {
    $this->pollingHours = $pollingHours;
  }
  /**
   * @return string
   */
  public function getPollingHours()
  {
    return $this->pollingHours;
  }
  /**
   * @param Source[]
   */
  public function setSources($sources)
  {
    $this->sources = $sources;
  }
  /**
   * @return Source[]
   */
  public function getSources()
  {
    return $this->sources;
  }
  /**
   * @param string
   */
  public function setStartDate($startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return string
   */
  public function getStartDate()
  {
    return $this->startDate;
  }
  /**
   * @param string
   */
  public function setVoterServices($voterServices)
  {
    $this->voterServices = $voterServices;
  }
  /**
   * @return string
   */
  public function getVoterServices()
  {
    return $this->voterServices;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PollingLocation::class, 'Google_Service_CivicInfo_PollingLocation');

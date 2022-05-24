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

class Precinct extends \Google\Collection
{
  protected $collection_key = 'spatialBoundaryId';
  /**
   * @var string
   */
  public $administrationRegionId;
  /**
   * @var string[]
   */
  public $contestId;
  /**
   * @var string
   */
  public $datasetId;
  /**
   * @var string[]
   */
  public $earlyVoteSiteId;
  /**
   * @var string[]
   */
  public $electoralDistrictId;
  /**
   * @var string
   */
  public $id;
  /**
   * @var bool
   */
  public $mailOnly;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $number;
  /**
   * @var string[]
   */
  public $ocdId;
  /**
   * @var string[]
   */
  public $pollingLocationId;
  /**
   * @var string[]
   */
  public $spatialBoundaryId;
  /**
   * @var string
   */
  public $splitName;
  /**
   * @var string
   */
  public $ward;

  /**
   * @param string
   */
  public function setAdministrationRegionId($administrationRegionId)
  {
    $this->administrationRegionId = $administrationRegionId;
  }
  /**
   * @return string
   */
  public function getAdministrationRegionId()
  {
    return $this->administrationRegionId;
  }
  /**
   * @param string[]
   */
  public function setContestId($contestId)
  {
    $this->contestId = $contestId;
  }
  /**
   * @return string[]
   */
  public function getContestId()
  {
    return $this->contestId;
  }
  /**
   * @param string
   */
  public function setDatasetId($datasetId)
  {
    $this->datasetId = $datasetId;
  }
  /**
   * @return string
   */
  public function getDatasetId()
  {
    return $this->datasetId;
  }
  /**
   * @param string[]
   */
  public function setEarlyVoteSiteId($earlyVoteSiteId)
  {
    $this->earlyVoteSiteId = $earlyVoteSiteId;
  }
  /**
   * @return string[]
   */
  public function getEarlyVoteSiteId()
  {
    return $this->earlyVoteSiteId;
  }
  /**
   * @param string[]
   */
  public function setElectoralDistrictId($electoralDistrictId)
  {
    $this->electoralDistrictId = $electoralDistrictId;
  }
  /**
   * @return string[]
   */
  public function getElectoralDistrictId()
  {
    return $this->electoralDistrictId;
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
   * @param bool
   */
  public function setMailOnly($mailOnly)
  {
    $this->mailOnly = $mailOnly;
  }
  /**
   * @return bool
   */
  public function getMailOnly()
  {
    return $this->mailOnly;
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
  public function setNumber($number)
  {
    $this->number = $number;
  }
  /**
   * @return string
   */
  public function getNumber()
  {
    return $this->number;
  }
  /**
   * @param string[]
   */
  public function setOcdId($ocdId)
  {
    $this->ocdId = $ocdId;
  }
  /**
   * @return string[]
   */
  public function getOcdId()
  {
    return $this->ocdId;
  }
  /**
   * @param string[]
   */
  public function setPollingLocationId($pollingLocationId)
  {
    $this->pollingLocationId = $pollingLocationId;
  }
  /**
   * @return string[]
   */
  public function getPollingLocationId()
  {
    return $this->pollingLocationId;
  }
  /**
   * @param string[]
   */
  public function setSpatialBoundaryId($spatialBoundaryId)
  {
    $this->spatialBoundaryId = $spatialBoundaryId;
  }
  /**
   * @return string[]
   */
  public function getSpatialBoundaryId()
  {
    return $this->spatialBoundaryId;
  }
  /**
   * @param string
   */
  public function setSplitName($splitName)
  {
    $this->splitName = $splitName;
  }
  /**
   * @return string
   */
  public function getSplitName()
  {
    return $this->splitName;
  }
  /**
   * @param string
   */
  public function setWard($ward)
  {
    $this->ward = $ward;
  }
  /**
   * @return string
   */
  public function getWard()
  {
    return $this->ward;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Precinct::class, 'Google_Service_CivicInfo_Precinct');

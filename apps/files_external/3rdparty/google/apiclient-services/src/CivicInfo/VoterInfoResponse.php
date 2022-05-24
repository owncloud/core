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

class VoterInfoResponse extends \Google\Collection
{
  protected $collection_key = 'state';
  protected $contestsType = Contest::class;
  protected $contestsDataType = 'array';
  protected $dropOffLocationsType = PollingLocation::class;
  protected $dropOffLocationsDataType = 'array';
  protected $earlyVoteSitesType = PollingLocation::class;
  protected $earlyVoteSitesDataType = 'array';
  protected $electionType = Election::class;
  protected $electionDataType = '';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var bool
   */
  public $mailOnly;
  protected $normalizedInputType = SimpleAddressType::class;
  protected $normalizedInputDataType = '';
  protected $otherElectionsType = Election::class;
  protected $otherElectionsDataType = 'array';
  protected $pollingLocationsType = PollingLocation::class;
  protected $pollingLocationsDataType = 'array';
  /**
   * @var string
   */
  public $precinctId;
  protected $precinctsType = Precinct::class;
  protected $precinctsDataType = 'array';
  protected $stateType = AdministrationRegion::class;
  protected $stateDataType = 'array';

  /**
   * @param Contest[]
   */
  public function setContests($contests)
  {
    $this->contests = $contests;
  }
  /**
   * @return Contest[]
   */
  public function getContests()
  {
    return $this->contests;
  }
  /**
   * @param PollingLocation[]
   */
  public function setDropOffLocations($dropOffLocations)
  {
    $this->dropOffLocations = $dropOffLocations;
  }
  /**
   * @return PollingLocation[]
   */
  public function getDropOffLocations()
  {
    return $this->dropOffLocations;
  }
  /**
   * @param PollingLocation[]
   */
  public function setEarlyVoteSites($earlyVoteSites)
  {
    $this->earlyVoteSites = $earlyVoteSites;
  }
  /**
   * @return PollingLocation[]
   */
  public function getEarlyVoteSites()
  {
    return $this->earlyVoteSites;
  }
  /**
   * @param Election
   */
  public function setElection(Election $election)
  {
    $this->election = $election;
  }
  /**
   * @return Election
   */
  public function getElection()
  {
    return $this->election;
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
   * @param SimpleAddressType
   */
  public function setNormalizedInput(SimpleAddressType $normalizedInput)
  {
    $this->normalizedInput = $normalizedInput;
  }
  /**
   * @return SimpleAddressType
   */
  public function getNormalizedInput()
  {
    return $this->normalizedInput;
  }
  /**
   * @param Election[]
   */
  public function setOtherElections($otherElections)
  {
    $this->otherElections = $otherElections;
  }
  /**
   * @return Election[]
   */
  public function getOtherElections()
  {
    return $this->otherElections;
  }
  /**
   * @param PollingLocation[]
   */
  public function setPollingLocations($pollingLocations)
  {
    $this->pollingLocations = $pollingLocations;
  }
  /**
   * @return PollingLocation[]
   */
  public function getPollingLocations()
  {
    return $this->pollingLocations;
  }
  /**
   * @param string
   */
  public function setPrecinctId($precinctId)
  {
    $this->precinctId = $precinctId;
  }
  /**
   * @return string
   */
  public function getPrecinctId()
  {
    return $this->precinctId;
  }
  /**
   * @param Precinct[]
   */
  public function setPrecincts($precincts)
  {
    $this->precincts = $precincts;
  }
  /**
   * @return Precinct[]
   */
  public function getPrecincts()
  {
    return $this->precincts;
  }
  /**
   * @param AdministrationRegion[]
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return AdministrationRegion[]
   */
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VoterInfoResponse::class, 'Google_Service_CivicInfo_VoterInfoResponse');

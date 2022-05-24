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

class Contest extends \Google\Collection
{
  protected $collection_key = 'sources';
  /**
   * @var string
   */
  public $ballotPlacement;
  /**
   * @var string
   */
  public $ballotTitle;
  protected $candidatesType = Candidate::class;
  protected $candidatesDataType = 'array';
  protected $districtType = ElectoralDistrict::class;
  protected $districtDataType = '';
  /**
   * @var string
   */
  public $electorateSpecifications;
  /**
   * @var string[]
   */
  public $level;
  /**
   * @var string
   */
  public $numberElected;
  /**
   * @var string
   */
  public $numberVotingFor;
  /**
   * @var string
   */
  public $office;
  /**
   * @var string[]
   */
  public $primaryParties;
  /**
   * @var string
   */
  public $primaryParty;
  /**
   * @var string[]
   */
  public $referendumBallotResponses;
  /**
   * @var string
   */
  public $referendumBrief;
  /**
   * @var string
   */
  public $referendumConStatement;
  /**
   * @var string
   */
  public $referendumEffectOfAbstain;
  /**
   * @var string
   */
  public $referendumPassageThreshold;
  /**
   * @var string
   */
  public $referendumProStatement;
  /**
   * @var string
   */
  public $referendumSubtitle;
  /**
   * @var string
   */
  public $referendumText;
  /**
   * @var string
   */
  public $referendumTitle;
  /**
   * @var string
   */
  public $referendumUrl;
  /**
   * @var string[]
   */
  public $roles;
  protected $sourcesType = Source::class;
  protected $sourcesDataType = 'array';
  /**
   * @var string
   */
  public $special;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setBallotPlacement($ballotPlacement)
  {
    $this->ballotPlacement = $ballotPlacement;
  }
  /**
   * @return string
   */
  public function getBallotPlacement()
  {
    return $this->ballotPlacement;
  }
  /**
   * @param string
   */
  public function setBallotTitle($ballotTitle)
  {
    $this->ballotTitle = $ballotTitle;
  }
  /**
   * @return string
   */
  public function getBallotTitle()
  {
    return $this->ballotTitle;
  }
  /**
   * @param Candidate[]
   */
  public function setCandidates($candidates)
  {
    $this->candidates = $candidates;
  }
  /**
   * @return Candidate[]
   */
  public function getCandidates()
  {
    return $this->candidates;
  }
  /**
   * @param ElectoralDistrict
   */
  public function setDistrict(ElectoralDistrict $district)
  {
    $this->district = $district;
  }
  /**
   * @return ElectoralDistrict
   */
  public function getDistrict()
  {
    return $this->district;
  }
  /**
   * @param string
   */
  public function setElectorateSpecifications($electorateSpecifications)
  {
    $this->electorateSpecifications = $electorateSpecifications;
  }
  /**
   * @return string
   */
  public function getElectorateSpecifications()
  {
    return $this->electorateSpecifications;
  }
  /**
   * @param string[]
   */
  public function setLevel($level)
  {
    $this->level = $level;
  }
  /**
   * @return string[]
   */
  public function getLevel()
  {
    return $this->level;
  }
  /**
   * @param string
   */
  public function setNumberElected($numberElected)
  {
    $this->numberElected = $numberElected;
  }
  /**
   * @return string
   */
  public function getNumberElected()
  {
    return $this->numberElected;
  }
  /**
   * @param string
   */
  public function setNumberVotingFor($numberVotingFor)
  {
    $this->numberVotingFor = $numberVotingFor;
  }
  /**
   * @return string
   */
  public function getNumberVotingFor()
  {
    return $this->numberVotingFor;
  }
  /**
   * @param string
   */
  public function setOffice($office)
  {
    $this->office = $office;
  }
  /**
   * @return string
   */
  public function getOffice()
  {
    return $this->office;
  }
  /**
   * @param string[]
   */
  public function setPrimaryParties($primaryParties)
  {
    $this->primaryParties = $primaryParties;
  }
  /**
   * @return string[]
   */
  public function getPrimaryParties()
  {
    return $this->primaryParties;
  }
  /**
   * @param string
   */
  public function setPrimaryParty($primaryParty)
  {
    $this->primaryParty = $primaryParty;
  }
  /**
   * @return string
   */
  public function getPrimaryParty()
  {
    return $this->primaryParty;
  }
  /**
   * @param string[]
   */
  public function setReferendumBallotResponses($referendumBallotResponses)
  {
    $this->referendumBallotResponses = $referendumBallotResponses;
  }
  /**
   * @return string[]
   */
  public function getReferendumBallotResponses()
  {
    return $this->referendumBallotResponses;
  }
  /**
   * @param string
   */
  public function setReferendumBrief($referendumBrief)
  {
    $this->referendumBrief = $referendumBrief;
  }
  /**
   * @return string
   */
  public function getReferendumBrief()
  {
    return $this->referendumBrief;
  }
  /**
   * @param string
   */
  public function setReferendumConStatement($referendumConStatement)
  {
    $this->referendumConStatement = $referendumConStatement;
  }
  /**
   * @return string
   */
  public function getReferendumConStatement()
  {
    return $this->referendumConStatement;
  }
  /**
   * @param string
   */
  public function setReferendumEffectOfAbstain($referendumEffectOfAbstain)
  {
    $this->referendumEffectOfAbstain = $referendumEffectOfAbstain;
  }
  /**
   * @return string
   */
  public function getReferendumEffectOfAbstain()
  {
    return $this->referendumEffectOfAbstain;
  }
  /**
   * @param string
   */
  public function setReferendumPassageThreshold($referendumPassageThreshold)
  {
    $this->referendumPassageThreshold = $referendumPassageThreshold;
  }
  /**
   * @return string
   */
  public function getReferendumPassageThreshold()
  {
    return $this->referendumPassageThreshold;
  }
  /**
   * @param string
   */
  public function setReferendumProStatement($referendumProStatement)
  {
    $this->referendumProStatement = $referendumProStatement;
  }
  /**
   * @return string
   */
  public function getReferendumProStatement()
  {
    return $this->referendumProStatement;
  }
  /**
   * @param string
   */
  public function setReferendumSubtitle($referendumSubtitle)
  {
    $this->referendumSubtitle = $referendumSubtitle;
  }
  /**
   * @return string
   */
  public function getReferendumSubtitle()
  {
    return $this->referendumSubtitle;
  }
  /**
   * @param string
   */
  public function setReferendumText($referendumText)
  {
    $this->referendumText = $referendumText;
  }
  /**
   * @return string
   */
  public function getReferendumText()
  {
    return $this->referendumText;
  }
  /**
   * @param string
   */
  public function setReferendumTitle($referendumTitle)
  {
    $this->referendumTitle = $referendumTitle;
  }
  /**
   * @return string
   */
  public function getReferendumTitle()
  {
    return $this->referendumTitle;
  }
  /**
   * @param string
   */
  public function setReferendumUrl($referendumUrl)
  {
    $this->referendumUrl = $referendumUrl;
  }
  /**
   * @return string
   */
  public function getReferendumUrl()
  {
    return $this->referendumUrl;
  }
  /**
   * @param string[]
   */
  public function setRoles($roles)
  {
    $this->roles = $roles;
  }
  /**
   * @return string[]
   */
  public function getRoles()
  {
    return $this->roles;
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
  public function setSpecial($special)
  {
    $this->special = $special;
  }
  /**
   * @return string
   */
  public function getSpecial()
  {
    return $this->special;
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
class_alias(Contest::class, 'Google_Service_CivicInfo_Contest');

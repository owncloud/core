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

class AdministrativeBody extends \Google\Collection
{
  protected $collection_key = 'voter_services';
  protected $internal_gapi_mappings = [
        "voterServices" => "voter_services",
  ];
  /**
   * @var string
   */
  public $absenteeVotingInfoUrl;
  /**
   * @var string
   */
  public $ballotInfoUrl;
  protected $correspondenceAddressType = SimpleAddressType::class;
  protected $correspondenceAddressDataType = '';
  /**
   * @var string
   */
  public $electionInfoUrl;
  /**
   * @var string
   */
  public $electionNoticeText;
  /**
   * @var string
   */
  public $electionNoticeUrl;
  protected $electionOfficialsType = ElectionOfficial::class;
  protected $electionOfficialsDataType = 'array';
  /**
   * @var string
   */
  public $electionRegistrationConfirmationUrl;
  /**
   * @var string
   */
  public $electionRegistrationUrl;
  /**
   * @var string
   */
  public $electionRulesUrl;
  /**
   * @var string
   */
  public $hoursOfOperation;
  /**
   * @var string
   */
  public $name;
  protected $physicalAddressType = SimpleAddressType::class;
  protected $physicalAddressDataType = '';
  /**
   * @var string[]
   */
  public $voterServices;
  /**
   * @var string
   */
  public $votingLocationFinderUrl;

  /**
   * @param string
   */
  public function setAbsenteeVotingInfoUrl($absenteeVotingInfoUrl)
  {
    $this->absenteeVotingInfoUrl = $absenteeVotingInfoUrl;
  }
  /**
   * @return string
   */
  public function getAbsenteeVotingInfoUrl()
  {
    return $this->absenteeVotingInfoUrl;
  }
  /**
   * @param string
   */
  public function setBallotInfoUrl($ballotInfoUrl)
  {
    $this->ballotInfoUrl = $ballotInfoUrl;
  }
  /**
   * @return string
   */
  public function getBallotInfoUrl()
  {
    return $this->ballotInfoUrl;
  }
  /**
   * @param SimpleAddressType
   */
  public function setCorrespondenceAddress(SimpleAddressType $correspondenceAddress)
  {
    $this->correspondenceAddress = $correspondenceAddress;
  }
  /**
   * @return SimpleAddressType
   */
  public function getCorrespondenceAddress()
  {
    return $this->correspondenceAddress;
  }
  /**
   * @param string
   */
  public function setElectionInfoUrl($electionInfoUrl)
  {
    $this->electionInfoUrl = $electionInfoUrl;
  }
  /**
   * @return string
   */
  public function getElectionInfoUrl()
  {
    return $this->electionInfoUrl;
  }
  /**
   * @param string
   */
  public function setElectionNoticeText($electionNoticeText)
  {
    $this->electionNoticeText = $electionNoticeText;
  }
  /**
   * @return string
   */
  public function getElectionNoticeText()
  {
    return $this->electionNoticeText;
  }
  /**
   * @param string
   */
  public function setElectionNoticeUrl($electionNoticeUrl)
  {
    $this->electionNoticeUrl = $electionNoticeUrl;
  }
  /**
   * @return string
   */
  public function getElectionNoticeUrl()
  {
    return $this->electionNoticeUrl;
  }
  /**
   * @param ElectionOfficial[]
   */
  public function setElectionOfficials($electionOfficials)
  {
    $this->electionOfficials = $electionOfficials;
  }
  /**
   * @return ElectionOfficial[]
   */
  public function getElectionOfficials()
  {
    return $this->electionOfficials;
  }
  /**
   * @param string
   */
  public function setElectionRegistrationConfirmationUrl($electionRegistrationConfirmationUrl)
  {
    $this->electionRegistrationConfirmationUrl = $electionRegistrationConfirmationUrl;
  }
  /**
   * @return string
   */
  public function getElectionRegistrationConfirmationUrl()
  {
    return $this->electionRegistrationConfirmationUrl;
  }
  /**
   * @param string
   */
  public function setElectionRegistrationUrl($electionRegistrationUrl)
  {
    $this->electionRegistrationUrl = $electionRegistrationUrl;
  }
  /**
   * @return string
   */
  public function getElectionRegistrationUrl()
  {
    return $this->electionRegistrationUrl;
  }
  /**
   * @param string
   */
  public function setElectionRulesUrl($electionRulesUrl)
  {
    $this->electionRulesUrl = $electionRulesUrl;
  }
  /**
   * @return string
   */
  public function getElectionRulesUrl()
  {
    return $this->electionRulesUrl;
  }
  /**
   * @param string
   */
  public function setHoursOfOperation($hoursOfOperation)
  {
    $this->hoursOfOperation = $hoursOfOperation;
  }
  /**
   * @return string
   */
  public function getHoursOfOperation()
  {
    return $this->hoursOfOperation;
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
   * @param SimpleAddressType
   */
  public function setPhysicalAddress(SimpleAddressType $physicalAddress)
  {
    $this->physicalAddress = $physicalAddress;
  }
  /**
   * @return SimpleAddressType
   */
  public function getPhysicalAddress()
  {
    return $this->physicalAddress;
  }
  /**
   * @param string[]
   */
  public function setVoterServices($voterServices)
  {
    $this->voterServices = $voterServices;
  }
  /**
   * @return string[]
   */
  public function getVoterServices()
  {
    return $this->voterServices;
  }
  /**
   * @param string
   */
  public function setVotingLocationFinderUrl($votingLocationFinderUrl)
  {
    $this->votingLocationFinderUrl = $votingLocationFinderUrl;
  }
  /**
   * @return string
   */
  public function getVotingLocationFinderUrl()
  {
    return $this->votingLocationFinderUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdministrativeBody::class, 'Google_Service_CivicInfo_AdministrativeBody');

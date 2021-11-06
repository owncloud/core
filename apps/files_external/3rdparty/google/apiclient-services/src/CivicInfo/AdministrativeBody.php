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
  public $absenteeVotingInfoUrl;
  public $ballotInfoUrl;
  protected $correspondenceAddressType = SimpleAddressType::class;
  protected $correspondenceAddressDataType = '';
  public $electionInfoUrl;
  public $electionNoticeText;
  public $electionNoticeUrl;
  protected $electionOfficialsType = ElectionOfficial::class;
  protected $electionOfficialsDataType = 'array';
  public $electionRegistrationConfirmationUrl;
  public $electionRegistrationUrl;
  public $electionRulesUrl;
  public $hoursOfOperation;
  public $name;
  protected $physicalAddressType = SimpleAddressType::class;
  protected $physicalAddressDataType = '';
  public $voterServices;
  public $votingLocationFinderUrl;

  public function setAbsenteeVotingInfoUrl($absenteeVotingInfoUrl)
  {
    $this->absenteeVotingInfoUrl = $absenteeVotingInfoUrl;
  }
  public function getAbsenteeVotingInfoUrl()
  {
    return $this->absenteeVotingInfoUrl;
  }
  public function setBallotInfoUrl($ballotInfoUrl)
  {
    $this->ballotInfoUrl = $ballotInfoUrl;
  }
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
  public function setElectionInfoUrl($electionInfoUrl)
  {
    $this->electionInfoUrl = $electionInfoUrl;
  }
  public function getElectionInfoUrl()
  {
    return $this->electionInfoUrl;
  }
  public function setElectionNoticeText($electionNoticeText)
  {
    $this->electionNoticeText = $electionNoticeText;
  }
  public function getElectionNoticeText()
  {
    return $this->electionNoticeText;
  }
  public function setElectionNoticeUrl($electionNoticeUrl)
  {
    $this->electionNoticeUrl = $electionNoticeUrl;
  }
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
  public function setElectionRegistrationConfirmationUrl($electionRegistrationConfirmationUrl)
  {
    $this->electionRegistrationConfirmationUrl = $electionRegistrationConfirmationUrl;
  }
  public function getElectionRegistrationConfirmationUrl()
  {
    return $this->electionRegistrationConfirmationUrl;
  }
  public function setElectionRegistrationUrl($electionRegistrationUrl)
  {
    $this->electionRegistrationUrl = $electionRegistrationUrl;
  }
  public function getElectionRegistrationUrl()
  {
    return $this->electionRegistrationUrl;
  }
  public function setElectionRulesUrl($electionRulesUrl)
  {
    $this->electionRulesUrl = $electionRulesUrl;
  }
  public function getElectionRulesUrl()
  {
    return $this->electionRulesUrl;
  }
  public function setHoursOfOperation($hoursOfOperation)
  {
    $this->hoursOfOperation = $hoursOfOperation;
  }
  public function getHoursOfOperation()
  {
    return $this->hoursOfOperation;
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
  public function setVoterServices($voterServices)
  {
    $this->voterServices = $voterServices;
  }
  public function getVoterServices()
  {
    return $this->voterServices;
  }
  public function setVotingLocationFinderUrl($votingLocationFinderUrl)
  {
    $this->votingLocationFinderUrl = $votingLocationFinderUrl;
  }
  public function getVotingLocationFinderUrl()
  {
    return $this->votingLocationFinderUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdministrativeBody::class, 'Google_Service_CivicInfo_AdministrativeBody');

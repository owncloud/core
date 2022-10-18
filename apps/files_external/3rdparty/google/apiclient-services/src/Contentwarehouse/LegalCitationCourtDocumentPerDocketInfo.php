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

namespace Google\Service\Contentwarehouse;

class LegalCitationCourtDocumentPerDocketInfo extends \Google\Collection
{
  protected $collection_key = 'RespondentCounsel';
  protected $internal_gapi_mappings = [
        "docketID" => "DocketID",
        "petitioner" => "Petitioner",
        "petitionerCounsel" => "PetitionerCounsel",
        "respondent" => "Respondent",
        "respondentCounsel" => "RespondentCounsel",
        "topic" => "Topic",
  ];
  /**
   * @var string
   */
  public $docketID;
  protected $petitionerType = LegalPerson::class;
  protected $petitionerDataType = 'array';
  protected $petitionerCounselType = LegalPerson::class;
  protected $petitionerCounselDataType = 'array';
  protected $respondentType = LegalPerson::class;
  protected $respondentDataType = 'array';
  protected $respondentCounselType = LegalPerson::class;
  protected $respondentCounselDataType = 'array';
  /**
   * @var string
   */
  public $topic;

  /**
   * @param string
   */
  public function setDocketID($docketID)
  {
    $this->docketID = $docketID;
  }
  /**
   * @return string
   */
  public function getDocketID()
  {
    return $this->docketID;
  }
  /**
   * @param LegalPerson[]
   */
  public function setPetitioner($petitioner)
  {
    $this->petitioner = $petitioner;
  }
  /**
   * @return LegalPerson[]
   */
  public function getPetitioner()
  {
    return $this->petitioner;
  }
  /**
   * @param LegalPerson[]
   */
  public function setPetitionerCounsel($petitionerCounsel)
  {
    $this->petitionerCounsel = $petitionerCounsel;
  }
  /**
   * @return LegalPerson[]
   */
  public function getPetitionerCounsel()
  {
    return $this->petitionerCounsel;
  }
  /**
   * @param LegalPerson[]
   */
  public function setRespondent($respondent)
  {
    $this->respondent = $respondent;
  }
  /**
   * @return LegalPerson[]
   */
  public function getRespondent()
  {
    return $this->respondent;
  }
  /**
   * @param LegalPerson[]
   */
  public function setRespondentCounsel($respondentCounsel)
  {
    $this->respondentCounsel = $respondentCounsel;
  }
  /**
   * @return LegalPerson[]
   */
  public function getRespondentCounsel()
  {
    return $this->respondentCounsel;
  }
  /**
   * @param string
   */
  public function setTopic($topic)
  {
    $this->topic = $topic;
  }
  /**
   * @return string
   */
  public function getTopic()
  {
    return $this->topic;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LegalCitationCourtDocumentPerDocketInfo::class, 'Google_Service_Contentwarehouse_LegalCitationCourtDocumentPerDocketInfo');

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

class LegalCitation extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "countryCode" => "CountryCode",
        "parseType" => "ParseType",
        "state" => "State",
        "type" => "Type",
  ];
  /**
   * @var string
   */
  public $countryCode;
  /**
   * @var int
   */
  public $parseType;
  /**
   * @var string
   */
  public $state;
  /**
   * @var int
   */
  public $type;
  protected $courtdocumentType = LegalCitationCourtDocument::class;
  protected $courtdocumentDataType = '';
  protected $lawType = LegalCitationLaw::class;
  protected $lawDataType = '';

  /**
   * @param string
   */
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  /**
   * @return string
   */
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  /**
   * @param int
   */
  public function setParseType($parseType)
  {
    $this->parseType = $parseType;
  }
  /**
   * @return int
   */
  public function getParseType()
  {
    return $this->parseType;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param int
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return int
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param LegalCitationCourtDocument
   */
  public function setCourtdocument(LegalCitationCourtDocument $courtdocument)
  {
    $this->courtdocument = $courtdocument;
  }
  /**
   * @return LegalCitationCourtDocument
   */
  public function getCourtdocument()
  {
    return $this->courtdocument;
  }
  /**
   * @param LegalCitationLaw
   */
  public function setLaw(LegalCitationLaw $law)
  {
    $this->law = $law;
  }
  /**
   * @return LegalCitationLaw
   */
  public function getLaw()
  {
    return $this->law;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LegalCitation::class, 'Google_Service_Contentwarehouse_LegalCitation');

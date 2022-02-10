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

namespace Google\Service\CloudTalentSolution;

class PostalAddress extends \Google\Collection
{
  protected $collection_key = 'recipients';
  /**
   * @var string[]
   */
  public $addressLines;
  /**
   * @var string
   */
  public $administrativeArea;
  /**
   * @var string
   */
  public $languageCode;
  /**
   * @var string
   */
  public $locality;
  /**
   * @var string
   */
  public $organization;
  /**
   * @var string
   */
  public $postalCode;
  /**
   * @var string[]
   */
  public $recipients;
  /**
   * @var string
   */
  public $regionCode;
  /**
   * @var int
   */
  public $revision;
  /**
   * @var string
   */
  public $sortingCode;
  /**
   * @var string
   */
  public $sublocality;

  /**
   * @param string[]
   */
  public function setAddressLines($addressLines)
  {
    $this->addressLines = $addressLines;
  }
  /**
   * @return string[]
   */
  public function getAddressLines()
  {
    return $this->addressLines;
  }
  /**
   * @param string
   */
  public function setAdministrativeArea($administrativeArea)
  {
    $this->administrativeArea = $administrativeArea;
  }
  /**
   * @return string
   */
  public function getAdministrativeArea()
  {
    return $this->administrativeArea;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param string
   */
  public function setLocality($locality)
  {
    $this->locality = $locality;
  }
  /**
   * @return string
   */
  public function getLocality()
  {
    return $this->locality;
  }
  /**
   * @param string
   */
  public function setOrganization($organization)
  {
    $this->organization = $organization;
  }
  /**
   * @return string
   */
  public function getOrganization()
  {
    return $this->organization;
  }
  /**
   * @param string
   */
  public function setPostalCode($postalCode)
  {
    $this->postalCode = $postalCode;
  }
  /**
   * @return string
   */
  public function getPostalCode()
  {
    return $this->postalCode;
  }
  /**
   * @param string[]
   */
  public function setRecipients($recipients)
  {
    $this->recipients = $recipients;
  }
  /**
   * @return string[]
   */
  public function getRecipients()
  {
    return $this->recipients;
  }
  /**
   * @param string
   */
  public function setRegionCode($regionCode)
  {
    $this->regionCode = $regionCode;
  }
  /**
   * @return string
   */
  public function getRegionCode()
  {
    return $this->regionCode;
  }
  /**
   * @param int
   */
  public function setRevision($revision)
  {
    $this->revision = $revision;
  }
  /**
   * @return int
   */
  public function getRevision()
  {
    return $this->revision;
  }
  /**
   * @param string
   */
  public function setSortingCode($sortingCode)
  {
    $this->sortingCode = $sortingCode;
  }
  /**
   * @return string
   */
  public function getSortingCode()
  {
    return $this->sortingCode;
  }
  /**
   * @param string
   */
  public function setSublocality($sublocality)
  {
    $this->sublocality = $sublocality;
  }
  /**
   * @return string
   */
  public function getSublocality()
  {
    return $this->sublocality;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PostalAddress::class, 'Google_Service_CloudTalentSolution_PostalAddress');

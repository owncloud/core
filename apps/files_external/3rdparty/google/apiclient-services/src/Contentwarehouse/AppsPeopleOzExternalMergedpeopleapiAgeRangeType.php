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

class AppsPeopleOzExternalMergedpeopleapiAgeRangeType extends \Google\Model
{
  /**
   * @var int
   */
  public $ageInYears;
  /**
   * @var string
   */
  public $ageOfConsentStatus;
  /**
   * @var string
   */
  public $ageRange;
  protected $metadataType = AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata::class;
  protected $metadataDataType = '';

  /**
   * @param int
   */
  public function setAgeInYears($ageInYears)
  {
    $this->ageInYears = $ageInYears;
  }
  /**
   * @return int
   */
  public function getAgeInYears()
  {
    return $this->ageInYears;
  }
  /**
   * @param string
   */
  public function setAgeOfConsentStatus($ageOfConsentStatus)
  {
    $this->ageOfConsentStatus = $ageOfConsentStatus;
  }
  /**
   * @return string
   */
  public function getAgeOfConsentStatus()
  {
    return $this->ageOfConsentStatus;
  }
  /**
   * @param string
   */
  public function setAgeRange($ageRange)
  {
    $this->ageRange = $ageRange;
  }
  /**
   * @return string
   */
  public function getAgeRange()
  {
    return $this->ageRange;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function setMetadata(AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiAgeRangeType::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiAgeRangeType');

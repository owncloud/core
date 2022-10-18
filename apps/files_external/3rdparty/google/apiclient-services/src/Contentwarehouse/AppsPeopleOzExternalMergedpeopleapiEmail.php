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

class AppsPeopleOzExternalMergedpeopleapiEmail extends \Google\Collection
{
  protected $collection_key = 'contactGroupPreference';
  protected $certificateType = AppsPeopleOzExternalMergedpeopleapiEmailCertificate::class;
  protected $certificateDataType = 'array';
  /**
   * @var string
   */
  public $classification;
  protected $contactGroupPreferenceType = AppsPeopleOzExternalMergedpeopleapiEmailContactGroupPreference::class;
  protected $contactGroupPreferenceDataType = 'array';
  /**
   * @var string
   */
  public $displayName;
  protected $extendedDataType = AppsPeopleOzExternalMergedpeopleapiEmailExtendedData::class;
  protected $extendedDataDataType = '';
  /**
   * @var string
   */
  public $formattedType;
  protected $metadataType = AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata::class;
  protected $metadataDataType = '';
  protected $signupEmailMetadataType = AppsPeopleOzExternalMergedpeopleapiEmailSignupEmailMetadata::class;
  protected $signupEmailMetadataDataType = '';
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $value;

  /**
   * @param AppsPeopleOzExternalMergedpeopleapiEmailCertificate[]
   */
  public function setCertificate($certificate)
  {
    $this->certificate = $certificate;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiEmailCertificate[]
   */
  public function getCertificate()
  {
    return $this->certificate;
  }
  /**
   * @param string
   */
  public function setClassification($classification)
  {
    $this->classification = $classification;
  }
  /**
   * @return string
   */
  public function getClassification()
  {
    return $this->classification;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiEmailContactGroupPreference[]
   */
  public function setContactGroupPreference($contactGroupPreference)
  {
    $this->contactGroupPreference = $contactGroupPreference;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiEmailContactGroupPreference[]
   */
  public function getContactGroupPreference()
  {
    return $this->contactGroupPreference;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiEmailExtendedData
   */
  public function setExtendedData(AppsPeopleOzExternalMergedpeopleapiEmailExtendedData $extendedData)
  {
    $this->extendedData = $extendedData;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiEmailExtendedData
   */
  public function getExtendedData()
  {
    return $this->extendedData;
  }
  /**
   * @param string
   */
  public function setFormattedType($formattedType)
  {
    $this->formattedType = $formattedType;
  }
  /**
   * @return string
   */
  public function getFormattedType()
  {
    return $this->formattedType;
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
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiEmailSignupEmailMetadata
   */
  public function setSignupEmailMetadata(AppsPeopleOzExternalMergedpeopleapiEmailSignupEmailMetadata $signupEmailMetadata)
  {
    $this->signupEmailMetadata = $signupEmailMetadata;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiEmailSignupEmailMetadata
   */
  public function getSignupEmailMetadata()
  {
    return $this->signupEmailMetadata;
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
  /**
   * @param string
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return string
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiEmail::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiEmail');

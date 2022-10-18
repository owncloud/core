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

class SocialGraphApiProtoSearchProfileData extends \Google\Collection
{
  protected $collection_key = 'workplace';
  /**
   * @var string
   */
  public $description;
  protected $educationType = SocialGraphApiProtoSearchProfileEducation::class;
  protected $educationDataType = 'array';
  protected $interestType = SocialGraphApiProtoSearchProfileEntity::class;
  protected $interestDataType = 'array';
  /**
   * @var string
   */
  public $language;
  protected $locationType = SocialGraphApiProtoSearchProfileLocation::class;
  protected $locationDataType = 'array';
  protected $metadataType = SocialGraphApiProtoSearchProfileMetadata::class;
  protected $metadataDataType = '';
  protected $occupationType = SocialGraphApiProtoSearchProfileEntity::class;
  protected $occupationDataType = 'array';
  /**
   * @var string[]
   */
  public $publicEmail;
  /**
   * @var string[]
   */
  public $publicPhoneNumber;
  protected $socialLinkType = SocialGraphApiProtoSearchProfileSocialLink::class;
  protected $socialLinkDataType = 'array';
  /**
   * @var string[]
   */
  public $website;
  protected $workplaceType = SocialGraphApiProtoSearchProfileWorkplace::class;
  protected $workplaceDataType = 'array';

  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param SocialGraphApiProtoSearchProfileEducation[]
   */
  public function setEducation($education)
  {
    $this->education = $education;
  }
  /**
   * @return SocialGraphApiProtoSearchProfileEducation[]
   */
  public function getEducation()
  {
    return $this->education;
  }
  /**
   * @param SocialGraphApiProtoSearchProfileEntity[]
   */
  public function setInterest($interest)
  {
    $this->interest = $interest;
  }
  /**
   * @return SocialGraphApiProtoSearchProfileEntity[]
   */
  public function getInterest()
  {
    return $this->interest;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param SocialGraphApiProtoSearchProfileLocation[]
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return SocialGraphApiProtoSearchProfileLocation[]
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param SocialGraphApiProtoSearchProfileMetadata
   */
  public function setMetadata(SocialGraphApiProtoSearchProfileMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return SocialGraphApiProtoSearchProfileMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param SocialGraphApiProtoSearchProfileEntity[]
   */
  public function setOccupation($occupation)
  {
    $this->occupation = $occupation;
  }
  /**
   * @return SocialGraphApiProtoSearchProfileEntity[]
   */
  public function getOccupation()
  {
    return $this->occupation;
  }
  /**
   * @param string[]
   */
  public function setPublicEmail($publicEmail)
  {
    $this->publicEmail = $publicEmail;
  }
  /**
   * @return string[]
   */
  public function getPublicEmail()
  {
    return $this->publicEmail;
  }
  /**
   * @param string[]
   */
  public function setPublicPhoneNumber($publicPhoneNumber)
  {
    $this->publicPhoneNumber = $publicPhoneNumber;
  }
  /**
   * @return string[]
   */
  public function getPublicPhoneNumber()
  {
    return $this->publicPhoneNumber;
  }
  /**
   * @param SocialGraphApiProtoSearchProfileSocialLink[]
   */
  public function setSocialLink($socialLink)
  {
    $this->socialLink = $socialLink;
  }
  /**
   * @return SocialGraphApiProtoSearchProfileSocialLink[]
   */
  public function getSocialLink()
  {
    return $this->socialLink;
  }
  /**
   * @param string[]
   */
  public function setWebsite($website)
  {
    $this->website = $website;
  }
  /**
   * @return string[]
   */
  public function getWebsite()
  {
    return $this->website;
  }
  /**
   * @param SocialGraphApiProtoSearchProfileWorkplace[]
   */
  public function setWorkplace($workplace)
  {
    $this->workplace = $workplace;
  }
  /**
   * @return SocialGraphApiProtoSearchProfileWorkplace[]
   */
  public function getWorkplace()
  {
    return $this->workplace;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SocialGraphApiProtoSearchProfileData::class, 'Google_Service_Contentwarehouse_SocialGraphApiProtoSearchProfileData');

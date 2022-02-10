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

namespace Google\Service\AndroidManagement;

class Enterprise extends \Google\Collection
{
  protected $collection_key = 'termsAndConditions';
  /**
   * @var bool
   */
  public $appAutoApprovalEnabled;
  protected $contactInfoType = ContactInfo::class;
  protected $contactInfoDataType = '';
  /**
   * @var string[]
   */
  public $enabledNotificationTypes;
  /**
   * @var string
   */
  public $enterpriseDisplayName;
  protected $logoType = ExternalData::class;
  protected $logoDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var int
   */
  public $primaryColor;
  /**
   * @var string
   */
  public $pubsubTopic;
  protected $signinDetailsType = SigninDetail::class;
  protected $signinDetailsDataType = 'array';
  protected $termsAndConditionsType = TermsAndConditions::class;
  protected $termsAndConditionsDataType = 'array';

  /**
   * @param bool
   */
  public function setAppAutoApprovalEnabled($appAutoApprovalEnabled)
  {
    $this->appAutoApprovalEnabled = $appAutoApprovalEnabled;
  }
  /**
   * @return bool
   */
  public function getAppAutoApprovalEnabled()
  {
    return $this->appAutoApprovalEnabled;
  }
  /**
   * @param ContactInfo
   */
  public function setContactInfo(ContactInfo $contactInfo)
  {
    $this->contactInfo = $contactInfo;
  }
  /**
   * @return ContactInfo
   */
  public function getContactInfo()
  {
    return $this->contactInfo;
  }
  /**
   * @param string[]
   */
  public function setEnabledNotificationTypes($enabledNotificationTypes)
  {
    $this->enabledNotificationTypes = $enabledNotificationTypes;
  }
  /**
   * @return string[]
   */
  public function getEnabledNotificationTypes()
  {
    return $this->enabledNotificationTypes;
  }
  /**
   * @param string
   */
  public function setEnterpriseDisplayName($enterpriseDisplayName)
  {
    $this->enterpriseDisplayName = $enterpriseDisplayName;
  }
  /**
   * @return string
   */
  public function getEnterpriseDisplayName()
  {
    return $this->enterpriseDisplayName;
  }
  /**
   * @param ExternalData
   */
  public function setLogo(ExternalData $logo)
  {
    $this->logo = $logo;
  }
  /**
   * @return ExternalData
   */
  public function getLogo()
  {
    return $this->logo;
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
   * @param int
   */
  public function setPrimaryColor($primaryColor)
  {
    $this->primaryColor = $primaryColor;
  }
  /**
   * @return int
   */
  public function getPrimaryColor()
  {
    return $this->primaryColor;
  }
  /**
   * @param string
   */
  public function setPubsubTopic($pubsubTopic)
  {
    $this->pubsubTopic = $pubsubTopic;
  }
  /**
   * @return string
   */
  public function getPubsubTopic()
  {
    return $this->pubsubTopic;
  }
  /**
   * @param SigninDetail[]
   */
  public function setSigninDetails($signinDetails)
  {
    $this->signinDetails = $signinDetails;
  }
  /**
   * @return SigninDetail[]
   */
  public function getSigninDetails()
  {
    return $this->signinDetails;
  }
  /**
   * @param TermsAndConditions[]
   */
  public function setTermsAndConditions($termsAndConditions)
  {
    $this->termsAndConditions = $termsAndConditions;
  }
  /**
   * @return TermsAndConditions[]
   */
  public function getTermsAndConditions()
  {
    return $this->termsAndConditions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Enterprise::class, 'Google_Service_AndroidManagement_Enterprise');

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

namespace Google\Service\RecaptchaEnterprise;

class GoogleCloudRecaptchaenterpriseV1WebKeySettings extends \Google\Collection
{
  protected $collection_key = 'allowedDomains';
  /**
   * @var bool
   */
  public $allowAllDomains;
  /**
   * @var bool
   */
  public $allowAmpTraffic;
  /**
   * @var string[]
   */
  public $allowedDomains;
  /**
   * @var string
   */
  public $challengeSecurityPreference;
  /**
   * @var string
   */
  public $integrationType;

  /**
   * @param bool
   */
  public function setAllowAllDomains($allowAllDomains)
  {
    $this->allowAllDomains = $allowAllDomains;
  }
  /**
   * @return bool
   */
  public function getAllowAllDomains()
  {
    return $this->allowAllDomains;
  }
  /**
   * @param bool
   */
  public function setAllowAmpTraffic($allowAmpTraffic)
  {
    $this->allowAmpTraffic = $allowAmpTraffic;
  }
  /**
   * @return bool
   */
  public function getAllowAmpTraffic()
  {
    return $this->allowAmpTraffic;
  }
  /**
   * @param string[]
   */
  public function setAllowedDomains($allowedDomains)
  {
    $this->allowedDomains = $allowedDomains;
  }
  /**
   * @return string[]
   */
  public function getAllowedDomains()
  {
    return $this->allowedDomains;
  }
  /**
   * @param string
   */
  public function setChallengeSecurityPreference($challengeSecurityPreference)
  {
    $this->challengeSecurityPreference = $challengeSecurityPreference;
  }
  /**
   * @return string
   */
  public function getChallengeSecurityPreference()
  {
    return $this->challengeSecurityPreference;
  }
  /**
   * @param string
   */
  public function setIntegrationType($integrationType)
  {
    $this->integrationType = $integrationType;
  }
  /**
   * @return string
   */
  public function getIntegrationType()
  {
    return $this->integrationType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecaptchaenterpriseV1WebKeySettings::class, 'Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1WebKeySettings');

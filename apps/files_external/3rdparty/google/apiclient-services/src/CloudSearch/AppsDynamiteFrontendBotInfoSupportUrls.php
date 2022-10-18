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

namespace Google\Service\CloudSearch;

class AppsDynamiteFrontendBotInfoSupportUrls extends \Google\Model
{
  /**
   * @var string
   */
  public $adminConfigUrl;
  /**
   * @var string
   */
  public $deletionPolicyUrl;
  /**
   * @var string
   */
  public $privacyPolicyUrl;
  /**
   * @var string
   */
  public $setupUrl;
  /**
   * @var string
   */
  public $supportUrl;
  /**
   * @var string
   */
  public $tosUrl;

  /**
   * @param string
   */
  public function setAdminConfigUrl($adminConfigUrl)
  {
    $this->adminConfigUrl = $adminConfigUrl;
  }
  /**
   * @return string
   */
  public function getAdminConfigUrl()
  {
    return $this->adminConfigUrl;
  }
  /**
   * @param string
   */
  public function setDeletionPolicyUrl($deletionPolicyUrl)
  {
    $this->deletionPolicyUrl = $deletionPolicyUrl;
  }
  /**
   * @return string
   */
  public function getDeletionPolicyUrl()
  {
    return $this->deletionPolicyUrl;
  }
  /**
   * @param string
   */
  public function setPrivacyPolicyUrl($privacyPolicyUrl)
  {
    $this->privacyPolicyUrl = $privacyPolicyUrl;
  }
  /**
   * @return string
   */
  public function getPrivacyPolicyUrl()
  {
    return $this->privacyPolicyUrl;
  }
  /**
   * @param string
   */
  public function setSetupUrl($setupUrl)
  {
    $this->setupUrl = $setupUrl;
  }
  /**
   * @return string
   */
  public function getSetupUrl()
  {
    return $this->setupUrl;
  }
  /**
   * @param string
   */
  public function setSupportUrl($supportUrl)
  {
    $this->supportUrl = $supportUrl;
  }
  /**
   * @return string
   */
  public function getSupportUrl()
  {
    return $this->supportUrl;
  }
  /**
   * @param string
   */
  public function setTosUrl($tosUrl)
  {
    $this->tosUrl = $tosUrl;
  }
  /**
   * @return string
   */
  public function getTosUrl()
  {
    return $this->tosUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteFrontendBotInfoSupportUrls::class, 'Google_Service_CloudSearch_AppsDynamiteFrontendBotInfoSupportUrls');

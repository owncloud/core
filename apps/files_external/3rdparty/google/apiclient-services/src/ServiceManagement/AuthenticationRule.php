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

namespace Google\Service\ServiceManagement;

class AuthenticationRule extends \Google\Collection
{
  protected $collection_key = 'requirements';
  /**
   * @var bool
   */
  public $allowWithoutCredential;
  protected $oauthType = OAuthRequirements::class;
  protected $oauthDataType = '';
  protected $requirementsType = AuthRequirement::class;
  protected $requirementsDataType = 'array';
  /**
   * @var string
   */
  public $selector;

  /**
   * @param bool
   */
  public function setAllowWithoutCredential($allowWithoutCredential)
  {
    $this->allowWithoutCredential = $allowWithoutCredential;
  }
  /**
   * @return bool
   */
  public function getAllowWithoutCredential()
  {
    return $this->allowWithoutCredential;
  }
  /**
   * @param OAuthRequirements
   */
  public function setOauth(OAuthRequirements $oauth)
  {
    $this->oauth = $oauth;
  }
  /**
   * @return OAuthRequirements
   */
  public function getOauth()
  {
    return $this->oauth;
  }
  /**
   * @param AuthRequirement[]
   */
  public function setRequirements($requirements)
  {
    $this->requirements = $requirements;
  }
  /**
   * @return AuthRequirement[]
   */
  public function getRequirements()
  {
    return $this->requirements;
  }
  /**
   * @param string
   */
  public function setSelector($selector)
  {
    $this->selector = $selector;
  }
  /**
   * @return string
   */
  public function getSelector()
  {
    return $this->selector;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AuthenticationRule::class, 'Google_Service_ServiceManagement_AuthenticationRule');

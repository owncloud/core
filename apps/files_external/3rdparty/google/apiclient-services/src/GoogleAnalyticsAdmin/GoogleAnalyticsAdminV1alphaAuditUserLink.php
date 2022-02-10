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

namespace Google\Service\GoogleAnalyticsAdmin;

class GoogleAnalyticsAdminV1alphaAuditUserLink extends \Google\Collection
{
  protected $collection_key = 'effectiveRoles';
  /**
   * @var string[]
   */
  public $directRoles;
  /**
   * @var string[]
   */
  public $effectiveRoles;
  /**
   * @var string
   */
  public $emailAddress;
  /**
   * @var string
   */
  public $name;

  /**
   * @param string[]
   */
  public function setDirectRoles($directRoles)
  {
    $this->directRoles = $directRoles;
  }
  /**
   * @return string[]
   */
  public function getDirectRoles()
  {
    return $this->directRoles;
  }
  /**
   * @param string[]
   */
  public function setEffectiveRoles($effectiveRoles)
  {
    $this->effectiveRoles = $effectiveRoles;
  }
  /**
   * @return string[]
   */
  public function getEffectiveRoles()
  {
    return $this->effectiveRoles;
  }
  /**
   * @param string
   */
  public function setEmailAddress($emailAddress)
  {
    $this->emailAddress = $emailAddress;
  }
  /**
   * @return string
   */
  public function getEmailAddress()
  {
    return $this->emailAddress;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaAuditUserLink::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAuditUserLink');

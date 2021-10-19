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

class SpecificNonComplianceContext extends \Google\Model
{
  protected $oncWifiContextType = OncWifiContext::class;
  protected $oncWifiContextDataType = '';
  protected $passwordPoliciesContextType = PasswordPoliciesContext::class;
  protected $passwordPoliciesContextDataType = '';

  /**
   * @param OncWifiContext
   */
  public function setOncWifiContext(OncWifiContext $oncWifiContext)
  {
    $this->oncWifiContext = $oncWifiContext;
  }
  /**
   * @return OncWifiContext
   */
  public function getOncWifiContext()
  {
    return $this->oncWifiContext;
  }
  /**
   * @param PasswordPoliciesContext
   */
  public function setPasswordPoliciesContext(PasswordPoliciesContext $passwordPoliciesContext)
  {
    $this->passwordPoliciesContext = $passwordPoliciesContext;
  }
  /**
   * @return PasswordPoliciesContext
   */
  public function getPasswordPoliciesContext()
  {
    return $this->passwordPoliciesContext;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SpecificNonComplianceContext::class, 'Google_Service_AndroidManagement_SpecificNonComplianceContext');

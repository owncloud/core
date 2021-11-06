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

namespace Google\Service\Compute;

class SecurityPolicyAdaptiveProtectionConfig extends \Google\Model
{
  protected $layer7DdosDefenseConfigType = SecurityPolicyAdaptiveProtectionConfigLayer7DdosDefenseConfig::class;
  protected $layer7DdosDefenseConfigDataType = '';

  /**
   * @param SecurityPolicyAdaptiveProtectionConfigLayer7DdosDefenseConfig
   */
  public function setLayer7DdosDefenseConfig(SecurityPolicyAdaptiveProtectionConfigLayer7DdosDefenseConfig $layer7DdosDefenseConfig)
  {
    $this->layer7DdosDefenseConfig = $layer7DdosDefenseConfig;
  }
  /**
   * @return SecurityPolicyAdaptiveProtectionConfigLayer7DdosDefenseConfig
   */
  public function getLayer7DdosDefenseConfig()
  {
    return $this->layer7DdosDefenseConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SecurityPolicyAdaptiveProtectionConfig::class, 'Google_Service_Compute_SecurityPolicyAdaptiveProtectionConfig');

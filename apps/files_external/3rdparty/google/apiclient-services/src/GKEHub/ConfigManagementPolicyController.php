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

namespace Google\Service\GKEHub;

class ConfigManagementPolicyController extends \Google\Collection
{
  protected $collection_key = 'exemptableNamespaces';
  /**
   * @var string
   */
  public $auditIntervalSeconds;
  /**
   * @var bool
   */
  public $enabled;
  /**
   * @var string[]
   */
  public $exemptableNamespaces;
  /**
   * @var bool
   */
  public $logDeniesEnabled;
  /**
   * @var bool
   */
  public $referentialRulesEnabled;
  /**
   * @var bool
   */
  public $templateLibraryInstalled;

  /**
   * @param string
   */
  public function setAuditIntervalSeconds($auditIntervalSeconds)
  {
    $this->auditIntervalSeconds = $auditIntervalSeconds;
  }
  /**
   * @return string
   */
  public function getAuditIntervalSeconds()
  {
    return $this->auditIntervalSeconds;
  }
  /**
   * @param bool
   */
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  /**
   * @return bool
   */
  public function getEnabled()
  {
    return $this->enabled;
  }
  /**
   * @param string[]
   */
  public function setExemptableNamespaces($exemptableNamespaces)
  {
    $this->exemptableNamespaces = $exemptableNamespaces;
  }
  /**
   * @return string[]
   */
  public function getExemptableNamespaces()
  {
    return $this->exemptableNamespaces;
  }
  /**
   * @param bool
   */
  public function setLogDeniesEnabled($logDeniesEnabled)
  {
    $this->logDeniesEnabled = $logDeniesEnabled;
  }
  /**
   * @return bool
   */
  public function getLogDeniesEnabled()
  {
    return $this->logDeniesEnabled;
  }
  /**
   * @param bool
   */
  public function setReferentialRulesEnabled($referentialRulesEnabled)
  {
    $this->referentialRulesEnabled = $referentialRulesEnabled;
  }
  /**
   * @return bool
   */
  public function getReferentialRulesEnabled()
  {
    return $this->referentialRulesEnabled;
  }
  /**
   * @param bool
   */
  public function setTemplateLibraryInstalled($templateLibraryInstalled)
  {
    $this->templateLibraryInstalled = $templateLibraryInstalled;
  }
  /**
   * @return bool
   */
  public function getTemplateLibraryInstalled()
  {
    return $this->templateLibraryInstalled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConfigManagementPolicyController::class, 'Google_Service_GKEHub_ConfigManagementPolicyController');

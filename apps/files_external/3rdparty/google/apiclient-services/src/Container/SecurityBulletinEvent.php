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

namespace Google\Service\Container;

class SecurityBulletinEvent extends \Google\Collection
{
  protected $collection_key = 'patchedVersions';
  /**
   * @var string[]
   */
  public $affectedSupportedMinors;
  /**
   * @var string
   */
  public $briefDescription;
  /**
   * @var string
   */
  public $bulletinId;
  /**
   * @var string
   */
  public $bulletinUri;
  /**
   * @var string[]
   */
  public $cveIds;
  /**
   * @var bool
   */
  public $manualStepsRequired;
  /**
   * @var string[]
   */
  public $patchedVersions;
  /**
   * @var string
   */
  public $resourceTypeAffected;
  /**
   * @var string
   */
  public $severity;
  /**
   * @var string
   */
  public $suggestedUpgradeTarget;

  /**
   * @param string[]
   */
  public function setAffectedSupportedMinors($affectedSupportedMinors)
  {
    $this->affectedSupportedMinors = $affectedSupportedMinors;
  }
  /**
   * @return string[]
   */
  public function getAffectedSupportedMinors()
  {
    return $this->affectedSupportedMinors;
  }
  /**
   * @param string
   */
  public function setBriefDescription($briefDescription)
  {
    $this->briefDescription = $briefDescription;
  }
  /**
   * @return string
   */
  public function getBriefDescription()
  {
    return $this->briefDescription;
  }
  /**
   * @param string
   */
  public function setBulletinId($bulletinId)
  {
    $this->bulletinId = $bulletinId;
  }
  /**
   * @return string
   */
  public function getBulletinId()
  {
    return $this->bulletinId;
  }
  /**
   * @param string
   */
  public function setBulletinUri($bulletinUri)
  {
    $this->bulletinUri = $bulletinUri;
  }
  /**
   * @return string
   */
  public function getBulletinUri()
  {
    return $this->bulletinUri;
  }
  /**
   * @param string[]
   */
  public function setCveIds($cveIds)
  {
    $this->cveIds = $cveIds;
  }
  /**
   * @return string[]
   */
  public function getCveIds()
  {
    return $this->cveIds;
  }
  /**
   * @param bool
   */
  public function setManualStepsRequired($manualStepsRequired)
  {
    $this->manualStepsRequired = $manualStepsRequired;
  }
  /**
   * @return bool
   */
  public function getManualStepsRequired()
  {
    return $this->manualStepsRequired;
  }
  /**
   * @param string[]
   */
  public function setPatchedVersions($patchedVersions)
  {
    $this->patchedVersions = $patchedVersions;
  }
  /**
   * @return string[]
   */
  public function getPatchedVersions()
  {
    return $this->patchedVersions;
  }
  /**
   * @param string
   */
  public function setResourceTypeAffected($resourceTypeAffected)
  {
    $this->resourceTypeAffected = $resourceTypeAffected;
  }
  /**
   * @return string
   */
  public function getResourceTypeAffected()
  {
    return $this->resourceTypeAffected;
  }
  /**
   * @param string
   */
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  /**
   * @return string
   */
  public function getSeverity()
  {
    return $this->severity;
  }
  /**
   * @param string
   */
  public function setSuggestedUpgradeTarget($suggestedUpgradeTarget)
  {
    $this->suggestedUpgradeTarget = $suggestedUpgradeTarget;
  }
  /**
   * @return string
   */
  public function getSuggestedUpgradeTarget()
  {
    return $this->suggestedUpgradeTarget;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SecurityBulletinEvent::class, 'Google_Service_Container_SecurityBulletinEvent');

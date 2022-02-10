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

namespace Google\Service\OSConfig;

class VulnerabilityReportVulnerabilityItem extends \Google\Model
{
  /**
   * @var string
   */
  public $availableInventoryItemId;
  /**
   * @var string
   */
  public $fixedCpeUri;
  /**
   * @var string
   */
  public $installedInventoryItemId;
  /**
   * @var string
   */
  public $upstreamFix;

  /**
   * @param string
   */
  public function setAvailableInventoryItemId($availableInventoryItemId)
  {
    $this->availableInventoryItemId = $availableInventoryItemId;
  }
  /**
   * @return string
   */
  public function getAvailableInventoryItemId()
  {
    return $this->availableInventoryItemId;
  }
  /**
   * @param string
   */
  public function setFixedCpeUri($fixedCpeUri)
  {
    $this->fixedCpeUri = $fixedCpeUri;
  }
  /**
   * @return string
   */
  public function getFixedCpeUri()
  {
    return $this->fixedCpeUri;
  }
  /**
   * @param string
   */
  public function setInstalledInventoryItemId($installedInventoryItemId)
  {
    $this->installedInventoryItemId = $installedInventoryItemId;
  }
  /**
   * @return string
   */
  public function getInstalledInventoryItemId()
  {
    return $this->installedInventoryItemId;
  }
  /**
   * @param string
   */
  public function setUpstreamFix($upstreamFix)
  {
    $this->upstreamFix = $upstreamFix;
  }
  /**
   * @return string
   */
  public function getUpstreamFix()
  {
    return $this->upstreamFix;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VulnerabilityReportVulnerabilityItem::class, 'Google_Service_OSConfig_VulnerabilityReportVulnerabilityItem');

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

namespace Google\Service\Dns;

class RRSetRoutingPolicyPrimaryBackupPolicy extends \Google\Model
{
  protected $backupGeoTargetsType = RRSetRoutingPolicyGeoPolicy::class;
  protected $backupGeoTargetsDataType = '';
  /**
   * @var string
   */
  public $kind;
  protected $primaryTargetsType = RRSetRoutingPolicyHealthCheckTargets::class;
  protected $primaryTargetsDataType = '';
  public $trickleTraffic;

  /**
   * @param RRSetRoutingPolicyGeoPolicy
   */
  public function setBackupGeoTargets(RRSetRoutingPolicyGeoPolicy $backupGeoTargets)
  {
    $this->backupGeoTargets = $backupGeoTargets;
  }
  /**
   * @return RRSetRoutingPolicyGeoPolicy
   */
  public function getBackupGeoTargets()
  {
    return $this->backupGeoTargets;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param RRSetRoutingPolicyHealthCheckTargets
   */
  public function setPrimaryTargets(RRSetRoutingPolicyHealthCheckTargets $primaryTargets)
  {
    $this->primaryTargets = $primaryTargets;
  }
  /**
   * @return RRSetRoutingPolicyHealthCheckTargets
   */
  public function getPrimaryTargets()
  {
    return $this->primaryTargets;
  }
  public function setTrickleTraffic($trickleTraffic)
  {
    $this->trickleTraffic = $trickleTraffic;
  }
  public function getTrickleTraffic()
  {
    return $this->trickleTraffic;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RRSetRoutingPolicyPrimaryBackupPolicy::class, 'Google_Service_Dns_RRSetRoutingPolicyPrimaryBackupPolicy');

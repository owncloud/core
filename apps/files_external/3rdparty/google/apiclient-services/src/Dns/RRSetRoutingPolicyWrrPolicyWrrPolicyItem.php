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

class RRSetRoutingPolicyWrrPolicyWrrPolicyItem extends \Google\Collection
{
  protected $collection_key = 'signatureRrdatas';
  protected $healthCheckedTargetsType = RRSetRoutingPolicyHealthCheckTargets::class;
  protected $healthCheckedTargetsDataType = '';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string[]
   */
  public $rrdatas;
  /**
   * @var string[]
   */
  public $signatureRrdatas;
  public $weight;

  /**
   * @param RRSetRoutingPolicyHealthCheckTargets
   */
  public function setHealthCheckedTargets(RRSetRoutingPolicyHealthCheckTargets $healthCheckedTargets)
  {
    $this->healthCheckedTargets = $healthCheckedTargets;
  }
  /**
   * @return RRSetRoutingPolicyHealthCheckTargets
   */
  public function getHealthCheckedTargets()
  {
    return $this->healthCheckedTargets;
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
   * @param string[]
   */
  public function setRrdatas($rrdatas)
  {
    $this->rrdatas = $rrdatas;
  }
  /**
   * @return string[]
   */
  public function getRrdatas()
  {
    return $this->rrdatas;
  }
  /**
   * @param string[]
   */
  public function setSignatureRrdatas($signatureRrdatas)
  {
    $this->signatureRrdatas = $signatureRrdatas;
  }
  /**
   * @return string[]
   */
  public function getSignatureRrdatas()
  {
    return $this->signatureRrdatas;
  }
  public function setWeight($weight)
  {
    $this->weight = $weight;
  }
  public function getWeight()
  {
    return $this->weight;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RRSetRoutingPolicyWrrPolicyWrrPolicyItem::class, 'Google_Service_Dns_RRSetRoutingPolicyWrrPolicyWrrPolicyItem');

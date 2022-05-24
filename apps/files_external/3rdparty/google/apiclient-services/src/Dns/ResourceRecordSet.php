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

class ResourceRecordSet extends \Google\Collection
{
  protected $collection_key = 'signatureRrdatas';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  protected $routingPolicyType = RRSetRoutingPolicy::class;
  protected $routingPolicyDataType = '';
  /**
   * @var string[]
   */
  public $rrdatas;
  /**
   * @var string[]
   */
  public $signatureRrdatas;
  /**
   * @var int
   */
  public $ttl;
  /**
   * @var string
   */
  public $type;

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
  /**
   * @param RRSetRoutingPolicy
   */
  public function setRoutingPolicy(RRSetRoutingPolicy $routingPolicy)
  {
    $this->routingPolicy = $routingPolicy;
  }
  /**
   * @return RRSetRoutingPolicy
   */
  public function getRoutingPolicy()
  {
    return $this->routingPolicy;
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
  /**
   * @param int
   */
  public function setTtl($ttl)
  {
    $this->ttl = $ttl;
  }
  /**
   * @return int
   */
  public function getTtl()
  {
    return $this->ttl;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResourceRecordSet::class, 'Google_Service_Dns_ResourceRecordSet');

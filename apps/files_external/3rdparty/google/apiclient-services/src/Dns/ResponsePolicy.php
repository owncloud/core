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

class ResponsePolicy extends \Google\Collection
{
  protected $collection_key = 'networks';
  /**
   * @var string
   */
  public $description;
  protected $gkeClustersType = ResponsePolicyGKECluster::class;
  protected $gkeClustersDataType = 'array';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string[]
   */
  public $labels;
  protected $networksType = ResponsePolicyNetwork::class;
  protected $networksDataType = 'array';
  /**
   * @var string
   */
  public $responsePolicyName;

  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param ResponsePolicyGKECluster[]
   */
  public function setGkeClusters($gkeClusters)
  {
    $this->gkeClusters = $gkeClusters;
  }
  /**
   * @return ResponsePolicyGKECluster[]
   */
  public function getGkeClusters()
  {
    return $this->gkeClusters;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
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
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param ResponsePolicyNetwork[]
   */
  public function setNetworks($networks)
  {
    $this->networks = $networks;
  }
  /**
   * @return ResponsePolicyNetwork[]
   */
  public function getNetworks()
  {
    return $this->networks;
  }
  /**
   * @param string
   */
  public function setResponsePolicyName($responsePolicyName)
  {
    $this->responsePolicyName = $responsePolicyName;
  }
  /**
   * @return string
   */
  public function getResponsePolicyName()
  {
    return $this->responsePolicyName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResponsePolicy::class, 'Google_Service_Dns_ResponsePolicy');

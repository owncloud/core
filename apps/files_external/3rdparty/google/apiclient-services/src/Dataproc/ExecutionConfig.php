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

namespace Google\Service\Dataproc;

class ExecutionConfig extends \Google\Collection
{
  protected $collection_key = 'networkTags';
  /**
   * @var string
   */
  public $idleTtl;
  /**
   * @var string
   */
  public $kmsKey;
  /**
   * @var string[]
   */
  public $networkTags;
  /**
   * @var string
   */
  public $networkUri;
  /**
   * @var string
   */
  public $serviceAccount;
  /**
   * @var string
   */
  public $subnetworkUri;

  /**
   * @param string
   */
  public function setIdleTtl($idleTtl)
  {
    $this->idleTtl = $idleTtl;
  }
  /**
   * @return string
   */
  public function getIdleTtl()
  {
    return $this->idleTtl;
  }
  /**
   * @param string
   */
  public function setKmsKey($kmsKey)
  {
    $this->kmsKey = $kmsKey;
  }
  /**
   * @return string
   */
  public function getKmsKey()
  {
    return $this->kmsKey;
  }
  /**
   * @param string[]
   */
  public function setNetworkTags($networkTags)
  {
    $this->networkTags = $networkTags;
  }
  /**
   * @return string[]
   */
  public function getNetworkTags()
  {
    return $this->networkTags;
  }
  /**
   * @param string
   */
  public function setNetworkUri($networkUri)
  {
    $this->networkUri = $networkUri;
  }
  /**
   * @return string
   */
  public function getNetworkUri()
  {
    return $this->networkUri;
  }
  /**
   * @param string
   */
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  /**
   * @return string
   */
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  /**
   * @param string
   */
  public function setSubnetworkUri($subnetworkUri)
  {
    $this->subnetworkUri = $subnetworkUri;
  }
  /**
   * @return string
   */
  public function getSubnetworkUri()
  {
    return $this->subnetworkUri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExecutionConfig::class, 'Google_Service_Dataproc_ExecutionConfig');

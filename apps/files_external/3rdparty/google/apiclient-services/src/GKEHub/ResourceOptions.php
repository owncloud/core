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

class ResourceOptions extends \Google\Model
{
  /**
   * @var string
   */
  public $connectVersion;
  /**
   * @var string
   */
  public $k8sVersion;
  /**
   * @var bool
   */
  public $v1beta1Crd;

  /**
   * @param string
   */
  public function setConnectVersion($connectVersion)
  {
    $this->connectVersion = $connectVersion;
  }
  /**
   * @return string
   */
  public function getConnectVersion()
  {
    return $this->connectVersion;
  }
  /**
   * @param string
   */
  public function setK8sVersion($k8sVersion)
  {
    $this->k8sVersion = $k8sVersion;
  }
  /**
   * @return string
   */
  public function getK8sVersion()
  {
    return $this->k8sVersion;
  }
  /**
   * @param bool
   */
  public function setV1beta1Crd($v1beta1Crd)
  {
    $this->v1beta1Crd = $v1beta1Crd;
  }
  /**
   * @return bool
   */
  public function getV1beta1Crd()
  {
    return $this->v1beta1Crd;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResourceOptions::class, 'Google_Service_GKEHub_ResourceOptions');

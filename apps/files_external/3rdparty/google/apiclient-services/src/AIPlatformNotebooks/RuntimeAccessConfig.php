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

namespace Google\Service\AIPlatformNotebooks;

class RuntimeAccessConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $accessType;
  /**
   * @var string
   */
  public $proxyUri;
  /**
   * @var string
   */
  public $runtimeOwner;

  /**
   * @param string
   */
  public function setAccessType($accessType)
  {
    $this->accessType = $accessType;
  }
  /**
   * @return string
   */
  public function getAccessType()
  {
    return $this->accessType;
  }
  /**
   * @param string
   */
  public function setProxyUri($proxyUri)
  {
    $this->proxyUri = $proxyUri;
  }
  /**
   * @return string
   */
  public function getProxyUri()
  {
    return $this->proxyUri;
  }
  /**
   * @param string
   */
  public function setRuntimeOwner($runtimeOwner)
  {
    $this->runtimeOwner = $runtimeOwner;
  }
  /**
   * @return string
   */
  public function getRuntimeOwner()
  {
    return $this->runtimeOwner;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RuntimeAccessConfig::class, 'Google_Service_AIPlatformNotebooks_RuntimeAccessConfig');

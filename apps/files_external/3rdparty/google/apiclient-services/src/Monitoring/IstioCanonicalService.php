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

namespace Google\Service\Monitoring;

class IstioCanonicalService extends \Google\Model
{
  /**
   * @var string
   */
  public $canonicalService;
  /**
   * @var string
   */
  public $canonicalServiceNamespace;
  /**
   * @var string
   */
  public $meshUid;

  /**
   * @param string
   */
  public function setCanonicalService($canonicalService)
  {
    $this->canonicalService = $canonicalService;
  }
  /**
   * @return string
   */
  public function getCanonicalService()
  {
    return $this->canonicalService;
  }
  /**
   * @param string
   */
  public function setCanonicalServiceNamespace($canonicalServiceNamespace)
  {
    $this->canonicalServiceNamespace = $canonicalServiceNamespace;
  }
  /**
   * @return string
   */
  public function getCanonicalServiceNamespace()
  {
    return $this->canonicalServiceNamespace;
  }
  /**
   * @param string
   */
  public function setMeshUid($meshUid)
  {
    $this->meshUid = $meshUid;
  }
  /**
   * @return string
   */
  public function getMeshUid()
  {
    return $this->meshUid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IstioCanonicalService::class, 'Google_Service_Monitoring_IstioCanonicalService');

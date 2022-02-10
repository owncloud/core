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

namespace Google\Service\CloudRun;

class DomainMappingSpec extends \Google\Model
{
  /**
   * @var string
   */
  public $certificateMode;
  /**
   * @var bool
   */
  public $forceOverride;
  /**
   * @var string
   */
  public $routeName;

  /**
   * @param string
   */
  public function setCertificateMode($certificateMode)
  {
    $this->certificateMode = $certificateMode;
  }
  /**
   * @return string
   */
  public function getCertificateMode()
  {
    return $this->certificateMode;
  }
  /**
   * @param bool
   */
  public function setForceOverride($forceOverride)
  {
    $this->forceOverride = $forceOverride;
  }
  /**
   * @return bool
   */
  public function getForceOverride()
  {
    return $this->forceOverride;
  }
  /**
   * @param string
   */
  public function setRouteName($routeName)
  {
    $this->routeName = $routeName;
  }
  /**
   * @return string
   */
  public function getRouteName()
  {
    return $this->routeName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DomainMappingSpec::class, 'Google_Service_CloudRun_DomainMappingSpec');

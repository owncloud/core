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

namespace Google\Service\OnDemandScanning;

class GrafeasV1SlsaProvenance02SlsaCompleteness extends \Google\Model
{
  /**
   * @var bool
   */
  public $environment;
  /**
   * @var bool
   */
  public $materials;
  /**
   * @var bool
   */
  public $parameters;

  /**
   * @param bool
   */
  public function setEnvironment($environment)
  {
    $this->environment = $environment;
  }
  /**
   * @return bool
   */
  public function getEnvironment()
  {
    return $this->environment;
  }
  /**
   * @param bool
   */
  public function setMaterials($materials)
  {
    $this->materials = $materials;
  }
  /**
   * @return bool
   */
  public function getMaterials()
  {
    return $this->materials;
  }
  /**
   * @param bool
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return bool
   */
  public function getParameters()
  {
    return $this->parameters;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GrafeasV1SlsaProvenance02SlsaCompleteness::class, 'Google_Service_OnDemandScanning_GrafeasV1SlsaProvenance02SlsaCompleteness');

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

class Completeness extends \Google\Model
{
  public $arguments;
  public $environment;
  public $materials;

  public function setArguments($arguments)
  {
    $this->arguments = $arguments;
  }
  public function getArguments()
  {
    return $this->arguments;
  }
  public function setEnvironment($environment)
  {
    $this->environment = $environment;
  }
  public function getEnvironment()
  {
    return $this->environment;
  }
  public function setMaterials($materials)
  {
    $this->materials = $materials;
  }
  public function getMaterials()
  {
    return $this->materials;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Completeness::class, 'Google_Service_OnDemandScanning_Completeness');

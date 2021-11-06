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

class Recipe extends \Google\Collection
{
  protected $collection_key = 'environment';
  public $arguments;
  public $definedInMaterial;
  public $entryPoint;
  public $environment;
  public $type;

  public function setArguments($arguments)
  {
    $this->arguments = $arguments;
  }
  public function getArguments()
  {
    return $this->arguments;
  }
  public function setDefinedInMaterial($definedInMaterial)
  {
    $this->definedInMaterial = $definedInMaterial;
  }
  public function getDefinedInMaterial()
  {
    return $this->definedInMaterial;
  }
  public function setEntryPoint($entryPoint)
  {
    $this->entryPoint = $entryPoint;
  }
  public function getEntryPoint()
  {
    return $this->entryPoint;
  }
  public function setEnvironment($environment)
  {
    $this->environment = $environment;
  }
  public function getEnvironment()
  {
    return $this->environment;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Recipe::class, 'Google_Service_OnDemandScanning_Recipe');

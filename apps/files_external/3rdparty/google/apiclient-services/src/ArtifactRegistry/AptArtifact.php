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

namespace Google\Service\ArtifactRegistry;

class AptArtifact extends \Google\Model
{
  public $architecture;
  public $component;
  public $controlFile;
  public $name;
  public $packageName;
  public $packageType;

  public function setArchitecture($architecture)
  {
    $this->architecture = $architecture;
  }
  public function getArchitecture()
  {
    return $this->architecture;
  }
  public function setComponent($component)
  {
    $this->component = $component;
  }
  public function getComponent()
  {
    return $this->component;
  }
  public function setControlFile($controlFile)
  {
    $this->controlFile = $controlFile;
  }
  public function getControlFile()
  {
    return $this->controlFile;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }
  public function getPackageName()
  {
    return $this->packageName;
  }
  public function setPackageType($packageType)
  {
    $this->packageType = $packageType;
  }
  public function getPackageType()
  {
    return $this->packageType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AptArtifact::class, 'Google_Service_ArtifactRegistry_AptArtifact');

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

namespace Google\Service\CloudAsset;

class WindowsQuickFixEngineeringPackage extends \Google\Model
{
  public $caption;
  public $description;
  public $hotFixId;
  public $installTime;

  public function setCaption($caption)
  {
    $this->caption = $caption;
  }
  public function getCaption()
  {
    return $this->caption;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setHotFixId($hotFixId)
  {
    $this->hotFixId = $hotFixId;
  }
  public function getHotFixId()
  {
    return $this->hotFixId;
  }
  public function setInstallTime($installTime)
  {
    $this->installTime = $installTime;
  }
  public function getInstallTime()
  {
    return $this->installTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WindowsQuickFixEngineeringPackage::class, 'Google_Service_CloudAsset_WindowsQuickFixEngineeringPackage');

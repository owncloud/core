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

class Google_Service_SASPortalTesting_SasPortalDeployment extends Google_Collection
{
  protected $collection_key = 'sasUserIds';
  public $allowedBillingModes;
  public $defaultBillingMode;
  public $displayName;
  public $name;
  public $sasUserIds;

  public function setAllowedBillingModes($allowedBillingModes)
  {
    $this->allowedBillingModes = $allowedBillingModes;
  }
  public function getAllowedBillingModes()
  {
    return $this->allowedBillingModes;
  }
  public function setDefaultBillingMode($defaultBillingMode)
  {
    $this->defaultBillingMode = $defaultBillingMode;
  }
  public function getDefaultBillingMode()
  {
    return $this->defaultBillingMode;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSasUserIds($sasUserIds)
  {
    $this->sasUserIds = $sasUserIds;
  }
  public function getSasUserIds()
  {
    return $this->sasUserIds;
  }
}

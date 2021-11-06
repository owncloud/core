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

namespace Google\Service\Cloudbilling;

class Service extends \Google\Model
{
  public $businessEntityName;
  public $displayName;
  public $name;
  public $serviceId;

  public function setBusinessEntityName($businessEntityName)
  {
    $this->businessEntityName = $businessEntityName;
  }
  public function getBusinessEntityName()
  {
    return $this->businessEntityName;
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
  public function setServiceId($serviceId)
  {
    $this->serviceId = $serviceId;
  }
  public function getServiceId()
  {
    return $this->serviceId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Service::class, 'Google_Service_Cloudbilling_Service');

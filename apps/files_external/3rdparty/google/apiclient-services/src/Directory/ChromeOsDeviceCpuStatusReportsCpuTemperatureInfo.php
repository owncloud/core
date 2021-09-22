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

namespace Google\Service\Directory;

class ChromeOsDeviceCpuStatusReportsCpuTemperatureInfo extends \Google\Model
{
  public $label;
  public $temperature;

  public function setLabel($label)
  {
    $this->label = $label;
  }
  public function getLabel()
  {
    return $this->label;
  }
  public function setTemperature($temperature)
  {
    $this->temperature = $temperature;
  }
  public function getTemperature()
  {
    return $this->temperature;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChromeOsDeviceCpuStatusReportsCpuTemperatureInfo::class, 'Google_Service_Directory_ChromeOsDeviceCpuStatusReportsCpuTemperatureInfo');

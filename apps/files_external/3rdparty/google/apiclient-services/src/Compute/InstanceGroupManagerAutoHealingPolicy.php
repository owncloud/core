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

namespace Google\Service\Compute;

class InstanceGroupManagerAutoHealingPolicy extends \Google\Model
{
  public $healthCheck;
  public $initialDelaySec;

  public function setHealthCheck($healthCheck)
  {
    $this->healthCheck = $healthCheck;
  }
  public function getHealthCheck()
  {
    return $this->healthCheck;
  }
  public function setInitialDelaySec($initialDelaySec)
  {
    $this->initialDelaySec = $initialDelaySec;
  }
  public function getInitialDelaySec()
  {
    return $this->initialDelaySec;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InstanceGroupManagerAutoHealingPolicy::class, 'Google_Service_Compute_InstanceGroupManagerAutoHealingPolicy');

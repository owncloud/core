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

class TargetPoolInstanceHealth extends \Google\Collection
{
  protected $collection_key = 'healthStatus';
  protected $healthStatusType = HealthStatus::class;
  protected $healthStatusDataType = 'array';
  public $kind;

  /**
   * @param HealthStatus[]
   */
  public function setHealthStatus($healthStatus)
  {
    $this->healthStatus = $healthStatus;
  }
  /**
   * @return HealthStatus[]
   */
  public function getHealthStatus()
  {
    return $this->healthStatus;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetPoolInstanceHealth::class, 'Google_Service_Compute_TargetPoolInstanceHealth');

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

namespace Google\Service\Testing;

class ShardingOption extends \Google\Model
{
  protected $manualShardingType = ManualSharding::class;
  protected $manualShardingDataType = '';
  protected $uniformShardingType = UniformSharding::class;
  protected $uniformShardingDataType = '';

  /**
   * @param ManualSharding
   */
  public function setManualSharding(ManualSharding $manualSharding)
  {
    $this->manualSharding = $manualSharding;
  }
  /**
   * @return ManualSharding
   */
  public function getManualSharding()
  {
    return $this->manualSharding;
  }
  /**
   * @param UniformSharding
   */
  public function setUniformSharding(UniformSharding $uniformSharding)
  {
    $this->uniformSharding = $uniformSharding;
  }
  /**
   * @return UniformSharding
   */
  public function getUniformSharding()
  {
    return $this->uniformSharding;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ShardingOption::class, 'Google_Service_Testing_ShardingOption');

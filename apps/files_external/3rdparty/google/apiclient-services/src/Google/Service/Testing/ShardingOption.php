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

class Google_Service_Testing_ShardingOption extends Google_Model
{
  protected $manualShardingType = 'Google_Service_Testing_ManualSharding';
  protected $manualShardingDataType = '';
  protected $uniformShardingType = 'Google_Service_Testing_UniformSharding';
  protected $uniformShardingDataType = '';

  /**
   * @param Google_Service_Testing_ManualSharding
   */
  public function setManualSharding(Google_Service_Testing_ManualSharding $manualSharding)
  {
    $this->manualSharding = $manualSharding;
  }
  /**
   * @return Google_Service_Testing_ManualSharding
   */
  public function getManualSharding()
  {
    return $this->manualSharding;
  }
  /**
   * @param Google_Service_Testing_UniformSharding
   */
  public function setUniformSharding(Google_Service_Testing_UniformSharding $uniformSharding)
  {
    $this->uniformSharding = $uniformSharding;
  }
  /**
   * @return Google_Service_Testing_UniformSharding
   */
  public function getUniformSharding()
  {
    return $this->uniformSharding;
  }
}

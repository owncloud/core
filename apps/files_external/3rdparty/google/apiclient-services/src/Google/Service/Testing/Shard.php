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

class Google_Service_Testing_Shard extends Google_Model
{
  public $numShards;
  public $shardIndex;
  protected $testTargetsForShardType = 'Google_Service_Testing_TestTargetsForShard';
  protected $testTargetsForShardDataType = '';

  public function setNumShards($numShards)
  {
    $this->numShards = $numShards;
  }
  public function getNumShards()
  {
    return $this->numShards;
  }
  public function setShardIndex($shardIndex)
  {
    $this->shardIndex = $shardIndex;
  }
  public function getShardIndex()
  {
    return $this->shardIndex;
  }
  /**
   * @param Google_Service_Testing_TestTargetsForShard
   */
  public function setTestTargetsForShard(Google_Service_Testing_TestTargetsForShard $testTargetsForShard)
  {
    $this->testTargetsForShard = $testTargetsForShard;
  }
  /**
   * @return Google_Service_Testing_TestTargetsForShard
   */
  public function getTestTargetsForShard()
  {
    return $this->testTargetsForShard;
  }
}

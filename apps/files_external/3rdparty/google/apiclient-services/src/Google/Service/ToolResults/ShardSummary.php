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

class Google_Service_ToolResults_ShardSummary extends Google_Collection
{
  protected $collection_key = 'runs';
  protected $runsType = 'Google_Service_ToolResults_StepSummary';
  protected $runsDataType = 'array';
  protected $shardResultType = 'Google_Service_ToolResults_MergedResult';
  protected $shardResultDataType = '';

  /**
   * @param Google_Service_ToolResults_StepSummary[]
   */
  public function setRuns($runs)
  {
    $this->runs = $runs;
  }
  /**
   * @return Google_Service_ToolResults_StepSummary[]
   */
  public function getRuns()
  {
    return $this->runs;
  }
  /**
   * @param Google_Service_ToolResults_MergedResult
   */
  public function setShardResult(Google_Service_ToolResults_MergedResult $shardResult)
  {
    $this->shardResult = $shardResult;
  }
  /**
   * @return Google_Service_ToolResults_MergedResult
   */
  public function getShardResult()
  {
    return $this->shardResult;
  }
}

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

class Google_Service_Spanner_ExecuteBatchDmlResponse extends Google_Collection
{
  protected $collection_key = 'resultSets';
  protected $resultSetsType = 'Google_Service_Spanner_ResultSet';
  protected $resultSetsDataType = 'array';
  protected $statusType = 'Google_Service_Spanner_Status';
  protected $statusDataType = '';

  /**
   * @param Google_Service_Spanner_ResultSet[]
   */
  public function setResultSets($resultSets)
  {
    $this->resultSets = $resultSets;
  }
  /**
   * @return Google_Service_Spanner_ResultSet[]
   */
  public function getResultSets()
  {
    return $this->resultSets;
  }
  /**
   * @param Google_Service_Spanner_Status
   */
  public function setStatus(Google_Service_Spanner_Status $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_Spanner_Status
   */
  public function getStatus()
  {
    return $this->status;
  }
}

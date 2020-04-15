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

class Google_Service_BigQueryReservation_SplitCapacityCommitmentResponse extends Google_Model
{
  protected $firstType = 'Google_Service_BigQueryReservation_CapacityCommitment';
  protected $firstDataType = '';
  protected $secondType = 'Google_Service_BigQueryReservation_CapacityCommitment';
  protected $secondDataType = '';

  /**
   * @param Google_Service_BigQueryReservation_CapacityCommitment
   */
  public function setFirst(Google_Service_BigQueryReservation_CapacityCommitment $first)
  {
    $this->first = $first;
  }
  /**
   * @return Google_Service_BigQueryReservation_CapacityCommitment
   */
  public function getFirst()
  {
    return $this->first;
  }
  /**
   * @param Google_Service_BigQueryReservation_CapacityCommitment
   */
  public function setSecond(Google_Service_BigQueryReservation_CapacityCommitment $second)
  {
    $this->second = $second;
  }
  /**
   * @return Google_Service_BigQueryReservation_CapacityCommitment
   */
  public function getSecond()
  {
    return $this->second;
  }
}

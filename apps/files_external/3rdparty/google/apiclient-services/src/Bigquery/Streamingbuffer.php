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

namespace Google\Service\Bigquery;

class Streamingbuffer extends \Google\Model
{
  /**
   * @var string
   */
  public $estimatedBytes;
  /**
   * @var string
   */
  public $estimatedRows;
  /**
   * @var string
   */
  public $oldestEntryTime;

  /**
   * @param string
   */
  public function setEstimatedBytes($estimatedBytes)
  {
    $this->estimatedBytes = $estimatedBytes;
  }
  /**
   * @return string
   */
  public function getEstimatedBytes()
  {
    return $this->estimatedBytes;
  }
  /**
   * @param string
   */
  public function setEstimatedRows($estimatedRows)
  {
    $this->estimatedRows = $estimatedRows;
  }
  /**
   * @return string
   */
  public function getEstimatedRows()
  {
    return $this->estimatedRows;
  }
  /**
   * @param string
   */
  public function setOldestEntryTime($oldestEntryTime)
  {
    $this->oldestEntryTime = $oldestEntryTime;
  }
  /**
   * @return string
   */
  public function getOldestEntryTime()
  {
    return $this->oldestEntryTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Streamingbuffer::class, 'Google_Service_Bigquery_Streamingbuffer');

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

namespace Google\Service\Spanner;

class PartitionOptions extends \Google\Model
{
  /**
   * @var string
   */
  public $maxPartitions;
  /**
   * @var string
   */
  public $partitionSizeBytes;

  /**
   * @param string
   */
  public function setMaxPartitions($maxPartitions)
  {
    $this->maxPartitions = $maxPartitions;
  }
  /**
   * @return string
   */
  public function getMaxPartitions()
  {
    return $this->maxPartitions;
  }
  /**
   * @param string
   */
  public function setPartitionSizeBytes($partitionSizeBytes)
  {
    $this->partitionSizeBytes = $partitionSizeBytes;
  }
  /**
   * @return string
   */
  public function getPartitionSizeBytes()
  {
    return $this->partitionSizeBytes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PartitionOptions::class, 'Google_Service_Spanner_PartitionOptions');

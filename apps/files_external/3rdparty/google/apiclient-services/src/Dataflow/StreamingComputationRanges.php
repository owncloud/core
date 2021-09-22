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

namespace Google\Service\Dataflow;

class StreamingComputationRanges extends \Google\Collection
{
  protected $collection_key = 'rangeAssignments';
  public $computationId;
  protected $rangeAssignmentsType = KeyRangeDataDiskAssignment::class;
  protected $rangeAssignmentsDataType = 'array';

  public function setComputationId($computationId)
  {
    $this->computationId = $computationId;
  }
  public function getComputationId()
  {
    return $this->computationId;
  }
  /**
   * @param KeyRangeDataDiskAssignment[]
   */
  public function setRangeAssignments($rangeAssignments)
  {
    $this->rangeAssignments = $rangeAssignments;
  }
  /**
   * @return KeyRangeDataDiskAssignment[]
   */
  public function getRangeAssignments()
  {
    return $this->rangeAssignments;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StreamingComputationRanges::class, 'Google_Service_Dataflow_StreamingComputationRanges');

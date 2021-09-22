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

class StreamingComputationTask extends \Google\Collection
{
  protected $collection_key = 'dataDisks';
  protected $computationRangesType = StreamingComputationRanges::class;
  protected $computationRangesDataType = 'array';
  protected $dataDisksType = MountedDataDisk::class;
  protected $dataDisksDataType = 'array';
  public $taskType;

  /**
   * @param StreamingComputationRanges[]
   */
  public function setComputationRanges($computationRanges)
  {
    $this->computationRanges = $computationRanges;
  }
  /**
   * @return StreamingComputationRanges[]
   */
  public function getComputationRanges()
  {
    return $this->computationRanges;
  }
  /**
   * @param MountedDataDisk[]
   */
  public function setDataDisks($dataDisks)
  {
    $this->dataDisks = $dataDisks;
  }
  /**
   * @return MountedDataDisk[]
   */
  public function getDataDisks()
  {
    return $this->dataDisks;
  }
  public function setTaskType($taskType)
  {
    $this->taskType = $taskType;
  }
  public function getTaskType()
  {
    return $this->taskType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StreamingComputationTask::class, 'Google_Service_Dataflow_StreamingComputationTask');

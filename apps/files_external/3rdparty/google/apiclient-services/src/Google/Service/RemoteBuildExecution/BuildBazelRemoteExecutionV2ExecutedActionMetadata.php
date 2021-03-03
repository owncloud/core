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

class Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ExecutedActionMetadata extends Google_Collection
{
  protected $collection_key = 'auxiliaryMetadata';
  public $auxiliaryMetadata;
  public $executionCompletedTimestamp;
  public $executionStartTimestamp;
  public $inputFetchCompletedTimestamp;
  public $inputFetchStartTimestamp;
  public $outputUploadCompletedTimestamp;
  public $outputUploadStartTimestamp;
  public $queuedTimestamp;
  public $worker;
  public $workerCompletedTimestamp;
  public $workerStartTimestamp;

  public function setAuxiliaryMetadata($auxiliaryMetadata)
  {
    $this->auxiliaryMetadata = $auxiliaryMetadata;
  }
  public function getAuxiliaryMetadata()
  {
    return $this->auxiliaryMetadata;
  }
  public function setExecutionCompletedTimestamp($executionCompletedTimestamp)
  {
    $this->executionCompletedTimestamp = $executionCompletedTimestamp;
  }
  public function getExecutionCompletedTimestamp()
  {
    return $this->executionCompletedTimestamp;
  }
  public function setExecutionStartTimestamp($executionStartTimestamp)
  {
    $this->executionStartTimestamp = $executionStartTimestamp;
  }
  public function getExecutionStartTimestamp()
  {
    return $this->executionStartTimestamp;
  }
  public function setInputFetchCompletedTimestamp($inputFetchCompletedTimestamp)
  {
    $this->inputFetchCompletedTimestamp = $inputFetchCompletedTimestamp;
  }
  public function getInputFetchCompletedTimestamp()
  {
    return $this->inputFetchCompletedTimestamp;
  }
  public function setInputFetchStartTimestamp($inputFetchStartTimestamp)
  {
    $this->inputFetchStartTimestamp = $inputFetchStartTimestamp;
  }
  public function getInputFetchStartTimestamp()
  {
    return $this->inputFetchStartTimestamp;
  }
  public function setOutputUploadCompletedTimestamp($outputUploadCompletedTimestamp)
  {
    $this->outputUploadCompletedTimestamp = $outputUploadCompletedTimestamp;
  }
  public function getOutputUploadCompletedTimestamp()
  {
    return $this->outputUploadCompletedTimestamp;
  }
  public function setOutputUploadStartTimestamp($outputUploadStartTimestamp)
  {
    $this->outputUploadStartTimestamp = $outputUploadStartTimestamp;
  }
  public function getOutputUploadStartTimestamp()
  {
    return $this->outputUploadStartTimestamp;
  }
  public function setQueuedTimestamp($queuedTimestamp)
  {
    $this->queuedTimestamp = $queuedTimestamp;
  }
  public function getQueuedTimestamp()
  {
    return $this->queuedTimestamp;
  }
  public function setWorker($worker)
  {
    $this->worker = $worker;
  }
  public function getWorker()
  {
    return $this->worker;
  }
  public function setWorkerCompletedTimestamp($workerCompletedTimestamp)
  {
    $this->workerCompletedTimestamp = $workerCompletedTimestamp;
  }
  public function getWorkerCompletedTimestamp()
  {
    return $this->workerCompletedTimestamp;
  }
  public function setWorkerStartTimestamp($workerStartTimestamp)
  {
    $this->workerStartTimestamp = $workerStartTimestamp;
  }
  public function getWorkerStartTimestamp()
  {
    return $this->workerStartTimestamp;
  }
}

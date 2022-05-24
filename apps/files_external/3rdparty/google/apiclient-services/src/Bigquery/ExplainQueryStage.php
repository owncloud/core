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

class ExplainQueryStage extends \Google\Collection
{
  protected $collection_key = 'steps';
  /**
   * @var string
   */
  public $completedParallelInputs;
  /**
   * @var string
   */
  public $computeMsAvg;
  /**
   * @var string
   */
  public $computeMsMax;
  public $computeRatioAvg;
  public $computeRatioMax;
  /**
   * @var string
   */
  public $endMs;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string[]
   */
  public $inputStages;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $parallelInputs;
  /**
   * @var string
   */
  public $readMsAvg;
  /**
   * @var string
   */
  public $readMsMax;
  public $readRatioAvg;
  public $readRatioMax;
  /**
   * @var string
   */
  public $recordsRead;
  /**
   * @var string
   */
  public $recordsWritten;
  /**
   * @var string
   */
  public $shuffleOutputBytes;
  /**
   * @var string
   */
  public $shuffleOutputBytesSpilled;
  /**
   * @var string
   */
  public $slotMs;
  /**
   * @var string
   */
  public $startMs;
  /**
   * @var string
   */
  public $status;
  protected $stepsType = ExplainQueryStep::class;
  protected $stepsDataType = 'array';
  /**
   * @var string
   */
  public $waitMsAvg;
  /**
   * @var string
   */
  public $waitMsMax;
  public $waitRatioAvg;
  public $waitRatioMax;
  /**
   * @var string
   */
  public $writeMsAvg;
  /**
   * @var string
   */
  public $writeMsMax;
  public $writeRatioAvg;
  public $writeRatioMax;

  /**
   * @param string
   */
  public function setCompletedParallelInputs($completedParallelInputs)
  {
    $this->completedParallelInputs = $completedParallelInputs;
  }
  /**
   * @return string
   */
  public function getCompletedParallelInputs()
  {
    return $this->completedParallelInputs;
  }
  /**
   * @param string
   */
  public function setComputeMsAvg($computeMsAvg)
  {
    $this->computeMsAvg = $computeMsAvg;
  }
  /**
   * @return string
   */
  public function getComputeMsAvg()
  {
    return $this->computeMsAvg;
  }
  /**
   * @param string
   */
  public function setComputeMsMax($computeMsMax)
  {
    $this->computeMsMax = $computeMsMax;
  }
  /**
   * @return string
   */
  public function getComputeMsMax()
  {
    return $this->computeMsMax;
  }
  public function setComputeRatioAvg($computeRatioAvg)
  {
    $this->computeRatioAvg = $computeRatioAvg;
  }
  public function getComputeRatioAvg()
  {
    return $this->computeRatioAvg;
  }
  public function setComputeRatioMax($computeRatioMax)
  {
    $this->computeRatioMax = $computeRatioMax;
  }
  public function getComputeRatioMax()
  {
    return $this->computeRatioMax;
  }
  /**
   * @param string
   */
  public function setEndMs($endMs)
  {
    $this->endMs = $endMs;
  }
  /**
   * @return string
   */
  public function getEndMs()
  {
    return $this->endMs;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string[]
   */
  public function setInputStages($inputStages)
  {
    $this->inputStages = $inputStages;
  }
  /**
   * @return string[]
   */
  public function getInputStages()
  {
    return $this->inputStages;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setParallelInputs($parallelInputs)
  {
    $this->parallelInputs = $parallelInputs;
  }
  /**
   * @return string
   */
  public function getParallelInputs()
  {
    return $this->parallelInputs;
  }
  /**
   * @param string
   */
  public function setReadMsAvg($readMsAvg)
  {
    $this->readMsAvg = $readMsAvg;
  }
  /**
   * @return string
   */
  public function getReadMsAvg()
  {
    return $this->readMsAvg;
  }
  /**
   * @param string
   */
  public function setReadMsMax($readMsMax)
  {
    $this->readMsMax = $readMsMax;
  }
  /**
   * @return string
   */
  public function getReadMsMax()
  {
    return $this->readMsMax;
  }
  public function setReadRatioAvg($readRatioAvg)
  {
    $this->readRatioAvg = $readRatioAvg;
  }
  public function getReadRatioAvg()
  {
    return $this->readRatioAvg;
  }
  public function setReadRatioMax($readRatioMax)
  {
    $this->readRatioMax = $readRatioMax;
  }
  public function getReadRatioMax()
  {
    return $this->readRatioMax;
  }
  /**
   * @param string
   */
  public function setRecordsRead($recordsRead)
  {
    $this->recordsRead = $recordsRead;
  }
  /**
   * @return string
   */
  public function getRecordsRead()
  {
    return $this->recordsRead;
  }
  /**
   * @param string
   */
  public function setRecordsWritten($recordsWritten)
  {
    $this->recordsWritten = $recordsWritten;
  }
  /**
   * @return string
   */
  public function getRecordsWritten()
  {
    return $this->recordsWritten;
  }
  /**
   * @param string
   */
  public function setShuffleOutputBytes($shuffleOutputBytes)
  {
    $this->shuffleOutputBytes = $shuffleOutputBytes;
  }
  /**
   * @return string
   */
  public function getShuffleOutputBytes()
  {
    return $this->shuffleOutputBytes;
  }
  /**
   * @param string
   */
  public function setShuffleOutputBytesSpilled($shuffleOutputBytesSpilled)
  {
    $this->shuffleOutputBytesSpilled = $shuffleOutputBytesSpilled;
  }
  /**
   * @return string
   */
  public function getShuffleOutputBytesSpilled()
  {
    return $this->shuffleOutputBytesSpilled;
  }
  /**
   * @param string
   */
  public function setSlotMs($slotMs)
  {
    $this->slotMs = $slotMs;
  }
  /**
   * @return string
   */
  public function getSlotMs()
  {
    return $this->slotMs;
  }
  /**
   * @param string
   */
  public function setStartMs($startMs)
  {
    $this->startMs = $startMs;
  }
  /**
   * @return string
   */
  public function getStartMs()
  {
    return $this->startMs;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param ExplainQueryStep[]
   */
  public function setSteps($steps)
  {
    $this->steps = $steps;
  }
  /**
   * @return ExplainQueryStep[]
   */
  public function getSteps()
  {
    return $this->steps;
  }
  /**
   * @param string
   */
  public function setWaitMsAvg($waitMsAvg)
  {
    $this->waitMsAvg = $waitMsAvg;
  }
  /**
   * @return string
   */
  public function getWaitMsAvg()
  {
    return $this->waitMsAvg;
  }
  /**
   * @param string
   */
  public function setWaitMsMax($waitMsMax)
  {
    $this->waitMsMax = $waitMsMax;
  }
  /**
   * @return string
   */
  public function getWaitMsMax()
  {
    return $this->waitMsMax;
  }
  public function setWaitRatioAvg($waitRatioAvg)
  {
    $this->waitRatioAvg = $waitRatioAvg;
  }
  public function getWaitRatioAvg()
  {
    return $this->waitRatioAvg;
  }
  public function setWaitRatioMax($waitRatioMax)
  {
    $this->waitRatioMax = $waitRatioMax;
  }
  public function getWaitRatioMax()
  {
    return $this->waitRatioMax;
  }
  /**
   * @param string
   */
  public function setWriteMsAvg($writeMsAvg)
  {
    $this->writeMsAvg = $writeMsAvg;
  }
  /**
   * @return string
   */
  public function getWriteMsAvg()
  {
    return $this->writeMsAvg;
  }
  /**
   * @param string
   */
  public function setWriteMsMax($writeMsMax)
  {
    $this->writeMsMax = $writeMsMax;
  }
  /**
   * @return string
   */
  public function getWriteMsMax()
  {
    return $this->writeMsMax;
  }
  public function setWriteRatioAvg($writeRatioAvg)
  {
    $this->writeRatioAvg = $writeRatioAvg;
  }
  public function getWriteRatioAvg()
  {
    return $this->writeRatioAvg;
  }
  public function setWriteRatioMax($writeRatioMax)
  {
    $this->writeRatioMax = $writeRatioMax;
  }
  public function getWriteRatioMax()
  {
    return $this->writeRatioMax;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExplainQueryStage::class, 'Google_Service_Bigquery_ExplainQueryStage');

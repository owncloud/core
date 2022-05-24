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

namespace Google\Service\CloudRun;

class GoogleCloudRunV2Execution extends \Google\Collection
{
  protected $collection_key = 'conditions';
  /**
   * @var string[]
   */
  public $annotations;
  /**
   * @var string
   */
  public $completionTime;
  protected $conditionsType = GoogleCloudRunV2Condition::class;
  protected $conditionsDataType = 'array';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $deleteTime;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $expireTime;
  /**
   * @var int
   */
  public $failedCount;
  /**
   * @var string
   */
  public $generation;
  /**
   * @var string
   */
  public $job;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $launchStage;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $observedGeneration;
  /**
   * @var int
   */
  public $parallelism;
  /**
   * @var bool
   */
  public $reconciling;
  /**
   * @var int
   */
  public $runningCount;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var int
   */
  public $succeededCount;
  /**
   * @var int
   */
  public $taskCount;
  protected $templateType = GoogleCloudRunV2TaskTemplate::class;
  protected $templateDataType = '';
  /**
   * @var string
   */
  public $uid;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string[]
   */
  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  /**
   * @return string[]
   */
  public function getAnnotations()
  {
    return $this->annotations;
  }
  /**
   * @param string
   */
  public function setCompletionTime($completionTime)
  {
    $this->completionTime = $completionTime;
  }
  /**
   * @return string
   */
  public function getCompletionTime()
  {
    return $this->completionTime;
  }
  /**
   * @param GoogleCloudRunV2Condition[]
   */
  public function setConditions($conditions)
  {
    $this->conditions = $conditions;
  }
  /**
   * @return GoogleCloudRunV2Condition[]
   */
  public function getConditions()
  {
    return $this->conditions;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDeleteTime($deleteTime)
  {
    $this->deleteTime = $deleteTime;
  }
  /**
   * @return string
   */
  public function getDeleteTime()
  {
    return $this->deleteTime;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  /**
   * @return string
   */
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  /**
   * @param int
   */
  public function setFailedCount($failedCount)
  {
    $this->failedCount = $failedCount;
  }
  /**
   * @return int
   */
  public function getFailedCount()
  {
    return $this->failedCount;
  }
  /**
   * @param string
   */
  public function setGeneration($generation)
  {
    $this->generation = $generation;
  }
  /**
   * @return string
   */
  public function getGeneration()
  {
    return $this->generation;
  }
  /**
   * @param string
   */
  public function setJob($job)
  {
    $this->job = $job;
  }
  /**
   * @return string
   */
  public function getJob()
  {
    return $this->job;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setLaunchStage($launchStage)
  {
    $this->launchStage = $launchStage;
  }
  /**
   * @return string
   */
  public function getLaunchStage()
  {
    return $this->launchStage;
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
  public function setObservedGeneration($observedGeneration)
  {
    $this->observedGeneration = $observedGeneration;
  }
  /**
   * @return string
   */
  public function getObservedGeneration()
  {
    return $this->observedGeneration;
  }
  /**
   * @param int
   */
  public function setParallelism($parallelism)
  {
    $this->parallelism = $parallelism;
  }
  /**
   * @return int
   */
  public function getParallelism()
  {
    return $this->parallelism;
  }
  /**
   * @param bool
   */
  public function setReconciling($reconciling)
  {
    $this->reconciling = $reconciling;
  }
  /**
   * @return bool
   */
  public function getReconciling()
  {
    return $this->reconciling;
  }
  /**
   * @param int
   */
  public function setRunningCount($runningCount)
  {
    $this->runningCount = $runningCount;
  }
  /**
   * @return int
   */
  public function getRunningCount()
  {
    return $this->runningCount;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param int
   */
  public function setSucceededCount($succeededCount)
  {
    $this->succeededCount = $succeededCount;
  }
  /**
   * @return int
   */
  public function getSucceededCount()
  {
    return $this->succeededCount;
  }
  /**
   * @param int
   */
  public function setTaskCount($taskCount)
  {
    $this->taskCount = $taskCount;
  }
  /**
   * @return int
   */
  public function getTaskCount()
  {
    return $this->taskCount;
  }
  /**
   * @param GoogleCloudRunV2TaskTemplate
   */
  public function setTemplate(GoogleCloudRunV2TaskTemplate $template)
  {
    $this->template = $template;
  }
  /**
   * @return GoogleCloudRunV2TaskTemplate
   */
  public function getTemplate()
  {
    return $this->template;
  }
  /**
   * @param string
   */
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  /**
   * @return string
   */
  public function getUid()
  {
    return $this->uid;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRunV2Execution::class, 'Google_Service_CloudRun_GoogleCloudRunV2Execution');

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

namespace Google\Service\Dataproc;

class WorkflowNode extends \Google\Collection
{
  protected $collection_key = 'prerequisiteStepIds';
  /**
   * @var string
   */
  public $error;
  /**
   * @var string
   */
  public $jobId;
  /**
   * @var string[]
   */
  public $prerequisiteStepIds;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $stepId;

  /**
   * @param string
   */
  public function setError($error)
  {
    $this->error = $error;
  }
  /**
   * @return string
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param string
   */
  public function setJobId($jobId)
  {
    $this->jobId = $jobId;
  }
  /**
   * @return string
   */
  public function getJobId()
  {
    return $this->jobId;
  }
  /**
   * @param string[]
   */
  public function setPrerequisiteStepIds($prerequisiteStepIds)
  {
    $this->prerequisiteStepIds = $prerequisiteStepIds;
  }
  /**
   * @return string[]
   */
  public function getPrerequisiteStepIds()
  {
    return $this->prerequisiteStepIds;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setStepId($stepId)
  {
    $this->stepId = $stepId;
  }
  /**
   * @return string
   */
  public function getStepId()
  {
    return $this->stepId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WorkflowNode::class, 'Google_Service_Dataproc_WorkflowNode');

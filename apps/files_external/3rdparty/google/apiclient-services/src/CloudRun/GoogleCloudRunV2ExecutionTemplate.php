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

class GoogleCloudRunV2ExecutionTemplate extends \Google\Model
{
  /**
   * @var string[]
   */
  public $annotations;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var int
   */
  public $parallelism;
  /**
   * @var int
   */
  public $taskCount;
  protected $templateType = GoogleCloudRunV2TaskTemplate::class;
  protected $templateDataType = '';

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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRunV2ExecutionTemplate::class, 'Google_Service_CloudRun_GoogleCloudRunV2ExecutionTemplate');

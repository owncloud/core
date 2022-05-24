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

namespace Google\Service\AIPlatformNotebooks;

class Execution extends \Google\Model
{
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  protected $executionTemplateType = ExecutionTemplate::class;
  protected $executionTemplateDataType = '';
  /**
   * @var string
   */
  public $jobUri;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $outputNotebookFile;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $updateTime;

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
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param ExecutionTemplate
   */
  public function setExecutionTemplate(ExecutionTemplate $executionTemplate)
  {
    $this->executionTemplate = $executionTemplate;
  }
  /**
   * @return ExecutionTemplate
   */
  public function getExecutionTemplate()
  {
    return $this->executionTemplate;
  }
  /**
   * @param string
   */
  public function setJobUri($jobUri)
  {
    $this->jobUri = $jobUri;
  }
  /**
   * @return string
   */
  public function getJobUri()
  {
    return $this->jobUri;
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
  public function setOutputNotebookFile($outputNotebookFile)
  {
    $this->outputNotebookFile = $outputNotebookFile;
  }
  /**
   * @return string
   */
  public function getOutputNotebookFile()
  {
    return $this->outputNotebookFile;
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
class_alias(Execution::class, 'Google_Service_AIPlatformNotebooks_Execution');

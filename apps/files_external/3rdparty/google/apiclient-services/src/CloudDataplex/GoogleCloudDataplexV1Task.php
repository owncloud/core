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

namespace Google\Service\CloudDataplex;

class GoogleCloudDataplexV1Task extends \Google\Model
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
  protected $executionSpecType = GoogleCloudDataplexV1TaskExecutionSpec::class;
  protected $executionSpecDataType = '';
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  protected $sparkType = GoogleCloudDataplexV1TaskSparkTaskConfig::class;
  protected $sparkDataType = '';
  /**
   * @var string
   */
  public $state;
  protected $triggerSpecType = GoogleCloudDataplexV1TaskTriggerSpec::class;
  protected $triggerSpecDataType = '';
  /**
   * @var string
   */
  public $uid;
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
   * @param GoogleCloudDataplexV1TaskExecutionSpec
   */
  public function setExecutionSpec(GoogleCloudDataplexV1TaskExecutionSpec $executionSpec)
  {
    $this->executionSpec = $executionSpec;
  }
  /**
   * @return GoogleCloudDataplexV1TaskExecutionSpec
   */
  public function getExecutionSpec()
  {
    return $this->executionSpec;
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
   * @param GoogleCloudDataplexV1TaskSparkTaskConfig
   */
  public function setSpark(GoogleCloudDataplexV1TaskSparkTaskConfig $spark)
  {
    $this->spark = $spark;
  }
  /**
   * @return GoogleCloudDataplexV1TaskSparkTaskConfig
   */
  public function getSpark()
  {
    return $this->spark;
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
   * @param GoogleCloudDataplexV1TaskTriggerSpec
   */
  public function setTriggerSpec(GoogleCloudDataplexV1TaskTriggerSpec $triggerSpec)
  {
    $this->triggerSpec = $triggerSpec;
  }
  /**
   * @return GoogleCloudDataplexV1TaskTriggerSpec
   */
  public function getTriggerSpec()
  {
    return $this->triggerSpec;
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
class_alias(GoogleCloudDataplexV1Task::class, 'Google_Service_CloudDataplex_GoogleCloudDataplexV1Task');

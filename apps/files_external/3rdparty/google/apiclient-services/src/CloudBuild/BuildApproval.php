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

namespace Google\Service\CloudBuild;

class BuildApproval extends \Google\Model
{
  protected $configType = ApprovalConfig::class;
  protected $configDataType = '';
  protected $resultType = ApprovalResult::class;
  protected $resultDataType = '';
  public $state;

  /**
   * @param ApprovalConfig
   */
  public function setConfig(ApprovalConfig $config)
  {
    $this->config = $config;
  }
  /**
   * @return ApprovalConfig
   */
  public function getConfig()
  {
    return $this->config;
  }
  /**
   * @param ApprovalResult
   */
  public function setResult(ApprovalResult $result)
  {
    $this->result = $result;
  }
  /**
   * @return ApprovalResult
   */
  public function getResult()
  {
    return $this->result;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuildApproval::class, 'Google_Service_CloudBuild_BuildApproval');

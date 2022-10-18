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

namespace Google\Service\CloudDeploy;

class DeployJobRun extends \Google\Model
{
  /**
   * @var string
   */
  public $build;
  /**
   * @var string
   */
  public $failureCause;
  /**
   * @var string
   */
  public $failureMessage;
  protected $metadataType = DeployJobRunMetadata::class;
  protected $metadataDataType = '';

  /**
   * @param string
   */
  public function setBuild($build)
  {
    $this->build = $build;
  }
  /**
   * @return string
   */
  public function getBuild()
  {
    return $this->build;
  }
  /**
   * @param string
   */
  public function setFailureCause($failureCause)
  {
    $this->failureCause = $failureCause;
  }
  /**
   * @return string
   */
  public function getFailureCause()
  {
    return $this->failureCause;
  }
  /**
   * @param string
   */
  public function setFailureMessage($failureMessage)
  {
    $this->failureMessage = $failureMessage;
  }
  /**
   * @return string
   */
  public function getFailureMessage()
  {
    return $this->failureMessage;
  }
  /**
   * @param DeployJobRunMetadata
   */
  public function setMetadata(DeployJobRunMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return DeployJobRunMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeployJobRun::class, 'Google_Service_CloudDeploy_DeployJobRun');

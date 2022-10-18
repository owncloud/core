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

class Rollout extends \Google\Collection
{
  protected $collection_key = 'phases';
  /**
   * @var string[]
   */
  public $annotations;
  /**
   * @var string
   */
  public $approvalState;
  /**
   * @var string
   */
  public $approveTime;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $deployEndTime;
  /**
   * @var string
   */
  public $deployFailureCause;
  /**
   * @var string
   */
  public $deployStartTime;
  /**
   * @var string
   */
  public $deployingBuild;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $enqueueTime;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $failureReason;
  /**
   * @var string[]
   */
  public $labels;
  protected $metadataType = Metadata::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $phasesType = Phase::class;
  protected $phasesDataType = 'array';
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $targetId;
  /**
   * @var string
   */
  public $uid;

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
  public function setApprovalState($approvalState)
  {
    $this->approvalState = $approvalState;
  }
  /**
   * @return string
   */
  public function getApprovalState()
  {
    return $this->approvalState;
  }
  /**
   * @param string
   */
  public function setApproveTime($approveTime)
  {
    $this->approveTime = $approveTime;
  }
  /**
   * @return string
   */
  public function getApproveTime()
  {
    return $this->approveTime;
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
  public function setDeployEndTime($deployEndTime)
  {
    $this->deployEndTime = $deployEndTime;
  }
  /**
   * @return string
   */
  public function getDeployEndTime()
  {
    return $this->deployEndTime;
  }
  /**
   * @param string
   */
  public function setDeployFailureCause($deployFailureCause)
  {
    $this->deployFailureCause = $deployFailureCause;
  }
  /**
   * @return string
   */
  public function getDeployFailureCause()
  {
    return $this->deployFailureCause;
  }
  /**
   * @param string
   */
  public function setDeployStartTime($deployStartTime)
  {
    $this->deployStartTime = $deployStartTime;
  }
  /**
   * @return string
   */
  public function getDeployStartTime()
  {
    return $this->deployStartTime;
  }
  /**
   * @param string
   */
  public function setDeployingBuild($deployingBuild)
  {
    $this->deployingBuild = $deployingBuild;
  }
  /**
   * @return string
   */
  public function getDeployingBuild()
  {
    return $this->deployingBuild;
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
  public function setEnqueueTime($enqueueTime)
  {
    $this->enqueueTime = $enqueueTime;
  }
  /**
   * @return string
   */
  public function getEnqueueTime()
  {
    return $this->enqueueTime;
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
  public function setFailureReason($failureReason)
  {
    $this->failureReason = $failureReason;
  }
  /**
   * @return string
   */
  public function getFailureReason()
  {
    return $this->failureReason;
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
   * @param Metadata
   */
  public function setMetadata(Metadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Metadata
   */
  public function getMetadata()
  {
    return $this->metadata;
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
   * @param Phase[]
   */
  public function setPhases($phases)
  {
    $this->phases = $phases;
  }
  /**
   * @return Phase[]
   */
  public function getPhases()
  {
    return $this->phases;
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
  public function setTargetId($targetId)
  {
    $this->targetId = $targetId;
  }
  /**
   * @return string
   */
  public function getTargetId()
  {
    return $this->targetId;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Rollout::class, 'Google_Service_CloudDeploy_Rollout');

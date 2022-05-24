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

namespace Google\Service\OSConfig;

class PatchJobInstanceDetailsSummary extends \Google\Model
{
  /**
   * @var string
   */
  public $ackedInstanceCount;
  /**
   * @var string
   */
  public $applyingPatchesInstanceCount;
  /**
   * @var string
   */
  public $downloadingPatchesInstanceCount;
  /**
   * @var string
   */
  public $failedInstanceCount;
  /**
   * @var string
   */
  public $inactiveInstanceCount;
  /**
   * @var string
   */
  public $noAgentDetectedInstanceCount;
  /**
   * @var string
   */
  public $notifiedInstanceCount;
  /**
   * @var string
   */
  public $pendingInstanceCount;
  /**
   * @var string
   */
  public $postPatchStepInstanceCount;
  /**
   * @var string
   */
  public $prePatchStepInstanceCount;
  /**
   * @var string
   */
  public $rebootingInstanceCount;
  /**
   * @var string
   */
  public $startedInstanceCount;
  /**
   * @var string
   */
  public $succeededInstanceCount;
  /**
   * @var string
   */
  public $succeededRebootRequiredInstanceCount;
  /**
   * @var string
   */
  public $timedOutInstanceCount;

  /**
   * @param string
   */
  public function setAckedInstanceCount($ackedInstanceCount)
  {
    $this->ackedInstanceCount = $ackedInstanceCount;
  }
  /**
   * @return string
   */
  public function getAckedInstanceCount()
  {
    return $this->ackedInstanceCount;
  }
  /**
   * @param string
   */
  public function setApplyingPatchesInstanceCount($applyingPatchesInstanceCount)
  {
    $this->applyingPatchesInstanceCount = $applyingPatchesInstanceCount;
  }
  /**
   * @return string
   */
  public function getApplyingPatchesInstanceCount()
  {
    return $this->applyingPatchesInstanceCount;
  }
  /**
   * @param string
   */
  public function setDownloadingPatchesInstanceCount($downloadingPatchesInstanceCount)
  {
    $this->downloadingPatchesInstanceCount = $downloadingPatchesInstanceCount;
  }
  /**
   * @return string
   */
  public function getDownloadingPatchesInstanceCount()
  {
    return $this->downloadingPatchesInstanceCount;
  }
  /**
   * @param string
   */
  public function setFailedInstanceCount($failedInstanceCount)
  {
    $this->failedInstanceCount = $failedInstanceCount;
  }
  /**
   * @return string
   */
  public function getFailedInstanceCount()
  {
    return $this->failedInstanceCount;
  }
  /**
   * @param string
   */
  public function setInactiveInstanceCount($inactiveInstanceCount)
  {
    $this->inactiveInstanceCount = $inactiveInstanceCount;
  }
  /**
   * @return string
   */
  public function getInactiveInstanceCount()
  {
    return $this->inactiveInstanceCount;
  }
  /**
   * @param string
   */
  public function setNoAgentDetectedInstanceCount($noAgentDetectedInstanceCount)
  {
    $this->noAgentDetectedInstanceCount = $noAgentDetectedInstanceCount;
  }
  /**
   * @return string
   */
  public function getNoAgentDetectedInstanceCount()
  {
    return $this->noAgentDetectedInstanceCount;
  }
  /**
   * @param string
   */
  public function setNotifiedInstanceCount($notifiedInstanceCount)
  {
    $this->notifiedInstanceCount = $notifiedInstanceCount;
  }
  /**
   * @return string
   */
  public function getNotifiedInstanceCount()
  {
    return $this->notifiedInstanceCount;
  }
  /**
   * @param string
   */
  public function setPendingInstanceCount($pendingInstanceCount)
  {
    $this->pendingInstanceCount = $pendingInstanceCount;
  }
  /**
   * @return string
   */
  public function getPendingInstanceCount()
  {
    return $this->pendingInstanceCount;
  }
  /**
   * @param string
   */
  public function setPostPatchStepInstanceCount($postPatchStepInstanceCount)
  {
    $this->postPatchStepInstanceCount = $postPatchStepInstanceCount;
  }
  /**
   * @return string
   */
  public function getPostPatchStepInstanceCount()
  {
    return $this->postPatchStepInstanceCount;
  }
  /**
   * @param string
   */
  public function setPrePatchStepInstanceCount($prePatchStepInstanceCount)
  {
    $this->prePatchStepInstanceCount = $prePatchStepInstanceCount;
  }
  /**
   * @return string
   */
  public function getPrePatchStepInstanceCount()
  {
    return $this->prePatchStepInstanceCount;
  }
  /**
   * @param string
   */
  public function setRebootingInstanceCount($rebootingInstanceCount)
  {
    $this->rebootingInstanceCount = $rebootingInstanceCount;
  }
  /**
   * @return string
   */
  public function getRebootingInstanceCount()
  {
    return $this->rebootingInstanceCount;
  }
  /**
   * @param string
   */
  public function setStartedInstanceCount($startedInstanceCount)
  {
    $this->startedInstanceCount = $startedInstanceCount;
  }
  /**
   * @return string
   */
  public function getStartedInstanceCount()
  {
    return $this->startedInstanceCount;
  }
  /**
   * @param string
   */
  public function setSucceededInstanceCount($succeededInstanceCount)
  {
    $this->succeededInstanceCount = $succeededInstanceCount;
  }
  /**
   * @return string
   */
  public function getSucceededInstanceCount()
  {
    return $this->succeededInstanceCount;
  }
  /**
   * @param string
   */
  public function setSucceededRebootRequiredInstanceCount($succeededRebootRequiredInstanceCount)
  {
    $this->succeededRebootRequiredInstanceCount = $succeededRebootRequiredInstanceCount;
  }
  /**
   * @return string
   */
  public function getSucceededRebootRequiredInstanceCount()
  {
    return $this->succeededRebootRequiredInstanceCount;
  }
  /**
   * @param string
   */
  public function setTimedOutInstanceCount($timedOutInstanceCount)
  {
    $this->timedOutInstanceCount = $timedOutInstanceCount;
  }
  /**
   * @return string
   */
  public function getTimedOutInstanceCount()
  {
    return $this->timedOutInstanceCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PatchJobInstanceDetailsSummary::class, 'Google_Service_OSConfig_PatchJobInstanceDetailsSummary');

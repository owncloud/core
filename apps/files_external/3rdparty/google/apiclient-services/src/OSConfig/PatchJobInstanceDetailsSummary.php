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
  public $ackedInstanceCount;
  public $applyingPatchesInstanceCount;
  public $downloadingPatchesInstanceCount;
  public $failedInstanceCount;
  public $inactiveInstanceCount;
  public $noAgentDetectedInstanceCount;
  public $notifiedInstanceCount;
  public $pendingInstanceCount;
  public $postPatchStepInstanceCount;
  public $prePatchStepInstanceCount;
  public $rebootingInstanceCount;
  public $startedInstanceCount;
  public $succeededInstanceCount;
  public $succeededRebootRequiredInstanceCount;
  public $timedOutInstanceCount;

  public function setAckedInstanceCount($ackedInstanceCount)
  {
    $this->ackedInstanceCount = $ackedInstanceCount;
  }
  public function getAckedInstanceCount()
  {
    return $this->ackedInstanceCount;
  }
  public function setApplyingPatchesInstanceCount($applyingPatchesInstanceCount)
  {
    $this->applyingPatchesInstanceCount = $applyingPatchesInstanceCount;
  }
  public function getApplyingPatchesInstanceCount()
  {
    return $this->applyingPatchesInstanceCount;
  }
  public function setDownloadingPatchesInstanceCount($downloadingPatchesInstanceCount)
  {
    $this->downloadingPatchesInstanceCount = $downloadingPatchesInstanceCount;
  }
  public function getDownloadingPatchesInstanceCount()
  {
    return $this->downloadingPatchesInstanceCount;
  }
  public function setFailedInstanceCount($failedInstanceCount)
  {
    $this->failedInstanceCount = $failedInstanceCount;
  }
  public function getFailedInstanceCount()
  {
    return $this->failedInstanceCount;
  }
  public function setInactiveInstanceCount($inactiveInstanceCount)
  {
    $this->inactiveInstanceCount = $inactiveInstanceCount;
  }
  public function getInactiveInstanceCount()
  {
    return $this->inactiveInstanceCount;
  }
  public function setNoAgentDetectedInstanceCount($noAgentDetectedInstanceCount)
  {
    $this->noAgentDetectedInstanceCount = $noAgentDetectedInstanceCount;
  }
  public function getNoAgentDetectedInstanceCount()
  {
    return $this->noAgentDetectedInstanceCount;
  }
  public function setNotifiedInstanceCount($notifiedInstanceCount)
  {
    $this->notifiedInstanceCount = $notifiedInstanceCount;
  }
  public function getNotifiedInstanceCount()
  {
    return $this->notifiedInstanceCount;
  }
  public function setPendingInstanceCount($pendingInstanceCount)
  {
    $this->pendingInstanceCount = $pendingInstanceCount;
  }
  public function getPendingInstanceCount()
  {
    return $this->pendingInstanceCount;
  }
  public function setPostPatchStepInstanceCount($postPatchStepInstanceCount)
  {
    $this->postPatchStepInstanceCount = $postPatchStepInstanceCount;
  }
  public function getPostPatchStepInstanceCount()
  {
    return $this->postPatchStepInstanceCount;
  }
  public function setPrePatchStepInstanceCount($prePatchStepInstanceCount)
  {
    $this->prePatchStepInstanceCount = $prePatchStepInstanceCount;
  }
  public function getPrePatchStepInstanceCount()
  {
    return $this->prePatchStepInstanceCount;
  }
  public function setRebootingInstanceCount($rebootingInstanceCount)
  {
    $this->rebootingInstanceCount = $rebootingInstanceCount;
  }
  public function getRebootingInstanceCount()
  {
    return $this->rebootingInstanceCount;
  }
  public function setStartedInstanceCount($startedInstanceCount)
  {
    $this->startedInstanceCount = $startedInstanceCount;
  }
  public function getStartedInstanceCount()
  {
    return $this->startedInstanceCount;
  }
  public function setSucceededInstanceCount($succeededInstanceCount)
  {
    $this->succeededInstanceCount = $succeededInstanceCount;
  }
  public function getSucceededInstanceCount()
  {
    return $this->succeededInstanceCount;
  }
  public function setSucceededRebootRequiredInstanceCount($succeededRebootRequiredInstanceCount)
  {
    $this->succeededRebootRequiredInstanceCount = $succeededRebootRequiredInstanceCount;
  }
  public function getSucceededRebootRequiredInstanceCount()
  {
    return $this->succeededRebootRequiredInstanceCount;
  }
  public function setTimedOutInstanceCount($timedOutInstanceCount)
  {
    $this->timedOutInstanceCount = $timedOutInstanceCount;
  }
  public function getTimedOutInstanceCount()
  {
    return $this->timedOutInstanceCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PatchJobInstanceDetailsSummary::class, 'Google_Service_OSConfig_PatchJobInstanceDetailsSummary');

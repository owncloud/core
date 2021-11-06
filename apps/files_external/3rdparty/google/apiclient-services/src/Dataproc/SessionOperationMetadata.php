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

class SessionOperationMetadata extends \Google\Collection
{
  protected $collection_key = 'warnings';
  public $createTime;
  public $description;
  public $doneTime;
  public $labels;
  public $operationType;
  public $session;
  public $sessionUuid;
  public $warnings;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDoneTime($doneTime)
  {
    $this->doneTime = $doneTime;
  }
  public function getDoneTime()
  {
    return $this->doneTime;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setOperationType($operationType)
  {
    $this->operationType = $operationType;
  }
  public function getOperationType()
  {
    return $this->operationType;
  }
  public function setSession($session)
  {
    $this->session = $session;
  }
  public function getSession()
  {
    return $this->session;
  }
  public function setSessionUuid($sessionUuid)
  {
    $this->sessionUuid = $sessionUuid;
  }
  public function getSessionUuid()
  {
    return $this->sessionUuid;
  }
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  public function getWarnings()
  {
    return $this->warnings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SessionOperationMetadata::class, 'Google_Service_Dataproc_SessionOperationMetadata');

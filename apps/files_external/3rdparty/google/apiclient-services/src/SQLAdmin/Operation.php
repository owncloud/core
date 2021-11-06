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

namespace Google\Service\SQLAdmin;

class Operation extends \Google\Model
{
  protected $backupContextType = BackupContext::class;
  protected $backupContextDataType = '';
  public $endTime;
  protected $errorType = OperationErrors::class;
  protected $errorDataType = '';
  protected $exportContextType = ExportContext::class;
  protected $exportContextDataType = '';
  protected $importContextType = ImportContext::class;
  protected $importContextDataType = '';
  public $insertTime;
  public $kind;
  public $name;
  public $operationType;
  public $selfLink;
  public $startTime;
  public $status;
  public $targetId;
  public $targetLink;
  public $targetProject;
  public $user;

  /**
   * @param BackupContext
   */
  public function setBackupContext(BackupContext $backupContext)
  {
    $this->backupContext = $backupContext;
  }
  /**
   * @return BackupContext
   */
  public function getBackupContext()
  {
    return $this->backupContext;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param OperationErrors
   */
  public function setError(OperationErrors $error)
  {
    $this->error = $error;
  }
  /**
   * @return OperationErrors
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param ExportContext
   */
  public function setExportContext(ExportContext $exportContext)
  {
    $this->exportContext = $exportContext;
  }
  /**
   * @return ExportContext
   */
  public function getExportContext()
  {
    return $this->exportContext;
  }
  /**
   * @param ImportContext
   */
  public function setImportContext(ImportContext $importContext)
  {
    $this->importContext = $importContext;
  }
  /**
   * @return ImportContext
   */
  public function getImportContext()
  {
    return $this->importContext;
  }
  public function setInsertTime($insertTime)
  {
    $this->insertTime = $insertTime;
  }
  public function getInsertTime()
  {
    return $this->insertTime;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOperationType($operationType)
  {
    $this->operationType = $operationType;
  }
  public function getOperationType()
  {
    return $this->operationType;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setTargetId($targetId)
  {
    $this->targetId = $targetId;
  }
  public function getTargetId()
  {
    return $this->targetId;
  }
  public function setTargetLink($targetLink)
  {
    $this->targetLink = $targetLink;
  }
  public function getTargetLink()
  {
    return $this->targetLink;
  }
  public function setTargetProject($targetProject)
  {
    $this->targetProject = $targetProject;
  }
  public function getTargetProject()
  {
    return $this->targetProject;
  }
  public function setUser($user)
  {
    $this->user = $user;
  }
  public function getUser()
  {
    return $this->user;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Operation::class, 'Google_Service_SQLAdmin_Operation');

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
  /**
   * @var string
   */
  public $endTime;
  protected $errorType = OperationErrors::class;
  protected $errorDataType = '';
  protected $exportContextType = ExportContext::class;
  protected $exportContextDataType = '';
  protected $importContextType = ImportContext::class;
  protected $importContextDataType = '';
  /**
   * @var string
   */
  public $insertTime;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $operationType;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $targetId;
  /**
   * @var string
   */
  public $targetLink;
  /**
   * @var string
   */
  public $targetProject;
  /**
   * @var string
   */
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
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setInsertTime($insertTime)
  {
    $this->insertTime = $insertTime;
  }
  /**
   * @return string
   */
  public function getInsertTime()
  {
    return $this->insertTime;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
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
  public function setOperationType($operationType)
  {
    $this->operationType = $operationType;
  }
  /**
   * @return string
   */
  public function getOperationType()
  {
    return $this->operationType;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
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
  public function setTargetLink($targetLink)
  {
    $this->targetLink = $targetLink;
  }
  /**
   * @return string
   */
  public function getTargetLink()
  {
    return $this->targetLink;
  }
  /**
   * @param string
   */
  public function setTargetProject($targetProject)
  {
    $this->targetProject = $targetProject;
  }
  /**
   * @return string
   */
  public function getTargetProject()
  {
    return $this->targetProject;
  }
  /**
   * @param string
   */
  public function setUser($user)
  {
    $this->user = $user;
  }
  /**
   * @return string
   */
  public function getUser()
  {
    return $this->user;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Operation::class, 'Google_Service_SQLAdmin_Operation');

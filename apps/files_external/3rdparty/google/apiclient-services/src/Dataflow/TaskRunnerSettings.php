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

namespace Google\Service\Dataflow;

class TaskRunnerSettings extends \Google\Collection
{
  protected $collection_key = 'oauthScopes';
  /**
   * @var bool
   */
  public $alsologtostderr;
  /**
   * @var string
   */
  public $baseTaskDir;
  /**
   * @var string
   */
  public $baseUrl;
  /**
   * @var string
   */
  public $commandlinesFileName;
  /**
   * @var bool
   */
  public $continueOnException;
  /**
   * @var string
   */
  public $dataflowApiVersion;
  /**
   * @var string
   */
  public $harnessCommand;
  /**
   * @var string
   */
  public $languageHint;
  /**
   * @var string
   */
  public $logDir;
  /**
   * @var bool
   */
  public $logToSerialconsole;
  /**
   * @var string
   */
  public $logUploadLocation;
  /**
   * @var string[]
   */
  public $oauthScopes;
  protected $parallelWorkerSettingsType = WorkerSettings::class;
  protected $parallelWorkerSettingsDataType = '';
  /**
   * @var string
   */
  public $streamingWorkerMainClass;
  /**
   * @var string
   */
  public $taskGroup;
  /**
   * @var string
   */
  public $taskUser;
  /**
   * @var string
   */
  public $tempStoragePrefix;
  /**
   * @var string
   */
  public $vmId;
  /**
   * @var string
   */
  public $workflowFileName;

  /**
   * @param bool
   */
  public function setAlsologtostderr($alsologtostderr)
  {
    $this->alsologtostderr = $alsologtostderr;
  }
  /**
   * @return bool
   */
  public function getAlsologtostderr()
  {
    return $this->alsologtostderr;
  }
  /**
   * @param string
   */
  public function setBaseTaskDir($baseTaskDir)
  {
    $this->baseTaskDir = $baseTaskDir;
  }
  /**
   * @return string
   */
  public function getBaseTaskDir()
  {
    return $this->baseTaskDir;
  }
  /**
   * @param string
   */
  public function setBaseUrl($baseUrl)
  {
    $this->baseUrl = $baseUrl;
  }
  /**
   * @return string
   */
  public function getBaseUrl()
  {
    return $this->baseUrl;
  }
  /**
   * @param string
   */
  public function setCommandlinesFileName($commandlinesFileName)
  {
    $this->commandlinesFileName = $commandlinesFileName;
  }
  /**
   * @return string
   */
  public function getCommandlinesFileName()
  {
    return $this->commandlinesFileName;
  }
  /**
   * @param bool
   */
  public function setContinueOnException($continueOnException)
  {
    $this->continueOnException = $continueOnException;
  }
  /**
   * @return bool
   */
  public function getContinueOnException()
  {
    return $this->continueOnException;
  }
  /**
   * @param string
   */
  public function setDataflowApiVersion($dataflowApiVersion)
  {
    $this->dataflowApiVersion = $dataflowApiVersion;
  }
  /**
   * @return string
   */
  public function getDataflowApiVersion()
  {
    return $this->dataflowApiVersion;
  }
  /**
   * @param string
   */
  public function setHarnessCommand($harnessCommand)
  {
    $this->harnessCommand = $harnessCommand;
  }
  /**
   * @return string
   */
  public function getHarnessCommand()
  {
    return $this->harnessCommand;
  }
  /**
   * @param string
   */
  public function setLanguageHint($languageHint)
  {
    $this->languageHint = $languageHint;
  }
  /**
   * @return string
   */
  public function getLanguageHint()
  {
    return $this->languageHint;
  }
  /**
   * @param string
   */
  public function setLogDir($logDir)
  {
    $this->logDir = $logDir;
  }
  /**
   * @return string
   */
  public function getLogDir()
  {
    return $this->logDir;
  }
  /**
   * @param bool
   */
  public function setLogToSerialconsole($logToSerialconsole)
  {
    $this->logToSerialconsole = $logToSerialconsole;
  }
  /**
   * @return bool
   */
  public function getLogToSerialconsole()
  {
    return $this->logToSerialconsole;
  }
  /**
   * @param string
   */
  public function setLogUploadLocation($logUploadLocation)
  {
    $this->logUploadLocation = $logUploadLocation;
  }
  /**
   * @return string
   */
  public function getLogUploadLocation()
  {
    return $this->logUploadLocation;
  }
  /**
   * @param string[]
   */
  public function setOauthScopes($oauthScopes)
  {
    $this->oauthScopes = $oauthScopes;
  }
  /**
   * @return string[]
   */
  public function getOauthScopes()
  {
    return $this->oauthScopes;
  }
  /**
   * @param WorkerSettings
   */
  public function setParallelWorkerSettings(WorkerSettings $parallelWorkerSettings)
  {
    $this->parallelWorkerSettings = $parallelWorkerSettings;
  }
  /**
   * @return WorkerSettings
   */
  public function getParallelWorkerSettings()
  {
    return $this->parallelWorkerSettings;
  }
  /**
   * @param string
   */
  public function setStreamingWorkerMainClass($streamingWorkerMainClass)
  {
    $this->streamingWorkerMainClass = $streamingWorkerMainClass;
  }
  /**
   * @return string
   */
  public function getStreamingWorkerMainClass()
  {
    return $this->streamingWorkerMainClass;
  }
  /**
   * @param string
   */
  public function setTaskGroup($taskGroup)
  {
    $this->taskGroup = $taskGroup;
  }
  /**
   * @return string
   */
  public function getTaskGroup()
  {
    return $this->taskGroup;
  }
  /**
   * @param string
   */
  public function setTaskUser($taskUser)
  {
    $this->taskUser = $taskUser;
  }
  /**
   * @return string
   */
  public function getTaskUser()
  {
    return $this->taskUser;
  }
  /**
   * @param string
   */
  public function setTempStoragePrefix($tempStoragePrefix)
  {
    $this->tempStoragePrefix = $tempStoragePrefix;
  }
  /**
   * @return string
   */
  public function getTempStoragePrefix()
  {
    return $this->tempStoragePrefix;
  }
  /**
   * @param string
   */
  public function setVmId($vmId)
  {
    $this->vmId = $vmId;
  }
  /**
   * @return string
   */
  public function getVmId()
  {
    return $this->vmId;
  }
  /**
   * @param string
   */
  public function setWorkflowFileName($workflowFileName)
  {
    $this->workflowFileName = $workflowFileName;
  }
  /**
   * @return string
   */
  public function getWorkflowFileName()
  {
    return $this->workflowFileName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TaskRunnerSettings::class, 'Google_Service_Dataflow_TaskRunnerSettings');

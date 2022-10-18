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

namespace Google\Service\Contentwarehouse;

class AssistantLogsDeviceSelectionLog extends \Google\Collection
{
  protected $collection_key = 'testCodes';
  protected $allDefaultDevicesType = AssistantLogsDefaultDeviceLog::class;
  protected $allDefaultDevicesDataType = 'array';
  protected $allMediaStreamLogType = AssistantLogsAllMediaStreamLog::class;
  protected $allMediaStreamLogDataType = '';
  protected $counterfactualDeviceSelectionLogType = AssistantLogsDeviceSelectionLog::class;
  protected $counterfactualDeviceSelectionLogDataType = '';
  protected $defaultDevicesType = AssistantLogsDefaultDeviceLog::class;
  protected $defaultDevicesDataType = '';
  protected $defaultDevicesLogType = AssistantLogsDefaultDevicesLog::class;
  protected $defaultDevicesLogDataType = '';
  /**
   * @var string[]
   */
  public $devicesStr;
  protected $inputErrorLogType = AssistantLogsInputErrorLog::class;
  protected $inputErrorLogDataType = 'array';
  protected $localDeviceType = AssistantLogsDeviceInfoLog::class;
  protected $localDeviceDataType = '';
  /**
   * @var string
   */
  public $logDataSource;
  protected $mediaFocusType = AssistantLogsMediaFocusInfoLog::class;
  protected $mediaFocusDataType = '';
  protected $mediaFocusesLogType = AssistantLogsMediaFocusesLog::class;
  protected $mediaFocusesLogDataType = '';
  protected $nearbyDevicesLogType = AssistantLogsNearbyDevicesLog::class;
  protected $nearbyDevicesLogDataType = '';
  protected $queryAnnotationType = AssistantLogsQueryAnnotationLog::class;
  protected $queryAnnotationDataType = '';
  protected $selectionResultType = AssistantLogsDeviceSelectionResultLog::class;
  protected $selectionResultDataType = '';
  protected $testCodesType = AssistantLogsDeviceTargetingTestCode::class;
  protected $testCodesDataType = 'array';

  /**
   * @param AssistantLogsDefaultDeviceLog[]
   */
  public function setAllDefaultDevices($allDefaultDevices)
  {
    $this->allDefaultDevices = $allDefaultDevices;
  }
  /**
   * @return AssistantLogsDefaultDeviceLog[]
   */
  public function getAllDefaultDevices()
  {
    return $this->allDefaultDevices;
  }
  /**
   * @param AssistantLogsAllMediaStreamLog
   */
  public function setAllMediaStreamLog(AssistantLogsAllMediaStreamLog $allMediaStreamLog)
  {
    $this->allMediaStreamLog = $allMediaStreamLog;
  }
  /**
   * @return AssistantLogsAllMediaStreamLog
   */
  public function getAllMediaStreamLog()
  {
    return $this->allMediaStreamLog;
  }
  /**
   * @param AssistantLogsDeviceSelectionLog
   */
  public function setCounterfactualDeviceSelectionLog(AssistantLogsDeviceSelectionLog $counterfactualDeviceSelectionLog)
  {
    $this->counterfactualDeviceSelectionLog = $counterfactualDeviceSelectionLog;
  }
  /**
   * @return AssistantLogsDeviceSelectionLog
   */
  public function getCounterfactualDeviceSelectionLog()
  {
    return $this->counterfactualDeviceSelectionLog;
  }
  /**
   * @param AssistantLogsDefaultDeviceLog
   */
  public function setDefaultDevices(AssistantLogsDefaultDeviceLog $defaultDevices)
  {
    $this->defaultDevices = $defaultDevices;
  }
  /**
   * @return AssistantLogsDefaultDeviceLog
   */
  public function getDefaultDevices()
  {
    return $this->defaultDevices;
  }
  /**
   * @param AssistantLogsDefaultDevicesLog
   */
  public function setDefaultDevicesLog(AssistantLogsDefaultDevicesLog $defaultDevicesLog)
  {
    $this->defaultDevicesLog = $defaultDevicesLog;
  }
  /**
   * @return AssistantLogsDefaultDevicesLog
   */
  public function getDefaultDevicesLog()
  {
    return $this->defaultDevicesLog;
  }
  /**
   * @param string[]
   */
  public function setDevicesStr($devicesStr)
  {
    $this->devicesStr = $devicesStr;
  }
  /**
   * @return string[]
   */
  public function getDevicesStr()
  {
    return $this->devicesStr;
  }
  /**
   * @param AssistantLogsInputErrorLog[]
   */
  public function setInputErrorLog($inputErrorLog)
  {
    $this->inputErrorLog = $inputErrorLog;
  }
  /**
   * @return AssistantLogsInputErrorLog[]
   */
  public function getInputErrorLog()
  {
    return $this->inputErrorLog;
  }
  /**
   * @param AssistantLogsDeviceInfoLog
   */
  public function setLocalDevice(AssistantLogsDeviceInfoLog $localDevice)
  {
    $this->localDevice = $localDevice;
  }
  /**
   * @return AssistantLogsDeviceInfoLog
   */
  public function getLocalDevice()
  {
    return $this->localDevice;
  }
  /**
   * @param string
   */
  public function setLogDataSource($logDataSource)
  {
    $this->logDataSource = $logDataSource;
  }
  /**
   * @return string
   */
  public function getLogDataSource()
  {
    return $this->logDataSource;
  }
  /**
   * @param AssistantLogsMediaFocusInfoLog
   */
  public function setMediaFocus(AssistantLogsMediaFocusInfoLog $mediaFocus)
  {
    $this->mediaFocus = $mediaFocus;
  }
  /**
   * @return AssistantLogsMediaFocusInfoLog
   */
  public function getMediaFocus()
  {
    return $this->mediaFocus;
  }
  /**
   * @param AssistantLogsMediaFocusesLog
   */
  public function setMediaFocusesLog(AssistantLogsMediaFocusesLog $mediaFocusesLog)
  {
    $this->mediaFocusesLog = $mediaFocusesLog;
  }
  /**
   * @return AssistantLogsMediaFocusesLog
   */
  public function getMediaFocusesLog()
  {
    return $this->mediaFocusesLog;
  }
  /**
   * @param AssistantLogsNearbyDevicesLog
   */
  public function setNearbyDevicesLog(AssistantLogsNearbyDevicesLog $nearbyDevicesLog)
  {
    $this->nearbyDevicesLog = $nearbyDevicesLog;
  }
  /**
   * @return AssistantLogsNearbyDevicesLog
   */
  public function getNearbyDevicesLog()
  {
    return $this->nearbyDevicesLog;
  }
  /**
   * @param AssistantLogsQueryAnnotationLog
   */
  public function setQueryAnnotation(AssistantLogsQueryAnnotationLog $queryAnnotation)
  {
    $this->queryAnnotation = $queryAnnotation;
  }
  /**
   * @return AssistantLogsQueryAnnotationLog
   */
  public function getQueryAnnotation()
  {
    return $this->queryAnnotation;
  }
  /**
   * @param AssistantLogsDeviceSelectionResultLog
   */
  public function setSelectionResult(AssistantLogsDeviceSelectionResultLog $selectionResult)
  {
    $this->selectionResult = $selectionResult;
  }
  /**
   * @return AssistantLogsDeviceSelectionResultLog
   */
  public function getSelectionResult()
  {
    return $this->selectionResult;
  }
  /**
   * @param AssistantLogsDeviceTargetingTestCode[]
   */
  public function setTestCodes($testCodes)
  {
    $this->testCodes = $testCodes;
  }
  /**
   * @return AssistantLogsDeviceTargetingTestCode[]
   */
  public function getTestCodes()
  {
    return $this->testCodes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantLogsDeviceSelectionLog::class, 'Google_Service_Contentwarehouse_AssistantLogsDeviceSelectionLog');

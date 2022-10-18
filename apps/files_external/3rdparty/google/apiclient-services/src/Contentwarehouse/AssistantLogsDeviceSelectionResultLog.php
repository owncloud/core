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

class AssistantLogsDeviceSelectionResultLog extends \Google\Collection
{
  protected $collection_key = 'processorInfo';
  protected $ambiguousTargetDevicesType = AssistantLogsAmbiguousTargetDeviceLog::class;
  protected $ambiguousTargetDevicesDataType = '';
  protected $deviceSelectionDecisionSummaryType = AssistantLogsMediaDeviceSelectionDecisionSummary::class;
  protected $deviceSelectionDecisionSummaryDataType = '';
  /**
   * @var string
   */
  public $deviceTargetingErrorType;
  /**
   * @var string
   */
  public $finalLumosStage;
  protected $lowConfidenceTargetDeviceType = AssistantLogsLowConfidenceTargetDeviceLog::class;
  protected $lowConfidenceTargetDeviceDataType = '';
  /**
   * @var string
   */
  public $mediaFocusSelectionErrorType;
  protected $processorInfoType = AssistantLogsLumosProcessorInfo::class;
  protected $processorInfoDataType = 'array';
  protected $qualifiedDevicesType = AssistantLogsAmbiguousTargetDeviceLog::class;
  protected $qualifiedDevicesDataType = '';
  protected $singleTargetDeviceType = AssistantLogsDeviceInfoLog::class;
  protected $singleTargetDeviceDataType = '';
  protected $targetDeviceType = AssistantLogsTargetDeviceLog::class;
  protected $targetDeviceDataType = '';

  /**
   * @param AssistantLogsAmbiguousTargetDeviceLog
   */
  public function setAmbiguousTargetDevices(AssistantLogsAmbiguousTargetDeviceLog $ambiguousTargetDevices)
  {
    $this->ambiguousTargetDevices = $ambiguousTargetDevices;
  }
  /**
   * @return AssistantLogsAmbiguousTargetDeviceLog
   */
  public function getAmbiguousTargetDevices()
  {
    return $this->ambiguousTargetDevices;
  }
  /**
   * @param AssistantLogsMediaDeviceSelectionDecisionSummary
   */
  public function setDeviceSelectionDecisionSummary(AssistantLogsMediaDeviceSelectionDecisionSummary $deviceSelectionDecisionSummary)
  {
    $this->deviceSelectionDecisionSummary = $deviceSelectionDecisionSummary;
  }
  /**
   * @return AssistantLogsMediaDeviceSelectionDecisionSummary
   */
  public function getDeviceSelectionDecisionSummary()
  {
    return $this->deviceSelectionDecisionSummary;
  }
  /**
   * @param string
   */
  public function setDeviceTargetingErrorType($deviceTargetingErrorType)
  {
    $this->deviceTargetingErrorType = $deviceTargetingErrorType;
  }
  /**
   * @return string
   */
  public function getDeviceTargetingErrorType()
  {
    return $this->deviceTargetingErrorType;
  }
  /**
   * @param string
   */
  public function setFinalLumosStage($finalLumosStage)
  {
    $this->finalLumosStage = $finalLumosStage;
  }
  /**
   * @return string
   */
  public function getFinalLumosStage()
  {
    return $this->finalLumosStage;
  }
  /**
   * @param AssistantLogsLowConfidenceTargetDeviceLog
   */
  public function setLowConfidenceTargetDevice(AssistantLogsLowConfidenceTargetDeviceLog $lowConfidenceTargetDevice)
  {
    $this->lowConfidenceTargetDevice = $lowConfidenceTargetDevice;
  }
  /**
   * @return AssistantLogsLowConfidenceTargetDeviceLog
   */
  public function getLowConfidenceTargetDevice()
  {
    return $this->lowConfidenceTargetDevice;
  }
  /**
   * @param string
   */
  public function setMediaFocusSelectionErrorType($mediaFocusSelectionErrorType)
  {
    $this->mediaFocusSelectionErrorType = $mediaFocusSelectionErrorType;
  }
  /**
   * @return string
   */
  public function getMediaFocusSelectionErrorType()
  {
    return $this->mediaFocusSelectionErrorType;
  }
  /**
   * @param AssistantLogsLumosProcessorInfo[]
   */
  public function setProcessorInfo($processorInfo)
  {
    $this->processorInfo = $processorInfo;
  }
  /**
   * @return AssistantLogsLumosProcessorInfo[]
   */
  public function getProcessorInfo()
  {
    return $this->processorInfo;
  }
  /**
   * @param AssistantLogsAmbiguousTargetDeviceLog
   */
  public function setQualifiedDevices(AssistantLogsAmbiguousTargetDeviceLog $qualifiedDevices)
  {
    $this->qualifiedDevices = $qualifiedDevices;
  }
  /**
   * @return AssistantLogsAmbiguousTargetDeviceLog
   */
  public function getQualifiedDevices()
  {
    return $this->qualifiedDevices;
  }
  /**
   * @param AssistantLogsDeviceInfoLog
   */
  public function setSingleTargetDevice(AssistantLogsDeviceInfoLog $singleTargetDevice)
  {
    $this->singleTargetDevice = $singleTargetDevice;
  }
  /**
   * @return AssistantLogsDeviceInfoLog
   */
  public function getSingleTargetDevice()
  {
    return $this->singleTargetDevice;
  }
  /**
   * @param AssistantLogsTargetDeviceLog
   */
  public function setTargetDevice(AssistantLogsTargetDeviceLog $targetDevice)
  {
    $this->targetDevice = $targetDevice;
  }
  /**
   * @return AssistantLogsTargetDeviceLog
   */
  public function getTargetDevice()
  {
    return $this->targetDevice;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantLogsDeviceSelectionResultLog::class, 'Google_Service_Contentwarehouse_AssistantLogsDeviceSelectionResultLog');

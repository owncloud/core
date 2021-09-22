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

namespace Google\Service\AndroidManagement;

class Device extends \Google\Collection
{
  protected $collection_key = 'previousDeviceNames';
  public $apiLevel;
  protected $applicationReportsType = ApplicationReport::class;
  protected $applicationReportsDataType = 'array';
  protected $appliedPasswordPoliciesType = PasswordRequirements::class;
  protected $appliedPasswordPoliciesDataType = 'array';
  public $appliedPolicyName;
  public $appliedPolicyVersion;
  public $appliedState;
  protected $commonCriteriaModeInfoType = CommonCriteriaModeInfo::class;
  protected $commonCriteriaModeInfoDataType = '';
  protected $deviceSettingsType = DeviceSettings::class;
  protected $deviceSettingsDataType = '';
  protected $disabledReasonType = UserFacingMessage::class;
  protected $disabledReasonDataType = '';
  protected $displaysType = Display::class;
  protected $displaysDataType = 'array';
  public $enrollmentTime;
  public $enrollmentTokenData;
  public $enrollmentTokenName;
  protected $hardwareInfoType = HardwareInfo::class;
  protected $hardwareInfoDataType = '';
  protected $hardwareStatusSamplesType = HardwareStatus::class;
  protected $hardwareStatusSamplesDataType = 'array';
  public $lastPolicyComplianceReportTime;
  public $lastPolicySyncTime;
  public $lastStatusReportTime;
  public $managementMode;
  protected $memoryEventsType = MemoryEvent::class;
  protected $memoryEventsDataType = 'array';
  protected $memoryInfoType = MemoryInfo::class;
  protected $memoryInfoDataType = '';
  public $name;
  protected $networkInfoType = NetworkInfo::class;
  protected $networkInfoDataType = '';
  protected $nonComplianceDetailsType = NonComplianceDetail::class;
  protected $nonComplianceDetailsDataType = 'array';
  public $ownership;
  public $policyCompliant;
  public $policyName;
  protected $powerManagementEventsType = PowerManagementEvent::class;
  protected $powerManagementEventsDataType = 'array';
  public $previousDeviceNames;
  protected $securityPostureType = SecurityPosture::class;
  protected $securityPostureDataType = '';
  protected $softwareInfoType = SoftwareInfo::class;
  protected $softwareInfoDataType = '';
  public $state;
  public $systemProperties;
  protected $userType = User::class;
  protected $userDataType = '';
  public $userName;

  public function setApiLevel($apiLevel)
  {
    $this->apiLevel = $apiLevel;
  }
  public function getApiLevel()
  {
    return $this->apiLevel;
  }
  /**
   * @param ApplicationReport[]
   */
  public function setApplicationReports($applicationReports)
  {
    $this->applicationReports = $applicationReports;
  }
  /**
   * @return ApplicationReport[]
   */
  public function getApplicationReports()
  {
    return $this->applicationReports;
  }
  /**
   * @param PasswordRequirements[]
   */
  public function setAppliedPasswordPolicies($appliedPasswordPolicies)
  {
    $this->appliedPasswordPolicies = $appliedPasswordPolicies;
  }
  /**
   * @return PasswordRequirements[]
   */
  public function getAppliedPasswordPolicies()
  {
    return $this->appliedPasswordPolicies;
  }
  public function setAppliedPolicyName($appliedPolicyName)
  {
    $this->appliedPolicyName = $appliedPolicyName;
  }
  public function getAppliedPolicyName()
  {
    return $this->appliedPolicyName;
  }
  public function setAppliedPolicyVersion($appliedPolicyVersion)
  {
    $this->appliedPolicyVersion = $appliedPolicyVersion;
  }
  public function getAppliedPolicyVersion()
  {
    return $this->appliedPolicyVersion;
  }
  public function setAppliedState($appliedState)
  {
    $this->appliedState = $appliedState;
  }
  public function getAppliedState()
  {
    return $this->appliedState;
  }
  /**
   * @param CommonCriteriaModeInfo
   */
  public function setCommonCriteriaModeInfo(CommonCriteriaModeInfo $commonCriteriaModeInfo)
  {
    $this->commonCriteriaModeInfo = $commonCriteriaModeInfo;
  }
  /**
   * @return CommonCriteriaModeInfo
   */
  public function getCommonCriteriaModeInfo()
  {
    return $this->commonCriteriaModeInfo;
  }
  /**
   * @param DeviceSettings
   */
  public function setDeviceSettings(DeviceSettings $deviceSettings)
  {
    $this->deviceSettings = $deviceSettings;
  }
  /**
   * @return DeviceSettings
   */
  public function getDeviceSettings()
  {
    return $this->deviceSettings;
  }
  /**
   * @param UserFacingMessage
   */
  public function setDisabledReason(UserFacingMessage $disabledReason)
  {
    $this->disabledReason = $disabledReason;
  }
  /**
   * @return UserFacingMessage
   */
  public function getDisabledReason()
  {
    return $this->disabledReason;
  }
  /**
   * @param Display[]
   */
  public function setDisplays($displays)
  {
    $this->displays = $displays;
  }
  /**
   * @return Display[]
   */
  public function getDisplays()
  {
    return $this->displays;
  }
  public function setEnrollmentTime($enrollmentTime)
  {
    $this->enrollmentTime = $enrollmentTime;
  }
  public function getEnrollmentTime()
  {
    return $this->enrollmentTime;
  }
  public function setEnrollmentTokenData($enrollmentTokenData)
  {
    $this->enrollmentTokenData = $enrollmentTokenData;
  }
  public function getEnrollmentTokenData()
  {
    return $this->enrollmentTokenData;
  }
  public function setEnrollmentTokenName($enrollmentTokenName)
  {
    $this->enrollmentTokenName = $enrollmentTokenName;
  }
  public function getEnrollmentTokenName()
  {
    return $this->enrollmentTokenName;
  }
  /**
   * @param HardwareInfo
   */
  public function setHardwareInfo(HardwareInfo $hardwareInfo)
  {
    $this->hardwareInfo = $hardwareInfo;
  }
  /**
   * @return HardwareInfo
   */
  public function getHardwareInfo()
  {
    return $this->hardwareInfo;
  }
  /**
   * @param HardwareStatus[]
   */
  public function setHardwareStatusSamples($hardwareStatusSamples)
  {
    $this->hardwareStatusSamples = $hardwareStatusSamples;
  }
  /**
   * @return HardwareStatus[]
   */
  public function getHardwareStatusSamples()
  {
    return $this->hardwareStatusSamples;
  }
  public function setLastPolicyComplianceReportTime($lastPolicyComplianceReportTime)
  {
    $this->lastPolicyComplianceReportTime = $lastPolicyComplianceReportTime;
  }
  public function getLastPolicyComplianceReportTime()
  {
    return $this->lastPolicyComplianceReportTime;
  }
  public function setLastPolicySyncTime($lastPolicySyncTime)
  {
    $this->lastPolicySyncTime = $lastPolicySyncTime;
  }
  public function getLastPolicySyncTime()
  {
    return $this->lastPolicySyncTime;
  }
  public function setLastStatusReportTime($lastStatusReportTime)
  {
    $this->lastStatusReportTime = $lastStatusReportTime;
  }
  public function getLastStatusReportTime()
  {
    return $this->lastStatusReportTime;
  }
  public function setManagementMode($managementMode)
  {
    $this->managementMode = $managementMode;
  }
  public function getManagementMode()
  {
    return $this->managementMode;
  }
  /**
   * @param MemoryEvent[]
   */
  public function setMemoryEvents($memoryEvents)
  {
    $this->memoryEvents = $memoryEvents;
  }
  /**
   * @return MemoryEvent[]
   */
  public function getMemoryEvents()
  {
    return $this->memoryEvents;
  }
  /**
   * @param MemoryInfo
   */
  public function setMemoryInfo(MemoryInfo $memoryInfo)
  {
    $this->memoryInfo = $memoryInfo;
  }
  /**
   * @return MemoryInfo
   */
  public function getMemoryInfo()
  {
    return $this->memoryInfo;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param NetworkInfo
   */
  public function setNetworkInfo(NetworkInfo $networkInfo)
  {
    $this->networkInfo = $networkInfo;
  }
  /**
   * @return NetworkInfo
   */
  public function getNetworkInfo()
  {
    return $this->networkInfo;
  }
  /**
   * @param NonComplianceDetail[]
   */
  public function setNonComplianceDetails($nonComplianceDetails)
  {
    $this->nonComplianceDetails = $nonComplianceDetails;
  }
  /**
   * @return NonComplianceDetail[]
   */
  public function getNonComplianceDetails()
  {
    return $this->nonComplianceDetails;
  }
  public function setOwnership($ownership)
  {
    $this->ownership = $ownership;
  }
  public function getOwnership()
  {
    return $this->ownership;
  }
  public function setPolicyCompliant($policyCompliant)
  {
    $this->policyCompliant = $policyCompliant;
  }
  public function getPolicyCompliant()
  {
    return $this->policyCompliant;
  }
  public function setPolicyName($policyName)
  {
    $this->policyName = $policyName;
  }
  public function getPolicyName()
  {
    return $this->policyName;
  }
  /**
   * @param PowerManagementEvent[]
   */
  public function setPowerManagementEvents($powerManagementEvents)
  {
    $this->powerManagementEvents = $powerManagementEvents;
  }
  /**
   * @return PowerManagementEvent[]
   */
  public function getPowerManagementEvents()
  {
    return $this->powerManagementEvents;
  }
  public function setPreviousDeviceNames($previousDeviceNames)
  {
    $this->previousDeviceNames = $previousDeviceNames;
  }
  public function getPreviousDeviceNames()
  {
    return $this->previousDeviceNames;
  }
  /**
   * @param SecurityPosture
   */
  public function setSecurityPosture(SecurityPosture $securityPosture)
  {
    $this->securityPosture = $securityPosture;
  }
  /**
   * @return SecurityPosture
   */
  public function getSecurityPosture()
  {
    return $this->securityPosture;
  }
  /**
   * @param SoftwareInfo
   */
  public function setSoftwareInfo(SoftwareInfo $softwareInfo)
  {
    $this->softwareInfo = $softwareInfo;
  }
  /**
   * @return SoftwareInfo
   */
  public function getSoftwareInfo()
  {
    return $this->softwareInfo;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setSystemProperties($systemProperties)
  {
    $this->systemProperties = $systemProperties;
  }
  public function getSystemProperties()
  {
    return $this->systemProperties;
  }
  /**
   * @param User
   */
  public function setUser(User $user)
  {
    $this->user = $user;
  }
  /**
   * @return User
   */
  public function getUser()
  {
    return $this->user;
  }
  public function setUserName($userName)
  {
    $this->userName = $userName;
  }
  public function getUserName()
  {
    return $this->userName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Device::class, 'Google_Service_AndroidManagement_Device');

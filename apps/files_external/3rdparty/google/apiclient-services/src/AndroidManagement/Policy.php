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

class Policy extends \Google\Collection
{
  protected $collection_key = 'stayOnPluggedModes';
  /**
   * @var string[]
   */
  public $accountTypesWithManagementDisabled;
  /**
   * @var bool
   */
  public $addUserDisabled;
  /**
   * @var bool
   */
  public $adjustVolumeDisabled;
  protected $advancedSecurityOverridesType = AdvancedSecurityOverrides::class;
  protected $advancedSecurityOverridesDataType = '';
  protected $alwaysOnVpnPackageType = AlwaysOnVpnPackage::class;
  protected $alwaysOnVpnPackageDataType = '';
  /**
   * @var string[]
   */
  public $androidDevicePolicyTracks;
  /**
   * @var string
   */
  public $appAutoUpdatePolicy;
  protected $applicationsType = ApplicationPolicy::class;
  protected $applicationsDataType = 'array';
  /**
   * @var string
   */
  public $autoDateAndTimeZone;
  /**
   * @var bool
   */
  public $autoTimeRequired;
  /**
   * @var bool
   */
  public $blockApplicationsEnabled;
  /**
   * @var bool
   */
  public $bluetoothConfigDisabled;
  /**
   * @var bool
   */
  public $bluetoothContactSharingDisabled;
  /**
   * @var bool
   */
  public $bluetoothDisabled;
  /**
   * @var string
   */
  public $cameraAccess;
  /**
   * @var bool
   */
  public $cameraDisabled;
  /**
   * @var bool
   */
  public $cellBroadcastsConfigDisabled;
  protected $choosePrivateKeyRulesType = ChoosePrivateKeyRule::class;
  protected $choosePrivateKeyRulesDataType = 'array';
  protected $complianceRulesType = ComplianceRule::class;
  protected $complianceRulesDataType = 'array';
  /**
   * @var bool
   */
  public $createWindowsDisabled;
  /**
   * @var bool
   */
  public $credentialsConfigDisabled;
  protected $crossProfilePoliciesType = CrossProfilePolicies::class;
  protected $crossProfilePoliciesDataType = '';
  /**
   * @var bool
   */
  public $dataRoamingDisabled;
  /**
   * @var bool
   */
  public $debuggingFeaturesAllowed;
  /**
   * @var string
   */
  public $defaultPermissionPolicy;
  protected $deviceOwnerLockScreenInfoType = UserFacingMessage::class;
  protected $deviceOwnerLockScreenInfoDataType = '';
  /**
   * @var string
   */
  public $encryptionPolicy;
  /**
   * @var bool
   */
  public $ensureVerifyAppsEnabled;
  /**
   * @var bool
   */
  public $factoryResetDisabled;
  /**
   * @var string[]
   */
  public $frpAdminEmails;
  /**
   * @var bool
   */
  public $funDisabled;
  /**
   * @var bool
   */
  public $installAppsDisabled;
  /**
   * @var bool
   */
  public $installUnknownSourcesAllowed;
  /**
   * @var bool
   */
  public $keyguardDisabled;
  /**
   * @var string[]
   */
  public $keyguardDisabledFeatures;
  /**
   * @var bool
   */
  public $kioskCustomLauncherEnabled;
  protected $kioskCustomizationType = KioskCustomization::class;
  protected $kioskCustomizationDataType = '';
  /**
   * @var string
   */
  public $locationMode;
  protected $longSupportMessageType = UserFacingMessage::class;
  protected $longSupportMessageDataType = '';
  /**
   * @var string
   */
  public $maximumTimeToLock;
  /**
   * @var string
   */
  public $microphoneAccess;
  /**
   * @var int
   */
  public $minimumApiLevel;
  /**
   * @var bool
   */
  public $mobileNetworksConfigDisabled;
  /**
   * @var bool
   */
  public $modifyAccountsDisabled;
  /**
   * @var bool
   */
  public $mountPhysicalMediaDisabled;
  /**
   * @var string
   */
  public $name;
  /**
   * @var bool
   */
  public $networkEscapeHatchEnabled;
  /**
   * @var bool
   */
  public $networkResetDisabled;
  protected $oncCertificateProvidersType = OncCertificateProvider::class;
  protected $oncCertificateProvidersDataType = 'array';
  /**
   * @var array[]
   */
  public $openNetworkConfiguration;
  /**
   * @var bool
   */
  public $outgoingBeamDisabled;
  /**
   * @var bool
   */
  public $outgoingCallsDisabled;
  protected $passwordPoliciesType = PasswordRequirements::class;
  protected $passwordPoliciesDataType = 'array';
  protected $passwordRequirementsType = PasswordRequirements::class;
  protected $passwordRequirementsDataType = '';
  protected $permissionGrantsType = PermissionGrant::class;
  protected $permissionGrantsDataType = 'array';
  protected $permittedAccessibilityServicesType = PackageNameList::class;
  protected $permittedAccessibilityServicesDataType = '';
  protected $permittedInputMethodsType = PackageNameList::class;
  protected $permittedInputMethodsDataType = '';
  protected $persistentPreferredActivitiesType = PersistentPreferredActivity::class;
  protected $persistentPreferredActivitiesDataType = 'array';
  protected $personalUsagePoliciesType = PersonalUsagePolicies::class;
  protected $personalUsagePoliciesDataType = '';
  /**
   * @var string
   */
  public $playStoreMode;
  protected $policyEnforcementRulesType = PolicyEnforcementRule::class;
  protected $policyEnforcementRulesDataType = 'array';
  /**
   * @var string
   */
  public $preferentialNetworkService;
  /**
   * @var bool
   */
  public $privateKeySelectionEnabled;
  protected $recommendedGlobalProxyType = ProxyInfo::class;
  protected $recommendedGlobalProxyDataType = '';
  /**
   * @var bool
   */
  public $removeUserDisabled;
  /**
   * @var bool
   */
  public $safeBootDisabled;
  /**
   * @var bool
   */
  public $screenCaptureDisabled;
  /**
   * @var bool
   */
  public $setUserIconDisabled;
  /**
   * @var bool
   */
  public $setWallpaperDisabled;
  protected $setupActionsType = SetupAction::class;
  protected $setupActionsDataType = 'array';
  /**
   * @var bool
   */
  public $shareLocationDisabled;
  protected $shortSupportMessageType = UserFacingMessage::class;
  protected $shortSupportMessageDataType = '';
  /**
   * @var bool
   */
  public $skipFirstUseHintsEnabled;
  /**
   * @var bool
   */
  public $smsDisabled;
  /**
   * @var bool
   */
  public $statusBarDisabled;
  protected $statusReportingSettingsType = StatusReportingSettings::class;
  protected $statusReportingSettingsDataType = '';
  /**
   * @var string[]
   */
  public $stayOnPluggedModes;
  protected $systemUpdateType = SystemUpdate::class;
  protected $systemUpdateDataType = '';
  /**
   * @var bool
   */
  public $tetheringConfigDisabled;
  /**
   * @var bool
   */
  public $uninstallAppsDisabled;
  /**
   * @var bool
   */
  public $unmuteMicrophoneDisabled;
  /**
   * @var bool
   */
  public $usbFileTransferDisabled;
  /**
   * @var bool
   */
  public $usbMassStorageEnabled;
  /**
   * @var string
   */
  public $version;
  /**
   * @var bool
   */
  public $vpnConfigDisabled;
  /**
   * @var bool
   */
  public $wifiConfigDisabled;
  /**
   * @var bool
   */
  public $wifiConfigsLockdownEnabled;

  /**
   * @param string[]
   */
  public function setAccountTypesWithManagementDisabled($accountTypesWithManagementDisabled)
  {
    $this->accountTypesWithManagementDisabled = $accountTypesWithManagementDisabled;
  }
  /**
   * @return string[]
   */
  public function getAccountTypesWithManagementDisabled()
  {
    return $this->accountTypesWithManagementDisabled;
  }
  /**
   * @param bool
   */
  public function setAddUserDisabled($addUserDisabled)
  {
    $this->addUserDisabled = $addUserDisabled;
  }
  /**
   * @return bool
   */
  public function getAddUserDisabled()
  {
    return $this->addUserDisabled;
  }
  /**
   * @param bool
   */
  public function setAdjustVolumeDisabled($adjustVolumeDisabled)
  {
    $this->adjustVolumeDisabled = $adjustVolumeDisabled;
  }
  /**
   * @return bool
   */
  public function getAdjustVolumeDisabled()
  {
    return $this->adjustVolumeDisabled;
  }
  /**
   * @param AdvancedSecurityOverrides
   */
  public function setAdvancedSecurityOverrides(AdvancedSecurityOverrides $advancedSecurityOverrides)
  {
    $this->advancedSecurityOverrides = $advancedSecurityOverrides;
  }
  /**
   * @return AdvancedSecurityOverrides
   */
  public function getAdvancedSecurityOverrides()
  {
    return $this->advancedSecurityOverrides;
  }
  /**
   * @param AlwaysOnVpnPackage
   */
  public function setAlwaysOnVpnPackage(AlwaysOnVpnPackage $alwaysOnVpnPackage)
  {
    $this->alwaysOnVpnPackage = $alwaysOnVpnPackage;
  }
  /**
   * @return AlwaysOnVpnPackage
   */
  public function getAlwaysOnVpnPackage()
  {
    return $this->alwaysOnVpnPackage;
  }
  /**
   * @param string[]
   */
  public function setAndroidDevicePolicyTracks($androidDevicePolicyTracks)
  {
    $this->androidDevicePolicyTracks = $androidDevicePolicyTracks;
  }
  /**
   * @return string[]
   */
  public function getAndroidDevicePolicyTracks()
  {
    return $this->androidDevicePolicyTracks;
  }
  /**
   * @param string
   */
  public function setAppAutoUpdatePolicy($appAutoUpdatePolicy)
  {
    $this->appAutoUpdatePolicy = $appAutoUpdatePolicy;
  }
  /**
   * @return string
   */
  public function getAppAutoUpdatePolicy()
  {
    return $this->appAutoUpdatePolicy;
  }
  /**
   * @param ApplicationPolicy[]
   */
  public function setApplications($applications)
  {
    $this->applications = $applications;
  }
  /**
   * @return ApplicationPolicy[]
   */
  public function getApplications()
  {
    return $this->applications;
  }
  /**
   * @param string
   */
  public function setAutoDateAndTimeZone($autoDateAndTimeZone)
  {
    $this->autoDateAndTimeZone = $autoDateAndTimeZone;
  }
  /**
   * @return string
   */
  public function getAutoDateAndTimeZone()
  {
    return $this->autoDateAndTimeZone;
  }
  /**
   * @param bool
   */
  public function setAutoTimeRequired($autoTimeRequired)
  {
    $this->autoTimeRequired = $autoTimeRequired;
  }
  /**
   * @return bool
   */
  public function getAutoTimeRequired()
  {
    return $this->autoTimeRequired;
  }
  /**
   * @param bool
   */
  public function setBlockApplicationsEnabled($blockApplicationsEnabled)
  {
    $this->blockApplicationsEnabled = $blockApplicationsEnabled;
  }
  /**
   * @return bool
   */
  public function getBlockApplicationsEnabled()
  {
    return $this->blockApplicationsEnabled;
  }
  /**
   * @param bool
   */
  public function setBluetoothConfigDisabled($bluetoothConfigDisabled)
  {
    $this->bluetoothConfigDisabled = $bluetoothConfigDisabled;
  }
  /**
   * @return bool
   */
  public function getBluetoothConfigDisabled()
  {
    return $this->bluetoothConfigDisabled;
  }
  /**
   * @param bool
   */
  public function setBluetoothContactSharingDisabled($bluetoothContactSharingDisabled)
  {
    $this->bluetoothContactSharingDisabled = $bluetoothContactSharingDisabled;
  }
  /**
   * @return bool
   */
  public function getBluetoothContactSharingDisabled()
  {
    return $this->bluetoothContactSharingDisabled;
  }
  /**
   * @param bool
   */
  public function setBluetoothDisabled($bluetoothDisabled)
  {
    $this->bluetoothDisabled = $bluetoothDisabled;
  }
  /**
   * @return bool
   */
  public function getBluetoothDisabled()
  {
    return $this->bluetoothDisabled;
  }
  /**
   * @param string
   */
  public function setCameraAccess($cameraAccess)
  {
    $this->cameraAccess = $cameraAccess;
  }
  /**
   * @return string
   */
  public function getCameraAccess()
  {
    return $this->cameraAccess;
  }
  /**
   * @param bool
   */
  public function setCameraDisabled($cameraDisabled)
  {
    $this->cameraDisabled = $cameraDisabled;
  }
  /**
   * @return bool
   */
  public function getCameraDisabled()
  {
    return $this->cameraDisabled;
  }
  /**
   * @param bool
   */
  public function setCellBroadcastsConfigDisabled($cellBroadcastsConfigDisabled)
  {
    $this->cellBroadcastsConfigDisabled = $cellBroadcastsConfigDisabled;
  }
  /**
   * @return bool
   */
  public function getCellBroadcastsConfigDisabled()
  {
    return $this->cellBroadcastsConfigDisabled;
  }
  /**
   * @param ChoosePrivateKeyRule[]
   */
  public function setChoosePrivateKeyRules($choosePrivateKeyRules)
  {
    $this->choosePrivateKeyRules = $choosePrivateKeyRules;
  }
  /**
   * @return ChoosePrivateKeyRule[]
   */
  public function getChoosePrivateKeyRules()
  {
    return $this->choosePrivateKeyRules;
  }
  /**
   * @param ComplianceRule[]
   */
  public function setComplianceRules($complianceRules)
  {
    $this->complianceRules = $complianceRules;
  }
  /**
   * @return ComplianceRule[]
   */
  public function getComplianceRules()
  {
    return $this->complianceRules;
  }
  /**
   * @param bool
   */
  public function setCreateWindowsDisabled($createWindowsDisabled)
  {
    $this->createWindowsDisabled = $createWindowsDisabled;
  }
  /**
   * @return bool
   */
  public function getCreateWindowsDisabled()
  {
    return $this->createWindowsDisabled;
  }
  /**
   * @param bool
   */
  public function setCredentialsConfigDisabled($credentialsConfigDisabled)
  {
    $this->credentialsConfigDisabled = $credentialsConfigDisabled;
  }
  /**
   * @return bool
   */
  public function getCredentialsConfigDisabled()
  {
    return $this->credentialsConfigDisabled;
  }
  /**
   * @param CrossProfilePolicies
   */
  public function setCrossProfilePolicies(CrossProfilePolicies $crossProfilePolicies)
  {
    $this->crossProfilePolicies = $crossProfilePolicies;
  }
  /**
   * @return CrossProfilePolicies
   */
  public function getCrossProfilePolicies()
  {
    return $this->crossProfilePolicies;
  }
  /**
   * @param bool
   */
  public function setDataRoamingDisabled($dataRoamingDisabled)
  {
    $this->dataRoamingDisabled = $dataRoamingDisabled;
  }
  /**
   * @return bool
   */
  public function getDataRoamingDisabled()
  {
    return $this->dataRoamingDisabled;
  }
  /**
   * @param bool
   */
  public function setDebuggingFeaturesAllowed($debuggingFeaturesAllowed)
  {
    $this->debuggingFeaturesAllowed = $debuggingFeaturesAllowed;
  }
  /**
   * @return bool
   */
  public function getDebuggingFeaturesAllowed()
  {
    return $this->debuggingFeaturesAllowed;
  }
  /**
   * @param string
   */
  public function setDefaultPermissionPolicy($defaultPermissionPolicy)
  {
    $this->defaultPermissionPolicy = $defaultPermissionPolicy;
  }
  /**
   * @return string
   */
  public function getDefaultPermissionPolicy()
  {
    return $this->defaultPermissionPolicy;
  }
  /**
   * @param UserFacingMessage
   */
  public function setDeviceOwnerLockScreenInfo(UserFacingMessage $deviceOwnerLockScreenInfo)
  {
    $this->deviceOwnerLockScreenInfo = $deviceOwnerLockScreenInfo;
  }
  /**
   * @return UserFacingMessage
   */
  public function getDeviceOwnerLockScreenInfo()
  {
    return $this->deviceOwnerLockScreenInfo;
  }
  /**
   * @param string
   */
  public function setEncryptionPolicy($encryptionPolicy)
  {
    $this->encryptionPolicy = $encryptionPolicy;
  }
  /**
   * @return string
   */
  public function getEncryptionPolicy()
  {
    return $this->encryptionPolicy;
  }
  /**
   * @param bool
   */
  public function setEnsureVerifyAppsEnabled($ensureVerifyAppsEnabled)
  {
    $this->ensureVerifyAppsEnabled = $ensureVerifyAppsEnabled;
  }
  /**
   * @return bool
   */
  public function getEnsureVerifyAppsEnabled()
  {
    return $this->ensureVerifyAppsEnabled;
  }
  /**
   * @param bool
   */
  public function setFactoryResetDisabled($factoryResetDisabled)
  {
    $this->factoryResetDisabled = $factoryResetDisabled;
  }
  /**
   * @return bool
   */
  public function getFactoryResetDisabled()
  {
    return $this->factoryResetDisabled;
  }
  /**
   * @param string[]
   */
  public function setFrpAdminEmails($frpAdminEmails)
  {
    $this->frpAdminEmails = $frpAdminEmails;
  }
  /**
   * @return string[]
   */
  public function getFrpAdminEmails()
  {
    return $this->frpAdminEmails;
  }
  /**
   * @param bool
   */
  public function setFunDisabled($funDisabled)
  {
    $this->funDisabled = $funDisabled;
  }
  /**
   * @return bool
   */
  public function getFunDisabled()
  {
    return $this->funDisabled;
  }
  /**
   * @param bool
   */
  public function setInstallAppsDisabled($installAppsDisabled)
  {
    $this->installAppsDisabled = $installAppsDisabled;
  }
  /**
   * @return bool
   */
  public function getInstallAppsDisabled()
  {
    return $this->installAppsDisabled;
  }
  /**
   * @param bool
   */
  public function setInstallUnknownSourcesAllowed($installUnknownSourcesAllowed)
  {
    $this->installUnknownSourcesAllowed = $installUnknownSourcesAllowed;
  }
  /**
   * @return bool
   */
  public function getInstallUnknownSourcesAllowed()
  {
    return $this->installUnknownSourcesAllowed;
  }
  /**
   * @param bool
   */
  public function setKeyguardDisabled($keyguardDisabled)
  {
    $this->keyguardDisabled = $keyguardDisabled;
  }
  /**
   * @return bool
   */
  public function getKeyguardDisabled()
  {
    return $this->keyguardDisabled;
  }
  /**
   * @param string[]
   */
  public function setKeyguardDisabledFeatures($keyguardDisabledFeatures)
  {
    $this->keyguardDisabledFeatures = $keyguardDisabledFeatures;
  }
  /**
   * @return string[]
   */
  public function getKeyguardDisabledFeatures()
  {
    return $this->keyguardDisabledFeatures;
  }
  /**
   * @param bool
   */
  public function setKioskCustomLauncherEnabled($kioskCustomLauncherEnabled)
  {
    $this->kioskCustomLauncherEnabled = $kioskCustomLauncherEnabled;
  }
  /**
   * @return bool
   */
  public function getKioskCustomLauncherEnabled()
  {
    return $this->kioskCustomLauncherEnabled;
  }
  /**
   * @param KioskCustomization
   */
  public function setKioskCustomization(KioskCustomization $kioskCustomization)
  {
    $this->kioskCustomization = $kioskCustomization;
  }
  /**
   * @return KioskCustomization
   */
  public function getKioskCustomization()
  {
    return $this->kioskCustomization;
  }
  /**
   * @param string
   */
  public function setLocationMode($locationMode)
  {
    $this->locationMode = $locationMode;
  }
  /**
   * @return string
   */
  public function getLocationMode()
  {
    return $this->locationMode;
  }
  /**
   * @param UserFacingMessage
   */
  public function setLongSupportMessage(UserFacingMessage $longSupportMessage)
  {
    $this->longSupportMessage = $longSupportMessage;
  }
  /**
   * @return UserFacingMessage
   */
  public function getLongSupportMessage()
  {
    return $this->longSupportMessage;
  }
  /**
   * @param string
   */
  public function setMaximumTimeToLock($maximumTimeToLock)
  {
    $this->maximumTimeToLock = $maximumTimeToLock;
  }
  /**
   * @return string
   */
  public function getMaximumTimeToLock()
  {
    return $this->maximumTimeToLock;
  }
  /**
   * @param string
   */
  public function setMicrophoneAccess($microphoneAccess)
  {
    $this->microphoneAccess = $microphoneAccess;
  }
  /**
   * @return string
   */
  public function getMicrophoneAccess()
  {
    return $this->microphoneAccess;
  }
  /**
   * @param int
   */
  public function setMinimumApiLevel($minimumApiLevel)
  {
    $this->minimumApiLevel = $minimumApiLevel;
  }
  /**
   * @return int
   */
  public function getMinimumApiLevel()
  {
    return $this->minimumApiLevel;
  }
  /**
   * @param bool
   */
  public function setMobileNetworksConfigDisabled($mobileNetworksConfigDisabled)
  {
    $this->mobileNetworksConfigDisabled = $mobileNetworksConfigDisabled;
  }
  /**
   * @return bool
   */
  public function getMobileNetworksConfigDisabled()
  {
    return $this->mobileNetworksConfigDisabled;
  }
  /**
   * @param bool
   */
  public function setModifyAccountsDisabled($modifyAccountsDisabled)
  {
    $this->modifyAccountsDisabled = $modifyAccountsDisabled;
  }
  /**
   * @return bool
   */
  public function getModifyAccountsDisabled()
  {
    return $this->modifyAccountsDisabled;
  }
  /**
   * @param bool
   */
  public function setMountPhysicalMediaDisabled($mountPhysicalMediaDisabled)
  {
    $this->mountPhysicalMediaDisabled = $mountPhysicalMediaDisabled;
  }
  /**
   * @return bool
   */
  public function getMountPhysicalMediaDisabled()
  {
    return $this->mountPhysicalMediaDisabled;
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
   * @param bool
   */
  public function setNetworkEscapeHatchEnabled($networkEscapeHatchEnabled)
  {
    $this->networkEscapeHatchEnabled = $networkEscapeHatchEnabled;
  }
  /**
   * @return bool
   */
  public function getNetworkEscapeHatchEnabled()
  {
    return $this->networkEscapeHatchEnabled;
  }
  /**
   * @param bool
   */
  public function setNetworkResetDisabled($networkResetDisabled)
  {
    $this->networkResetDisabled = $networkResetDisabled;
  }
  /**
   * @return bool
   */
  public function getNetworkResetDisabled()
  {
    return $this->networkResetDisabled;
  }
  /**
   * @param OncCertificateProvider[]
   */
  public function setOncCertificateProviders($oncCertificateProviders)
  {
    $this->oncCertificateProviders = $oncCertificateProviders;
  }
  /**
   * @return OncCertificateProvider[]
   */
  public function getOncCertificateProviders()
  {
    return $this->oncCertificateProviders;
  }
  /**
   * @param array[]
   */
  public function setOpenNetworkConfiguration($openNetworkConfiguration)
  {
    $this->openNetworkConfiguration = $openNetworkConfiguration;
  }
  /**
   * @return array[]
   */
  public function getOpenNetworkConfiguration()
  {
    return $this->openNetworkConfiguration;
  }
  /**
   * @param bool
   */
  public function setOutgoingBeamDisabled($outgoingBeamDisabled)
  {
    $this->outgoingBeamDisabled = $outgoingBeamDisabled;
  }
  /**
   * @return bool
   */
  public function getOutgoingBeamDisabled()
  {
    return $this->outgoingBeamDisabled;
  }
  /**
   * @param bool
   */
  public function setOutgoingCallsDisabled($outgoingCallsDisabled)
  {
    $this->outgoingCallsDisabled = $outgoingCallsDisabled;
  }
  /**
   * @return bool
   */
  public function getOutgoingCallsDisabled()
  {
    return $this->outgoingCallsDisabled;
  }
  /**
   * @param PasswordRequirements[]
   */
  public function setPasswordPolicies($passwordPolicies)
  {
    $this->passwordPolicies = $passwordPolicies;
  }
  /**
   * @return PasswordRequirements[]
   */
  public function getPasswordPolicies()
  {
    return $this->passwordPolicies;
  }
  /**
   * @param PasswordRequirements
   */
  public function setPasswordRequirements(PasswordRequirements $passwordRequirements)
  {
    $this->passwordRequirements = $passwordRequirements;
  }
  /**
   * @return PasswordRequirements
   */
  public function getPasswordRequirements()
  {
    return $this->passwordRequirements;
  }
  /**
   * @param PermissionGrant[]
   */
  public function setPermissionGrants($permissionGrants)
  {
    $this->permissionGrants = $permissionGrants;
  }
  /**
   * @return PermissionGrant[]
   */
  public function getPermissionGrants()
  {
    return $this->permissionGrants;
  }
  /**
   * @param PackageNameList
   */
  public function setPermittedAccessibilityServices(PackageNameList $permittedAccessibilityServices)
  {
    $this->permittedAccessibilityServices = $permittedAccessibilityServices;
  }
  /**
   * @return PackageNameList
   */
  public function getPermittedAccessibilityServices()
  {
    return $this->permittedAccessibilityServices;
  }
  /**
   * @param PackageNameList
   */
  public function setPermittedInputMethods(PackageNameList $permittedInputMethods)
  {
    $this->permittedInputMethods = $permittedInputMethods;
  }
  /**
   * @return PackageNameList
   */
  public function getPermittedInputMethods()
  {
    return $this->permittedInputMethods;
  }
  /**
   * @param PersistentPreferredActivity[]
   */
  public function setPersistentPreferredActivities($persistentPreferredActivities)
  {
    $this->persistentPreferredActivities = $persistentPreferredActivities;
  }
  /**
   * @return PersistentPreferredActivity[]
   */
  public function getPersistentPreferredActivities()
  {
    return $this->persistentPreferredActivities;
  }
  /**
   * @param PersonalUsagePolicies
   */
  public function setPersonalUsagePolicies(PersonalUsagePolicies $personalUsagePolicies)
  {
    $this->personalUsagePolicies = $personalUsagePolicies;
  }
  /**
   * @return PersonalUsagePolicies
   */
  public function getPersonalUsagePolicies()
  {
    return $this->personalUsagePolicies;
  }
  /**
   * @param string
   */
  public function setPlayStoreMode($playStoreMode)
  {
    $this->playStoreMode = $playStoreMode;
  }
  /**
   * @return string
   */
  public function getPlayStoreMode()
  {
    return $this->playStoreMode;
  }
  /**
   * @param PolicyEnforcementRule[]
   */
  public function setPolicyEnforcementRules($policyEnforcementRules)
  {
    $this->policyEnforcementRules = $policyEnforcementRules;
  }
  /**
   * @return PolicyEnforcementRule[]
   */
  public function getPolicyEnforcementRules()
  {
    return $this->policyEnforcementRules;
  }
  /**
   * @param string
   */
  public function setPreferentialNetworkService($preferentialNetworkService)
  {
    $this->preferentialNetworkService = $preferentialNetworkService;
  }
  /**
   * @return string
   */
  public function getPreferentialNetworkService()
  {
    return $this->preferentialNetworkService;
  }
  /**
   * @param bool
   */
  public function setPrivateKeySelectionEnabled($privateKeySelectionEnabled)
  {
    $this->privateKeySelectionEnabled = $privateKeySelectionEnabled;
  }
  /**
   * @return bool
   */
  public function getPrivateKeySelectionEnabled()
  {
    return $this->privateKeySelectionEnabled;
  }
  /**
   * @param ProxyInfo
   */
  public function setRecommendedGlobalProxy(ProxyInfo $recommendedGlobalProxy)
  {
    $this->recommendedGlobalProxy = $recommendedGlobalProxy;
  }
  /**
   * @return ProxyInfo
   */
  public function getRecommendedGlobalProxy()
  {
    return $this->recommendedGlobalProxy;
  }
  /**
   * @param bool
   */
  public function setRemoveUserDisabled($removeUserDisabled)
  {
    $this->removeUserDisabled = $removeUserDisabled;
  }
  /**
   * @return bool
   */
  public function getRemoveUserDisabled()
  {
    return $this->removeUserDisabled;
  }
  /**
   * @param bool
   */
  public function setSafeBootDisabled($safeBootDisabled)
  {
    $this->safeBootDisabled = $safeBootDisabled;
  }
  /**
   * @return bool
   */
  public function getSafeBootDisabled()
  {
    return $this->safeBootDisabled;
  }
  /**
   * @param bool
   */
  public function setScreenCaptureDisabled($screenCaptureDisabled)
  {
    $this->screenCaptureDisabled = $screenCaptureDisabled;
  }
  /**
   * @return bool
   */
  public function getScreenCaptureDisabled()
  {
    return $this->screenCaptureDisabled;
  }
  /**
   * @param bool
   */
  public function setSetUserIconDisabled($setUserIconDisabled)
  {
    $this->setUserIconDisabled = $setUserIconDisabled;
  }
  /**
   * @return bool
   */
  public function getSetUserIconDisabled()
  {
    return $this->setUserIconDisabled;
  }
  /**
   * @param bool
   */
  public function setSetWallpaperDisabled($setWallpaperDisabled)
  {
    $this->setWallpaperDisabled = $setWallpaperDisabled;
  }
  /**
   * @return bool
   */
  public function getSetWallpaperDisabled()
  {
    return $this->setWallpaperDisabled;
  }
  /**
   * @param SetupAction[]
   */
  public function setSetupActions($setupActions)
  {
    $this->setupActions = $setupActions;
  }
  /**
   * @return SetupAction[]
   */
  public function getSetupActions()
  {
    return $this->setupActions;
  }
  /**
   * @param bool
   */
  public function setShareLocationDisabled($shareLocationDisabled)
  {
    $this->shareLocationDisabled = $shareLocationDisabled;
  }
  /**
   * @return bool
   */
  public function getShareLocationDisabled()
  {
    return $this->shareLocationDisabled;
  }
  /**
   * @param UserFacingMessage
   */
  public function setShortSupportMessage(UserFacingMessage $shortSupportMessage)
  {
    $this->shortSupportMessage = $shortSupportMessage;
  }
  /**
   * @return UserFacingMessage
   */
  public function getShortSupportMessage()
  {
    return $this->shortSupportMessage;
  }
  /**
   * @param bool
   */
  public function setSkipFirstUseHintsEnabled($skipFirstUseHintsEnabled)
  {
    $this->skipFirstUseHintsEnabled = $skipFirstUseHintsEnabled;
  }
  /**
   * @return bool
   */
  public function getSkipFirstUseHintsEnabled()
  {
    return $this->skipFirstUseHintsEnabled;
  }
  /**
   * @param bool
   */
  public function setSmsDisabled($smsDisabled)
  {
    $this->smsDisabled = $smsDisabled;
  }
  /**
   * @return bool
   */
  public function getSmsDisabled()
  {
    return $this->smsDisabled;
  }
  /**
   * @param bool
   */
  public function setStatusBarDisabled($statusBarDisabled)
  {
    $this->statusBarDisabled = $statusBarDisabled;
  }
  /**
   * @return bool
   */
  public function getStatusBarDisabled()
  {
    return $this->statusBarDisabled;
  }
  /**
   * @param StatusReportingSettings
   */
  public function setStatusReportingSettings(StatusReportingSettings $statusReportingSettings)
  {
    $this->statusReportingSettings = $statusReportingSettings;
  }
  /**
   * @return StatusReportingSettings
   */
  public function getStatusReportingSettings()
  {
    return $this->statusReportingSettings;
  }
  /**
   * @param string[]
   */
  public function setStayOnPluggedModes($stayOnPluggedModes)
  {
    $this->stayOnPluggedModes = $stayOnPluggedModes;
  }
  /**
   * @return string[]
   */
  public function getStayOnPluggedModes()
  {
    return $this->stayOnPluggedModes;
  }
  /**
   * @param SystemUpdate
   */
  public function setSystemUpdate(SystemUpdate $systemUpdate)
  {
    $this->systemUpdate = $systemUpdate;
  }
  /**
   * @return SystemUpdate
   */
  public function getSystemUpdate()
  {
    return $this->systemUpdate;
  }
  /**
   * @param bool
   */
  public function setTetheringConfigDisabled($tetheringConfigDisabled)
  {
    $this->tetheringConfigDisabled = $tetheringConfigDisabled;
  }
  /**
   * @return bool
   */
  public function getTetheringConfigDisabled()
  {
    return $this->tetheringConfigDisabled;
  }
  /**
   * @param bool
   */
  public function setUninstallAppsDisabled($uninstallAppsDisabled)
  {
    $this->uninstallAppsDisabled = $uninstallAppsDisabled;
  }
  /**
   * @return bool
   */
  public function getUninstallAppsDisabled()
  {
    return $this->uninstallAppsDisabled;
  }
  /**
   * @param bool
   */
  public function setUnmuteMicrophoneDisabled($unmuteMicrophoneDisabled)
  {
    $this->unmuteMicrophoneDisabled = $unmuteMicrophoneDisabled;
  }
  /**
   * @return bool
   */
  public function getUnmuteMicrophoneDisabled()
  {
    return $this->unmuteMicrophoneDisabled;
  }
  /**
   * @param bool
   */
  public function setUsbFileTransferDisabled($usbFileTransferDisabled)
  {
    $this->usbFileTransferDisabled = $usbFileTransferDisabled;
  }
  /**
   * @return bool
   */
  public function getUsbFileTransferDisabled()
  {
    return $this->usbFileTransferDisabled;
  }
  /**
   * @param bool
   */
  public function setUsbMassStorageEnabled($usbMassStorageEnabled)
  {
    $this->usbMassStorageEnabled = $usbMassStorageEnabled;
  }
  /**
   * @return bool
   */
  public function getUsbMassStorageEnabled()
  {
    return $this->usbMassStorageEnabled;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
  /**
   * @param bool
   */
  public function setVpnConfigDisabled($vpnConfigDisabled)
  {
    $this->vpnConfigDisabled = $vpnConfigDisabled;
  }
  /**
   * @return bool
   */
  public function getVpnConfigDisabled()
  {
    return $this->vpnConfigDisabled;
  }
  /**
   * @param bool
   */
  public function setWifiConfigDisabled($wifiConfigDisabled)
  {
    $this->wifiConfigDisabled = $wifiConfigDisabled;
  }
  /**
   * @return bool
   */
  public function getWifiConfigDisabled()
  {
    return $this->wifiConfigDisabled;
  }
  /**
   * @param bool
   */
  public function setWifiConfigsLockdownEnabled($wifiConfigsLockdownEnabled)
  {
    $this->wifiConfigsLockdownEnabled = $wifiConfigsLockdownEnabled;
  }
  /**
   * @return bool
   */
  public function getWifiConfigsLockdownEnabled()
  {
    return $this->wifiConfigsLockdownEnabled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Policy::class, 'Google_Service_AndroidManagement_Policy');

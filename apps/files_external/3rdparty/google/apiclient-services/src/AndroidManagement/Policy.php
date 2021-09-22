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
  public $accountTypesWithManagementDisabled;
  public $addUserDisabled;
  public $adjustVolumeDisabled;
  protected $advancedSecurityOverridesType = AdvancedSecurityOverrides::class;
  protected $advancedSecurityOverridesDataType = '';
  protected $alwaysOnVpnPackageType = AlwaysOnVpnPackage::class;
  protected $alwaysOnVpnPackageDataType = '';
  public $androidDevicePolicyTracks;
  public $appAutoUpdatePolicy;
  protected $applicationsType = ApplicationPolicy::class;
  protected $applicationsDataType = 'array';
  public $autoDateAndTimeZone;
  public $autoTimeRequired;
  public $blockApplicationsEnabled;
  public $bluetoothConfigDisabled;
  public $bluetoothContactSharingDisabled;
  public $bluetoothDisabled;
  public $cameraDisabled;
  public $cellBroadcastsConfigDisabled;
  protected $choosePrivateKeyRulesType = ChoosePrivateKeyRule::class;
  protected $choosePrivateKeyRulesDataType = 'array';
  protected $complianceRulesType = ComplianceRule::class;
  protected $complianceRulesDataType = 'array';
  public $createWindowsDisabled;
  public $credentialsConfigDisabled;
  protected $crossProfilePoliciesType = CrossProfilePolicies::class;
  protected $crossProfilePoliciesDataType = '';
  public $dataRoamingDisabled;
  public $debuggingFeaturesAllowed;
  public $defaultPermissionPolicy;
  protected $deviceOwnerLockScreenInfoType = UserFacingMessage::class;
  protected $deviceOwnerLockScreenInfoDataType = '';
  public $encryptionPolicy;
  public $ensureVerifyAppsEnabled;
  public $factoryResetDisabled;
  public $frpAdminEmails;
  public $funDisabled;
  public $installAppsDisabled;
  public $installUnknownSourcesAllowed;
  public $keyguardDisabled;
  public $keyguardDisabledFeatures;
  public $kioskCustomLauncherEnabled;
  protected $kioskCustomizationType = KioskCustomization::class;
  protected $kioskCustomizationDataType = '';
  public $locationMode;
  protected $longSupportMessageType = UserFacingMessage::class;
  protected $longSupportMessageDataType = '';
  public $maximumTimeToLock;
  public $minimumApiLevel;
  public $mobileNetworksConfigDisabled;
  public $modifyAccountsDisabled;
  public $mountPhysicalMediaDisabled;
  public $name;
  public $networkEscapeHatchEnabled;
  public $networkResetDisabled;
  protected $oncCertificateProvidersType = OncCertificateProvider::class;
  protected $oncCertificateProvidersDataType = 'array';
  public $openNetworkConfiguration;
  public $outgoingBeamDisabled;
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
  public $playStoreMode;
  protected $policyEnforcementRulesType = PolicyEnforcementRule::class;
  protected $policyEnforcementRulesDataType = 'array';
  public $privateKeySelectionEnabled;
  protected $recommendedGlobalProxyType = ProxyInfo::class;
  protected $recommendedGlobalProxyDataType = '';
  public $removeUserDisabled;
  public $safeBootDisabled;
  public $screenCaptureDisabled;
  public $setUserIconDisabled;
  public $setWallpaperDisabled;
  protected $setupActionsType = SetupAction::class;
  protected $setupActionsDataType = 'array';
  public $shareLocationDisabled;
  protected $shortSupportMessageType = UserFacingMessage::class;
  protected $shortSupportMessageDataType = '';
  public $skipFirstUseHintsEnabled;
  public $smsDisabled;
  public $statusBarDisabled;
  protected $statusReportingSettingsType = StatusReportingSettings::class;
  protected $statusReportingSettingsDataType = '';
  public $stayOnPluggedModes;
  protected $systemUpdateType = SystemUpdate::class;
  protected $systemUpdateDataType = '';
  public $tetheringConfigDisabled;
  public $uninstallAppsDisabled;
  public $unmuteMicrophoneDisabled;
  public $usbFileTransferDisabled;
  public $usbMassStorageEnabled;
  public $version;
  public $vpnConfigDisabled;
  public $wifiConfigDisabled;
  public $wifiConfigsLockdownEnabled;

  public function setAccountTypesWithManagementDisabled($accountTypesWithManagementDisabled)
  {
    $this->accountTypesWithManagementDisabled = $accountTypesWithManagementDisabled;
  }
  public function getAccountTypesWithManagementDisabled()
  {
    return $this->accountTypesWithManagementDisabled;
  }
  public function setAddUserDisabled($addUserDisabled)
  {
    $this->addUserDisabled = $addUserDisabled;
  }
  public function getAddUserDisabled()
  {
    return $this->addUserDisabled;
  }
  public function setAdjustVolumeDisabled($adjustVolumeDisabled)
  {
    $this->adjustVolumeDisabled = $adjustVolumeDisabled;
  }
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
  public function setAndroidDevicePolicyTracks($androidDevicePolicyTracks)
  {
    $this->androidDevicePolicyTracks = $androidDevicePolicyTracks;
  }
  public function getAndroidDevicePolicyTracks()
  {
    return $this->androidDevicePolicyTracks;
  }
  public function setAppAutoUpdatePolicy($appAutoUpdatePolicy)
  {
    $this->appAutoUpdatePolicy = $appAutoUpdatePolicy;
  }
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
  public function setAutoDateAndTimeZone($autoDateAndTimeZone)
  {
    $this->autoDateAndTimeZone = $autoDateAndTimeZone;
  }
  public function getAutoDateAndTimeZone()
  {
    return $this->autoDateAndTimeZone;
  }
  public function setAutoTimeRequired($autoTimeRequired)
  {
    $this->autoTimeRequired = $autoTimeRequired;
  }
  public function getAutoTimeRequired()
  {
    return $this->autoTimeRequired;
  }
  public function setBlockApplicationsEnabled($blockApplicationsEnabled)
  {
    $this->blockApplicationsEnabled = $blockApplicationsEnabled;
  }
  public function getBlockApplicationsEnabled()
  {
    return $this->blockApplicationsEnabled;
  }
  public function setBluetoothConfigDisabled($bluetoothConfigDisabled)
  {
    $this->bluetoothConfigDisabled = $bluetoothConfigDisabled;
  }
  public function getBluetoothConfigDisabled()
  {
    return $this->bluetoothConfigDisabled;
  }
  public function setBluetoothContactSharingDisabled($bluetoothContactSharingDisabled)
  {
    $this->bluetoothContactSharingDisabled = $bluetoothContactSharingDisabled;
  }
  public function getBluetoothContactSharingDisabled()
  {
    return $this->bluetoothContactSharingDisabled;
  }
  public function setBluetoothDisabled($bluetoothDisabled)
  {
    $this->bluetoothDisabled = $bluetoothDisabled;
  }
  public function getBluetoothDisabled()
  {
    return $this->bluetoothDisabled;
  }
  public function setCameraDisabled($cameraDisabled)
  {
    $this->cameraDisabled = $cameraDisabled;
  }
  public function getCameraDisabled()
  {
    return $this->cameraDisabled;
  }
  public function setCellBroadcastsConfigDisabled($cellBroadcastsConfigDisabled)
  {
    $this->cellBroadcastsConfigDisabled = $cellBroadcastsConfigDisabled;
  }
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
  public function setCreateWindowsDisabled($createWindowsDisabled)
  {
    $this->createWindowsDisabled = $createWindowsDisabled;
  }
  public function getCreateWindowsDisabled()
  {
    return $this->createWindowsDisabled;
  }
  public function setCredentialsConfigDisabled($credentialsConfigDisabled)
  {
    $this->credentialsConfigDisabled = $credentialsConfigDisabled;
  }
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
  public function setDataRoamingDisabled($dataRoamingDisabled)
  {
    $this->dataRoamingDisabled = $dataRoamingDisabled;
  }
  public function getDataRoamingDisabled()
  {
    return $this->dataRoamingDisabled;
  }
  public function setDebuggingFeaturesAllowed($debuggingFeaturesAllowed)
  {
    $this->debuggingFeaturesAllowed = $debuggingFeaturesAllowed;
  }
  public function getDebuggingFeaturesAllowed()
  {
    return $this->debuggingFeaturesAllowed;
  }
  public function setDefaultPermissionPolicy($defaultPermissionPolicy)
  {
    $this->defaultPermissionPolicy = $defaultPermissionPolicy;
  }
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
  public function setEncryptionPolicy($encryptionPolicy)
  {
    $this->encryptionPolicy = $encryptionPolicy;
  }
  public function getEncryptionPolicy()
  {
    return $this->encryptionPolicy;
  }
  public function setEnsureVerifyAppsEnabled($ensureVerifyAppsEnabled)
  {
    $this->ensureVerifyAppsEnabled = $ensureVerifyAppsEnabled;
  }
  public function getEnsureVerifyAppsEnabled()
  {
    return $this->ensureVerifyAppsEnabled;
  }
  public function setFactoryResetDisabled($factoryResetDisabled)
  {
    $this->factoryResetDisabled = $factoryResetDisabled;
  }
  public function getFactoryResetDisabled()
  {
    return $this->factoryResetDisabled;
  }
  public function setFrpAdminEmails($frpAdminEmails)
  {
    $this->frpAdminEmails = $frpAdminEmails;
  }
  public function getFrpAdminEmails()
  {
    return $this->frpAdminEmails;
  }
  public function setFunDisabled($funDisabled)
  {
    $this->funDisabled = $funDisabled;
  }
  public function getFunDisabled()
  {
    return $this->funDisabled;
  }
  public function setInstallAppsDisabled($installAppsDisabled)
  {
    $this->installAppsDisabled = $installAppsDisabled;
  }
  public function getInstallAppsDisabled()
  {
    return $this->installAppsDisabled;
  }
  public function setInstallUnknownSourcesAllowed($installUnknownSourcesAllowed)
  {
    $this->installUnknownSourcesAllowed = $installUnknownSourcesAllowed;
  }
  public function getInstallUnknownSourcesAllowed()
  {
    return $this->installUnknownSourcesAllowed;
  }
  public function setKeyguardDisabled($keyguardDisabled)
  {
    $this->keyguardDisabled = $keyguardDisabled;
  }
  public function getKeyguardDisabled()
  {
    return $this->keyguardDisabled;
  }
  public function setKeyguardDisabledFeatures($keyguardDisabledFeatures)
  {
    $this->keyguardDisabledFeatures = $keyguardDisabledFeatures;
  }
  public function getKeyguardDisabledFeatures()
  {
    return $this->keyguardDisabledFeatures;
  }
  public function setKioskCustomLauncherEnabled($kioskCustomLauncherEnabled)
  {
    $this->kioskCustomLauncherEnabled = $kioskCustomLauncherEnabled;
  }
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
  public function setLocationMode($locationMode)
  {
    $this->locationMode = $locationMode;
  }
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
  public function setMaximumTimeToLock($maximumTimeToLock)
  {
    $this->maximumTimeToLock = $maximumTimeToLock;
  }
  public function getMaximumTimeToLock()
  {
    return $this->maximumTimeToLock;
  }
  public function setMinimumApiLevel($minimumApiLevel)
  {
    $this->minimumApiLevel = $minimumApiLevel;
  }
  public function getMinimumApiLevel()
  {
    return $this->minimumApiLevel;
  }
  public function setMobileNetworksConfigDisabled($mobileNetworksConfigDisabled)
  {
    $this->mobileNetworksConfigDisabled = $mobileNetworksConfigDisabled;
  }
  public function getMobileNetworksConfigDisabled()
  {
    return $this->mobileNetworksConfigDisabled;
  }
  public function setModifyAccountsDisabled($modifyAccountsDisabled)
  {
    $this->modifyAccountsDisabled = $modifyAccountsDisabled;
  }
  public function getModifyAccountsDisabled()
  {
    return $this->modifyAccountsDisabled;
  }
  public function setMountPhysicalMediaDisabled($mountPhysicalMediaDisabled)
  {
    $this->mountPhysicalMediaDisabled = $mountPhysicalMediaDisabled;
  }
  public function getMountPhysicalMediaDisabled()
  {
    return $this->mountPhysicalMediaDisabled;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNetworkEscapeHatchEnabled($networkEscapeHatchEnabled)
  {
    $this->networkEscapeHatchEnabled = $networkEscapeHatchEnabled;
  }
  public function getNetworkEscapeHatchEnabled()
  {
    return $this->networkEscapeHatchEnabled;
  }
  public function setNetworkResetDisabled($networkResetDisabled)
  {
    $this->networkResetDisabled = $networkResetDisabled;
  }
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
  public function setOpenNetworkConfiguration($openNetworkConfiguration)
  {
    $this->openNetworkConfiguration = $openNetworkConfiguration;
  }
  public function getOpenNetworkConfiguration()
  {
    return $this->openNetworkConfiguration;
  }
  public function setOutgoingBeamDisabled($outgoingBeamDisabled)
  {
    $this->outgoingBeamDisabled = $outgoingBeamDisabled;
  }
  public function getOutgoingBeamDisabled()
  {
    return $this->outgoingBeamDisabled;
  }
  public function setOutgoingCallsDisabled($outgoingCallsDisabled)
  {
    $this->outgoingCallsDisabled = $outgoingCallsDisabled;
  }
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
  public function setPlayStoreMode($playStoreMode)
  {
    $this->playStoreMode = $playStoreMode;
  }
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
  public function setPrivateKeySelectionEnabled($privateKeySelectionEnabled)
  {
    $this->privateKeySelectionEnabled = $privateKeySelectionEnabled;
  }
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
  public function setRemoveUserDisabled($removeUserDisabled)
  {
    $this->removeUserDisabled = $removeUserDisabled;
  }
  public function getRemoveUserDisabled()
  {
    return $this->removeUserDisabled;
  }
  public function setSafeBootDisabled($safeBootDisabled)
  {
    $this->safeBootDisabled = $safeBootDisabled;
  }
  public function getSafeBootDisabled()
  {
    return $this->safeBootDisabled;
  }
  public function setScreenCaptureDisabled($screenCaptureDisabled)
  {
    $this->screenCaptureDisabled = $screenCaptureDisabled;
  }
  public function getScreenCaptureDisabled()
  {
    return $this->screenCaptureDisabled;
  }
  public function setSetUserIconDisabled($setUserIconDisabled)
  {
    $this->setUserIconDisabled = $setUserIconDisabled;
  }
  public function getSetUserIconDisabled()
  {
    return $this->setUserIconDisabled;
  }
  public function setSetWallpaperDisabled($setWallpaperDisabled)
  {
    $this->setWallpaperDisabled = $setWallpaperDisabled;
  }
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
  public function setShareLocationDisabled($shareLocationDisabled)
  {
    $this->shareLocationDisabled = $shareLocationDisabled;
  }
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
  public function setSkipFirstUseHintsEnabled($skipFirstUseHintsEnabled)
  {
    $this->skipFirstUseHintsEnabled = $skipFirstUseHintsEnabled;
  }
  public function getSkipFirstUseHintsEnabled()
  {
    return $this->skipFirstUseHintsEnabled;
  }
  public function setSmsDisabled($smsDisabled)
  {
    $this->smsDisabled = $smsDisabled;
  }
  public function getSmsDisabled()
  {
    return $this->smsDisabled;
  }
  public function setStatusBarDisabled($statusBarDisabled)
  {
    $this->statusBarDisabled = $statusBarDisabled;
  }
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
  public function setStayOnPluggedModes($stayOnPluggedModes)
  {
    $this->stayOnPluggedModes = $stayOnPluggedModes;
  }
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
  public function setTetheringConfigDisabled($tetheringConfigDisabled)
  {
    $this->tetheringConfigDisabled = $tetheringConfigDisabled;
  }
  public function getTetheringConfigDisabled()
  {
    return $this->tetheringConfigDisabled;
  }
  public function setUninstallAppsDisabled($uninstallAppsDisabled)
  {
    $this->uninstallAppsDisabled = $uninstallAppsDisabled;
  }
  public function getUninstallAppsDisabled()
  {
    return $this->uninstallAppsDisabled;
  }
  public function setUnmuteMicrophoneDisabled($unmuteMicrophoneDisabled)
  {
    $this->unmuteMicrophoneDisabled = $unmuteMicrophoneDisabled;
  }
  public function getUnmuteMicrophoneDisabled()
  {
    return $this->unmuteMicrophoneDisabled;
  }
  public function setUsbFileTransferDisabled($usbFileTransferDisabled)
  {
    $this->usbFileTransferDisabled = $usbFileTransferDisabled;
  }
  public function getUsbFileTransferDisabled()
  {
    return $this->usbFileTransferDisabled;
  }
  public function setUsbMassStorageEnabled($usbMassStorageEnabled)
  {
    $this->usbMassStorageEnabled = $usbMassStorageEnabled;
  }
  public function getUsbMassStorageEnabled()
  {
    return $this->usbMassStorageEnabled;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
  public function setVpnConfigDisabled($vpnConfigDisabled)
  {
    $this->vpnConfigDisabled = $vpnConfigDisabled;
  }
  public function getVpnConfigDisabled()
  {
    return $this->vpnConfigDisabled;
  }
  public function setWifiConfigDisabled($wifiConfigDisabled)
  {
    $this->wifiConfigDisabled = $wifiConfigDisabled;
  }
  public function getWifiConfigDisabled()
  {
    return $this->wifiConfigDisabled;
  }
  public function setWifiConfigsLockdownEnabled($wifiConfigsLockdownEnabled)
  {
    $this->wifiConfigsLockdownEnabled = $wifiConfigsLockdownEnabled;
  }
  public function getWifiConfigsLockdownEnabled()
  {
    return $this->wifiConfigsLockdownEnabled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Policy::class, 'Google_Service_AndroidManagement_Policy');

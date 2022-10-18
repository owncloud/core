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

class AssistantApiSettingsDeviceSettings extends \Google\Collection
{
  protected $collection_key = 'linkedUsers';
  /**
   * @var string
   */
  public $ackStatus;
  /**
   * @var string
   */
  public $address;
  /**
   * @var string[]
   */
  public $aliasName;
  /**
   * @var bool
   */
  public $allowIncomingCalls;
  protected $ambientSettingsType = AssistantApiSettingsAmbientSettings::class;
  protected $ambientSettingsDataType = '';
  protected $ancillaryDeviceIdType = AssistantApiSettingsInternalAncillaryDeviceId::class;
  protected $ancillaryDeviceIdDataType = '';
  protected $autoFramingSettingsType = AssistantApiSettingsAutoFramingSettings::class;
  protected $autoFramingSettingsDataType = '';
  /**
   * @var bool
   */
  public $blueSteelEnabled;
  protected $capabilitiesType = AssistantApiDeviceCapabilities::class;
  protected $capabilitiesDataType = '';
  /**
   * @var string
   */
  public $city;
  /**
   * @var string
   */
  public $colocationStatus;
  /**
   * @var string
   */
  public $creationTimestampMs;
  protected $crossSurfaceAvailabilityType = AssistantApiSettingsDeviceSettingsCrossSurfaceAvailability::class;
  protected $crossSurfaceAvailabilityDataType = '';
  protected $defaultAudioDeviceIdType = AssistantApiCoreTypesDeviceId::class;
  protected $defaultAudioDeviceIdDataType = '';
  protected $defaultVideoDeviceIdType = AssistantApiCoreTypesDeviceId::class;
  protected $defaultVideoDeviceIdDataType = '';
  /**
   * @var string
   */
  public $deviceBrand;
  protected $deviceIdType = AssistantApiCoreTypesDeviceId::class;
  protected $deviceIdDataType = '';
  /**
   * @var string
   */
  public $deviceModelId;
  /**
   * @var int
   */
  public $deviceModelRevision;
  /**
   * @var string
   */
  public $dusi;
  /**
   * @var string[]
   */
  public $faceEnrollmentErrors;
  /**
   * @var string
   */
  public $faceEnrollmentStatus;
  /**
   * @var bool
   */
  public $faceMatchEnabled;
  /**
   * @var bool
   */
  public $flAudioCacheEnabled;
  /**
   * @var bool
   */
  public $flVisualFramesCacheEnabled;
  protected $gcmSettingsType = AssistantApiSettingsGcmSettings::class;
  protected $gcmSettingsDataType = '';
  protected $homeGraphDataType = AssistantApiSettingsHomeGraphData::class;
  protected $homeGraphDataDataType = '';
  /**
   * @var string
   */
  public $homeGraphId;
  protected $hospitalityModeStatusType = AssistantApiSettingsHospitalityMode::class;
  protected $hospitalityModeStatusDataType = '';
  /**
   * @var string
   */
  public $hotwordSensitivity;
  protected $hotwordThresholdAdjustmentFactorType = AssistantApiSettingsHotwordThresholdAdjustmentFactor::class;
  protected $hotwordThresholdAdjustmentFactorDataType = '';
  /**
   * @var string
   */
  public $humanFriendlyName;
  protected $internalVersionType = AssistantApiSettingsInternalVersion::class;
  protected $internalVersionDataType = '';
  /**
   * @var bool
   */
  public $isCloudSyncDevice;
  /**
   * @var bool
   */
  public $isDeviceActivationCacheEnabled;
  protected $kidsModeType = AssistantApiSettingsKidsMode::class;
  protected $kidsModeDataType = '';
  /**
   * @var string
   */
  public $lastCastRegistrationTimestamp;
  /**
   * @var string
   */
  public $lastUsedCoarseTimestamp;
  protected $linkedDeviceIdType = AssistantApiCoreTypesDeviceId::class;
  protected $linkedDeviceIdDataType = 'array';
  protected $linkedUsersType = AssistantApiSettingsLinkedUser::class;
  protected $linkedUsersDataType = 'array';
  /**
   * @var string
   */
  public $locale;
  protected $locationCoordinatesType = AssistantApiCoreTypesLocationCoordinates::class;
  protected $locationCoordinatesDataType = '';
  protected $locationFeatureType = GeostoreFeatureProto::class;
  protected $locationFeatureDataType = '';
  protected $marketplaceDisclosureType = AssistantApiSettingsMarketplaceDisclosure::class;
  protected $marketplaceDisclosureDataType = '';
  protected $masqueradeModeType = AssistantApiSettingsMasqueradeMode::class;
  protected $masqueradeModeDataType = '';
  protected $notificationProfileType = AssistantApiSettingsNotificationProfile::class;
  protected $notificationProfileDataType = '';
  /**
   * @var string
   */
  public $oauthClientId;
  protected $onDeviceAppSettingsType = AssistantApiSettingsOnDeviceAppSettings::class;
  protected $onDeviceAppSettingsDataType = '';
  protected $optInStatusType = AssistantApiSettingsDeviceLogsOptIn::class;
  protected $optInStatusDataType = '';
  /**
   * @var bool
   */
  public $paymentsEnabled;
  protected $personalizationMetadataType = AssistantApiSettingsPersonalizationMetadata::class;
  protected $personalizationMetadataDataType = '';
  protected $politeModeType = AssistantApiSettingsPoliteMode::class;
  protected $politeModeDataType = '';
  /**
   * @var string
   */
  public $postalCode;
  protected $reauthTrustedDeviceSettingsType = AssistantApiSettingsReauthTrustedDeviceSettings::class;
  protected $reauthTrustedDeviceSettingsDataType = '';
  /**
   * @var string
   */
  public $shortenedAddress;
  /**
   * @var bool
   */
  public $speakerIdEnabled;
  protected $speechOutputSettingsType = AssistantApiSettingsSpeechOutputSettings::class;
  protected $speechOutputSettingsDataType = '';
  protected $speechSettingsType = AssistantApiSettingsSpeechSettings::class;
  protected $speechSettingsDataType = '';
  protected $supervisionSettingsType = AssistantApiSettingsDeviceSupervisionSettings::class;
  protected $supervisionSettingsDataType = '';
  protected $surfaceTypeType = AssistantApiCoreTypesSurfaceType::class;
  protected $surfaceTypeDataType = '';
  protected $tetheredInfoType = AssistantApiSettingsTetheredInfo::class;
  protected $tetheredInfoDataType = '';
  protected $timeZoneType = AssistantApiTimeZone::class;
  protected $timeZoneDataType = '';
  /**
   * @var string
   */
  public $truncatedLocalNetworkId;
  /**
   * @var bool
   */
  public $trustedVoiceEnabled;
  /**
   * @var string
   */
  public $type;
  /**
   * @var bool
   */
  public $verboseTtsForChromecastEnabled;
  /**
   * @var string
   */
  public $vmLastUsedCoarseTimestamp;
  /**
   * @var string
   */
  public $voiceEnrollmentStatus;
  /**
   * @var bool
   */
  public $voiceInputEnabled;

  /**
   * @param string
   */
  public function setAckStatus($ackStatus)
  {
    $this->ackStatus = $ackStatus;
  }
  /**
   * @return string
   */
  public function getAckStatus()
  {
    return $this->ackStatus;
  }
  /**
   * @param string
   */
  public function setAddress($address)
  {
    $this->address = $address;
  }
  /**
   * @return string
   */
  public function getAddress()
  {
    return $this->address;
  }
  /**
   * @param string[]
   */
  public function setAliasName($aliasName)
  {
    $this->aliasName = $aliasName;
  }
  /**
   * @return string[]
   */
  public function getAliasName()
  {
    return $this->aliasName;
  }
  /**
   * @param bool
   */
  public function setAllowIncomingCalls($allowIncomingCalls)
  {
    $this->allowIncomingCalls = $allowIncomingCalls;
  }
  /**
   * @return bool
   */
  public function getAllowIncomingCalls()
  {
    return $this->allowIncomingCalls;
  }
  /**
   * @param AssistantApiSettingsAmbientSettings
   */
  public function setAmbientSettings(AssistantApiSettingsAmbientSettings $ambientSettings)
  {
    $this->ambientSettings = $ambientSettings;
  }
  /**
   * @return AssistantApiSettingsAmbientSettings
   */
  public function getAmbientSettings()
  {
    return $this->ambientSettings;
  }
  /**
   * @param AssistantApiSettingsInternalAncillaryDeviceId
   */
  public function setAncillaryDeviceId(AssistantApiSettingsInternalAncillaryDeviceId $ancillaryDeviceId)
  {
    $this->ancillaryDeviceId = $ancillaryDeviceId;
  }
  /**
   * @return AssistantApiSettingsInternalAncillaryDeviceId
   */
  public function getAncillaryDeviceId()
  {
    return $this->ancillaryDeviceId;
  }
  /**
   * @param AssistantApiSettingsAutoFramingSettings
   */
  public function setAutoFramingSettings(AssistantApiSettingsAutoFramingSettings $autoFramingSettings)
  {
    $this->autoFramingSettings = $autoFramingSettings;
  }
  /**
   * @return AssistantApiSettingsAutoFramingSettings
   */
  public function getAutoFramingSettings()
  {
    return $this->autoFramingSettings;
  }
  /**
   * @param bool
   */
  public function setBlueSteelEnabled($blueSteelEnabled)
  {
    $this->blueSteelEnabled = $blueSteelEnabled;
  }
  /**
   * @return bool
   */
  public function getBlueSteelEnabled()
  {
    return $this->blueSteelEnabled;
  }
  /**
   * @param AssistantApiDeviceCapabilities
   */
  public function setCapabilities(AssistantApiDeviceCapabilities $capabilities)
  {
    $this->capabilities = $capabilities;
  }
  /**
   * @return AssistantApiDeviceCapabilities
   */
  public function getCapabilities()
  {
    return $this->capabilities;
  }
  /**
   * @param string
   */
  public function setCity($city)
  {
    $this->city = $city;
  }
  /**
   * @return string
   */
  public function getCity()
  {
    return $this->city;
  }
  /**
   * @param string
   */
  public function setColocationStatus($colocationStatus)
  {
    $this->colocationStatus = $colocationStatus;
  }
  /**
   * @return string
   */
  public function getColocationStatus()
  {
    return $this->colocationStatus;
  }
  /**
   * @param string
   */
  public function setCreationTimestampMs($creationTimestampMs)
  {
    $this->creationTimestampMs = $creationTimestampMs;
  }
  /**
   * @return string
   */
  public function getCreationTimestampMs()
  {
    return $this->creationTimestampMs;
  }
  /**
   * @param AssistantApiSettingsDeviceSettingsCrossSurfaceAvailability
   */
  public function setCrossSurfaceAvailability(AssistantApiSettingsDeviceSettingsCrossSurfaceAvailability $crossSurfaceAvailability)
  {
    $this->crossSurfaceAvailability = $crossSurfaceAvailability;
  }
  /**
   * @return AssistantApiSettingsDeviceSettingsCrossSurfaceAvailability
   */
  public function getCrossSurfaceAvailability()
  {
    return $this->crossSurfaceAvailability;
  }
  /**
   * @param AssistantApiCoreTypesDeviceId
   */
  public function setDefaultAudioDeviceId(AssistantApiCoreTypesDeviceId $defaultAudioDeviceId)
  {
    $this->defaultAudioDeviceId = $defaultAudioDeviceId;
  }
  /**
   * @return AssistantApiCoreTypesDeviceId
   */
  public function getDefaultAudioDeviceId()
  {
    return $this->defaultAudioDeviceId;
  }
  /**
   * @param AssistantApiCoreTypesDeviceId
   */
  public function setDefaultVideoDeviceId(AssistantApiCoreTypesDeviceId $defaultVideoDeviceId)
  {
    $this->defaultVideoDeviceId = $defaultVideoDeviceId;
  }
  /**
   * @return AssistantApiCoreTypesDeviceId
   */
  public function getDefaultVideoDeviceId()
  {
    return $this->defaultVideoDeviceId;
  }
  /**
   * @param string
   */
  public function setDeviceBrand($deviceBrand)
  {
    $this->deviceBrand = $deviceBrand;
  }
  /**
   * @return string
   */
  public function getDeviceBrand()
  {
    return $this->deviceBrand;
  }
  /**
   * @param AssistantApiCoreTypesDeviceId
   */
  public function setDeviceId(AssistantApiCoreTypesDeviceId $deviceId)
  {
    $this->deviceId = $deviceId;
  }
  /**
   * @return AssistantApiCoreTypesDeviceId
   */
  public function getDeviceId()
  {
    return $this->deviceId;
  }
  /**
   * @param string
   */
  public function setDeviceModelId($deviceModelId)
  {
    $this->deviceModelId = $deviceModelId;
  }
  /**
   * @return string
   */
  public function getDeviceModelId()
  {
    return $this->deviceModelId;
  }
  /**
   * @param int
   */
  public function setDeviceModelRevision($deviceModelRevision)
  {
    $this->deviceModelRevision = $deviceModelRevision;
  }
  /**
   * @return int
   */
  public function getDeviceModelRevision()
  {
    return $this->deviceModelRevision;
  }
  /**
   * @param string
   */
  public function setDusi($dusi)
  {
    $this->dusi = $dusi;
  }
  /**
   * @return string
   */
  public function getDusi()
  {
    return $this->dusi;
  }
  /**
   * @param string[]
   */
  public function setFaceEnrollmentErrors($faceEnrollmentErrors)
  {
    $this->faceEnrollmentErrors = $faceEnrollmentErrors;
  }
  /**
   * @return string[]
   */
  public function getFaceEnrollmentErrors()
  {
    return $this->faceEnrollmentErrors;
  }
  /**
   * @param string
   */
  public function setFaceEnrollmentStatus($faceEnrollmentStatus)
  {
    $this->faceEnrollmentStatus = $faceEnrollmentStatus;
  }
  /**
   * @return string
   */
  public function getFaceEnrollmentStatus()
  {
    return $this->faceEnrollmentStatus;
  }
  /**
   * @param bool
   */
  public function setFaceMatchEnabled($faceMatchEnabled)
  {
    $this->faceMatchEnabled = $faceMatchEnabled;
  }
  /**
   * @return bool
   */
  public function getFaceMatchEnabled()
  {
    return $this->faceMatchEnabled;
  }
  /**
   * @param bool
   */
  public function setFlAudioCacheEnabled($flAudioCacheEnabled)
  {
    $this->flAudioCacheEnabled = $flAudioCacheEnabled;
  }
  /**
   * @return bool
   */
  public function getFlAudioCacheEnabled()
  {
    return $this->flAudioCacheEnabled;
  }
  /**
   * @param bool
   */
  public function setFlVisualFramesCacheEnabled($flVisualFramesCacheEnabled)
  {
    $this->flVisualFramesCacheEnabled = $flVisualFramesCacheEnabled;
  }
  /**
   * @return bool
   */
  public function getFlVisualFramesCacheEnabled()
  {
    return $this->flVisualFramesCacheEnabled;
  }
  /**
   * @param AssistantApiSettingsGcmSettings
   */
  public function setGcmSettings(AssistantApiSettingsGcmSettings $gcmSettings)
  {
    $this->gcmSettings = $gcmSettings;
  }
  /**
   * @return AssistantApiSettingsGcmSettings
   */
  public function getGcmSettings()
  {
    return $this->gcmSettings;
  }
  /**
   * @param AssistantApiSettingsHomeGraphData
   */
  public function setHomeGraphData(AssistantApiSettingsHomeGraphData $homeGraphData)
  {
    $this->homeGraphData = $homeGraphData;
  }
  /**
   * @return AssistantApiSettingsHomeGraphData
   */
  public function getHomeGraphData()
  {
    return $this->homeGraphData;
  }
  /**
   * @param string
   */
  public function setHomeGraphId($homeGraphId)
  {
    $this->homeGraphId = $homeGraphId;
  }
  /**
   * @return string
   */
  public function getHomeGraphId()
  {
    return $this->homeGraphId;
  }
  /**
   * @param AssistantApiSettingsHospitalityMode
   */
  public function setHospitalityModeStatus(AssistantApiSettingsHospitalityMode $hospitalityModeStatus)
  {
    $this->hospitalityModeStatus = $hospitalityModeStatus;
  }
  /**
   * @return AssistantApiSettingsHospitalityMode
   */
  public function getHospitalityModeStatus()
  {
    return $this->hospitalityModeStatus;
  }
  /**
   * @param string
   */
  public function setHotwordSensitivity($hotwordSensitivity)
  {
    $this->hotwordSensitivity = $hotwordSensitivity;
  }
  /**
   * @return string
   */
  public function getHotwordSensitivity()
  {
    return $this->hotwordSensitivity;
  }
  /**
   * @param AssistantApiSettingsHotwordThresholdAdjustmentFactor
   */
  public function setHotwordThresholdAdjustmentFactor(AssistantApiSettingsHotwordThresholdAdjustmentFactor $hotwordThresholdAdjustmentFactor)
  {
    $this->hotwordThresholdAdjustmentFactor = $hotwordThresholdAdjustmentFactor;
  }
  /**
   * @return AssistantApiSettingsHotwordThresholdAdjustmentFactor
   */
  public function getHotwordThresholdAdjustmentFactor()
  {
    return $this->hotwordThresholdAdjustmentFactor;
  }
  /**
   * @param string
   */
  public function setHumanFriendlyName($humanFriendlyName)
  {
    $this->humanFriendlyName = $humanFriendlyName;
  }
  /**
   * @return string
   */
  public function getHumanFriendlyName()
  {
    return $this->humanFriendlyName;
  }
  /**
   * @param AssistantApiSettingsInternalVersion
   */
  public function setInternalVersion(AssistantApiSettingsInternalVersion $internalVersion)
  {
    $this->internalVersion = $internalVersion;
  }
  /**
   * @return AssistantApiSettingsInternalVersion
   */
  public function getInternalVersion()
  {
    return $this->internalVersion;
  }
  /**
   * @param bool
   */
  public function setIsCloudSyncDevice($isCloudSyncDevice)
  {
    $this->isCloudSyncDevice = $isCloudSyncDevice;
  }
  /**
   * @return bool
   */
  public function getIsCloudSyncDevice()
  {
    return $this->isCloudSyncDevice;
  }
  /**
   * @param bool
   */
  public function setIsDeviceActivationCacheEnabled($isDeviceActivationCacheEnabled)
  {
    $this->isDeviceActivationCacheEnabled = $isDeviceActivationCacheEnabled;
  }
  /**
   * @return bool
   */
  public function getIsDeviceActivationCacheEnabled()
  {
    return $this->isDeviceActivationCacheEnabled;
  }
  /**
   * @param AssistantApiSettingsKidsMode
   */
  public function setKidsMode(AssistantApiSettingsKidsMode $kidsMode)
  {
    $this->kidsMode = $kidsMode;
  }
  /**
   * @return AssistantApiSettingsKidsMode
   */
  public function getKidsMode()
  {
    return $this->kidsMode;
  }
  /**
   * @param string
   */
  public function setLastCastRegistrationTimestamp($lastCastRegistrationTimestamp)
  {
    $this->lastCastRegistrationTimestamp = $lastCastRegistrationTimestamp;
  }
  /**
   * @return string
   */
  public function getLastCastRegistrationTimestamp()
  {
    return $this->lastCastRegistrationTimestamp;
  }
  /**
   * @param string
   */
  public function setLastUsedCoarseTimestamp($lastUsedCoarseTimestamp)
  {
    $this->lastUsedCoarseTimestamp = $lastUsedCoarseTimestamp;
  }
  /**
   * @return string
   */
  public function getLastUsedCoarseTimestamp()
  {
    return $this->lastUsedCoarseTimestamp;
  }
  /**
   * @param AssistantApiCoreTypesDeviceId[]
   */
  public function setLinkedDeviceId($linkedDeviceId)
  {
    $this->linkedDeviceId = $linkedDeviceId;
  }
  /**
   * @return AssistantApiCoreTypesDeviceId[]
   */
  public function getLinkedDeviceId()
  {
    return $this->linkedDeviceId;
  }
  /**
   * @param AssistantApiSettingsLinkedUser[]
   */
  public function setLinkedUsers($linkedUsers)
  {
    $this->linkedUsers = $linkedUsers;
  }
  /**
   * @return AssistantApiSettingsLinkedUser[]
   */
  public function getLinkedUsers()
  {
    return $this->linkedUsers;
  }
  /**
   * @param string
   */
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  /**
   * @return string
   */
  public function getLocale()
  {
    return $this->locale;
  }
  /**
   * @param AssistantApiCoreTypesLocationCoordinates
   */
  public function setLocationCoordinates(AssistantApiCoreTypesLocationCoordinates $locationCoordinates)
  {
    $this->locationCoordinates = $locationCoordinates;
  }
  /**
   * @return AssistantApiCoreTypesLocationCoordinates
   */
  public function getLocationCoordinates()
  {
    return $this->locationCoordinates;
  }
  /**
   * @param GeostoreFeatureProto
   */
  public function setLocationFeature(GeostoreFeatureProto $locationFeature)
  {
    $this->locationFeature = $locationFeature;
  }
  /**
   * @return GeostoreFeatureProto
   */
  public function getLocationFeature()
  {
    return $this->locationFeature;
  }
  /**
   * @param AssistantApiSettingsMarketplaceDisclosure
   */
  public function setMarketplaceDisclosure(AssistantApiSettingsMarketplaceDisclosure $marketplaceDisclosure)
  {
    $this->marketplaceDisclosure = $marketplaceDisclosure;
  }
  /**
   * @return AssistantApiSettingsMarketplaceDisclosure
   */
  public function getMarketplaceDisclosure()
  {
    return $this->marketplaceDisclosure;
  }
  /**
   * @param AssistantApiSettingsMasqueradeMode
   */
  public function setMasqueradeMode(AssistantApiSettingsMasqueradeMode $masqueradeMode)
  {
    $this->masqueradeMode = $masqueradeMode;
  }
  /**
   * @return AssistantApiSettingsMasqueradeMode
   */
  public function getMasqueradeMode()
  {
    return $this->masqueradeMode;
  }
  /**
   * @param AssistantApiSettingsNotificationProfile
   */
  public function setNotificationProfile(AssistantApiSettingsNotificationProfile $notificationProfile)
  {
    $this->notificationProfile = $notificationProfile;
  }
  /**
   * @return AssistantApiSettingsNotificationProfile
   */
  public function getNotificationProfile()
  {
    return $this->notificationProfile;
  }
  /**
   * @param string
   */
  public function setOauthClientId($oauthClientId)
  {
    $this->oauthClientId = $oauthClientId;
  }
  /**
   * @return string
   */
  public function getOauthClientId()
  {
    return $this->oauthClientId;
  }
  /**
   * @param AssistantApiSettingsOnDeviceAppSettings
   */
  public function setOnDeviceAppSettings(AssistantApiSettingsOnDeviceAppSettings $onDeviceAppSettings)
  {
    $this->onDeviceAppSettings = $onDeviceAppSettings;
  }
  /**
   * @return AssistantApiSettingsOnDeviceAppSettings
   */
  public function getOnDeviceAppSettings()
  {
    return $this->onDeviceAppSettings;
  }
  /**
   * @param AssistantApiSettingsDeviceLogsOptIn
   */
  public function setOptInStatus(AssistantApiSettingsDeviceLogsOptIn $optInStatus)
  {
    $this->optInStatus = $optInStatus;
  }
  /**
   * @return AssistantApiSettingsDeviceLogsOptIn
   */
  public function getOptInStatus()
  {
    return $this->optInStatus;
  }
  /**
   * @param bool
   */
  public function setPaymentsEnabled($paymentsEnabled)
  {
    $this->paymentsEnabled = $paymentsEnabled;
  }
  /**
   * @return bool
   */
  public function getPaymentsEnabled()
  {
    return $this->paymentsEnabled;
  }
  /**
   * @param AssistantApiSettingsPersonalizationMetadata
   */
  public function setPersonalizationMetadata(AssistantApiSettingsPersonalizationMetadata $personalizationMetadata)
  {
    $this->personalizationMetadata = $personalizationMetadata;
  }
  /**
   * @return AssistantApiSettingsPersonalizationMetadata
   */
  public function getPersonalizationMetadata()
  {
    return $this->personalizationMetadata;
  }
  /**
   * @param AssistantApiSettingsPoliteMode
   */
  public function setPoliteMode(AssistantApiSettingsPoliteMode $politeMode)
  {
    $this->politeMode = $politeMode;
  }
  /**
   * @return AssistantApiSettingsPoliteMode
   */
  public function getPoliteMode()
  {
    return $this->politeMode;
  }
  /**
   * @param string
   */
  public function setPostalCode($postalCode)
  {
    $this->postalCode = $postalCode;
  }
  /**
   * @return string
   */
  public function getPostalCode()
  {
    return $this->postalCode;
  }
  /**
   * @param AssistantApiSettingsReauthTrustedDeviceSettings
   */
  public function setReauthTrustedDeviceSettings(AssistantApiSettingsReauthTrustedDeviceSettings $reauthTrustedDeviceSettings)
  {
    $this->reauthTrustedDeviceSettings = $reauthTrustedDeviceSettings;
  }
  /**
   * @return AssistantApiSettingsReauthTrustedDeviceSettings
   */
  public function getReauthTrustedDeviceSettings()
  {
    return $this->reauthTrustedDeviceSettings;
  }
  /**
   * @param string
   */
  public function setShortenedAddress($shortenedAddress)
  {
    $this->shortenedAddress = $shortenedAddress;
  }
  /**
   * @return string
   */
  public function getShortenedAddress()
  {
    return $this->shortenedAddress;
  }
  /**
   * @param bool
   */
  public function setSpeakerIdEnabled($speakerIdEnabled)
  {
    $this->speakerIdEnabled = $speakerIdEnabled;
  }
  /**
   * @return bool
   */
  public function getSpeakerIdEnabled()
  {
    return $this->speakerIdEnabled;
  }
  /**
   * @param AssistantApiSettingsSpeechOutputSettings
   */
  public function setSpeechOutputSettings(AssistantApiSettingsSpeechOutputSettings $speechOutputSettings)
  {
    $this->speechOutputSettings = $speechOutputSettings;
  }
  /**
   * @return AssistantApiSettingsSpeechOutputSettings
   */
  public function getSpeechOutputSettings()
  {
    return $this->speechOutputSettings;
  }
  /**
   * @param AssistantApiSettingsSpeechSettings
   */
  public function setSpeechSettings(AssistantApiSettingsSpeechSettings $speechSettings)
  {
    $this->speechSettings = $speechSettings;
  }
  /**
   * @return AssistantApiSettingsSpeechSettings
   */
  public function getSpeechSettings()
  {
    return $this->speechSettings;
  }
  /**
   * @param AssistantApiSettingsDeviceSupervisionSettings
   */
  public function setSupervisionSettings(AssistantApiSettingsDeviceSupervisionSettings $supervisionSettings)
  {
    $this->supervisionSettings = $supervisionSettings;
  }
  /**
   * @return AssistantApiSettingsDeviceSupervisionSettings
   */
  public function getSupervisionSettings()
  {
    return $this->supervisionSettings;
  }
  /**
   * @param AssistantApiCoreTypesSurfaceType
   */
  public function setSurfaceType(AssistantApiCoreTypesSurfaceType $surfaceType)
  {
    $this->surfaceType = $surfaceType;
  }
  /**
   * @return AssistantApiCoreTypesSurfaceType
   */
  public function getSurfaceType()
  {
    return $this->surfaceType;
  }
  /**
   * @param AssistantApiSettingsTetheredInfo
   */
  public function setTetheredInfo(AssistantApiSettingsTetheredInfo $tetheredInfo)
  {
    $this->tetheredInfo = $tetheredInfo;
  }
  /**
   * @return AssistantApiSettingsTetheredInfo
   */
  public function getTetheredInfo()
  {
    return $this->tetheredInfo;
  }
  /**
   * @param AssistantApiTimeZone
   */
  public function setTimeZone(AssistantApiTimeZone $timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return AssistantApiTimeZone
   */
  public function getTimeZone()
  {
    return $this->timeZone;
  }
  /**
   * @param string
   */
  public function setTruncatedLocalNetworkId($truncatedLocalNetworkId)
  {
    $this->truncatedLocalNetworkId = $truncatedLocalNetworkId;
  }
  /**
   * @return string
   */
  public function getTruncatedLocalNetworkId()
  {
    return $this->truncatedLocalNetworkId;
  }
  /**
   * @param bool
   */
  public function setTrustedVoiceEnabled($trustedVoiceEnabled)
  {
    $this->trustedVoiceEnabled = $trustedVoiceEnabled;
  }
  /**
   * @return bool
   */
  public function getTrustedVoiceEnabled()
  {
    return $this->trustedVoiceEnabled;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param bool
   */
  public function setVerboseTtsForChromecastEnabled($verboseTtsForChromecastEnabled)
  {
    $this->verboseTtsForChromecastEnabled = $verboseTtsForChromecastEnabled;
  }
  /**
   * @return bool
   */
  public function getVerboseTtsForChromecastEnabled()
  {
    return $this->verboseTtsForChromecastEnabled;
  }
  /**
   * @param string
   */
  public function setVmLastUsedCoarseTimestamp($vmLastUsedCoarseTimestamp)
  {
    $this->vmLastUsedCoarseTimestamp = $vmLastUsedCoarseTimestamp;
  }
  /**
   * @return string
   */
  public function getVmLastUsedCoarseTimestamp()
  {
    return $this->vmLastUsedCoarseTimestamp;
  }
  /**
   * @param string
   */
  public function setVoiceEnrollmentStatus($voiceEnrollmentStatus)
  {
    $this->voiceEnrollmentStatus = $voiceEnrollmentStatus;
  }
  /**
   * @return string
   */
  public function getVoiceEnrollmentStatus()
  {
    return $this->voiceEnrollmentStatus;
  }
  /**
   * @param bool
   */
  public function setVoiceInputEnabled($voiceInputEnabled)
  {
    $this->voiceInputEnabled = $voiceInputEnabled;
  }
  /**
   * @return bool
   */
  public function getVoiceInputEnabled()
  {
    return $this->voiceInputEnabled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiSettingsDeviceSettings::class, 'Google_Service_Contentwarehouse_AssistantApiSettingsDeviceSettings');

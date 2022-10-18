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

class AssistantVerticalsHomeautomationProtoHomeAutomationMetaData extends \Google\Collection
{
  protected $collection_key = 'traitRoutingHints';
  protected $actionProjectConfigsType = AssistantVerticalsHomeautomationProtoActionProjectConfig::class;
  protected $actionProjectConfigsDataType = 'array';
  protected $agentInformationType = AssistantVerticalsHomeautomationProtoAgentInformation::class;
  protected $agentInformationDataType = '';
  /**
   * @var string
   */
  public $assistantDeviceId;
  /**
   * @var array[]
   */
  public $attributes;
  /**
   * @var string
   */
  public $creatorGaiaId;
  /**
   * @var string[]
   */
  public $derivedType;
  /**
   * @var string
   */
  public $deviceModelId;
  /**
   * @var string
   */
  public $gcmExecutionAddress;
  /**
   * @var string
   */
  public $hashValue;
  /**
   * @var bool
   */
  public $lanscanOptedIn;
  /**
   * @var string
   */
  public $modelName;
  /**
   * @var bool
   */
  public $notificationEnabledByUser;
  /**
   * @var bool
   */
  public $notificationSupportedByAgent;
  /**
   * @var string
   */
  public $opaqueCustomData;
  /**
   * @var string
   */
  public $operationalNodeId;
  protected $otherDeviceIdsType = AssistantVerticalsHomeautomationProtoAgentDeviceId::class;
  protected $otherDeviceIdsDataType = 'array';
  /**
   * @var string[]
   */
  public $parentNode;
  /**
   * @var string[]
   */
  public $parentType;
  /**
   * @var string[]
   */
  public $personalizedNicknames;
  protected $physicalLocationType = AssistantVerticalsHomeautomationProtoPhysicalLocation::class;
  protected $physicalLocationDataType = '';
  /**
   * @var string[]
   */
  public $plural;
  /**
   * @var string
   */
  public $primaryName;
  protected $roleInformationType = AssistantVerticalsHomeautomationProtoRoleInformation::class;
  protected $roleInformationDataType = '';
  /**
   * @var bool
   */
  public $routableViaGcm;
  protected $saftDocumentType = NlpSaftDocument::class;
  protected $saftDocumentDataType = '';
  protected $smartDeviceManagementDataType = AssistantVerticalsHomeautomationProtoSmartDeviceManagementData::class;
  protected $smartDeviceManagementDataDataType = '';
  protected $smartHomeFeaturesType = AssistantVerticalsHomeautomationProtoSmartHomeFeatures::class;
  protected $smartHomeFeaturesDataType = '';
  protected $supportedStructureFeaturesType = AssistantVerticalsHomeautomationProtoSupportedStructureFeatures::class;
  protected $supportedStructureFeaturesDataType = '';
  protected $supportedTraitsByAgentType = AssistantVerticalsHomeautomationProtoHomeAutomationMetaDataSupportedTraits::class;
  protected $supportedTraitsByAgentDataType = 'map';
  /**
   * @var bool
   */
  public $supportsDirectResponse;
  /**
   * @var string[]
   */
  public $targetDeviceSignalStrengths;
  protected $traitRoutingHintsType = HomeGraphCommonTraitRoutingHints::class;
  protected $traitRoutingHintsDataType = 'array';
  protected $traitRoutingTableType = HomeGraphCommonRoutingTable::class;
  protected $traitRoutingTableDataType = 'map';
  protected $traitToAttributeProtosType = AssistantVerticalsHomeautomationProtoAttributes::class;
  protected $traitToAttributeProtosDataType = 'map';
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $userDefinedDeviceType;
  /**
   * @var string
   */
  public $voiceMatchRequired;
  /**
   * @var bool
   */
  public $willReportState;
  protected $zoneNameSaftDocumentType = NlpSaftDocument::class;
  protected $zoneNameSaftDocumentDataType = '';

  /**
   * @param AssistantVerticalsHomeautomationProtoActionProjectConfig[]
   */
  public function setActionProjectConfigs($actionProjectConfigs)
  {
    $this->actionProjectConfigs = $actionProjectConfigs;
  }
  /**
   * @return AssistantVerticalsHomeautomationProtoActionProjectConfig[]
   */
  public function getActionProjectConfigs()
  {
    return $this->actionProjectConfigs;
  }
  /**
   * @param AssistantVerticalsHomeautomationProtoAgentInformation
   */
  public function setAgentInformation(AssistantVerticalsHomeautomationProtoAgentInformation $agentInformation)
  {
    $this->agentInformation = $agentInformation;
  }
  /**
   * @return AssistantVerticalsHomeautomationProtoAgentInformation
   */
  public function getAgentInformation()
  {
    return $this->agentInformation;
  }
  /**
   * @param string
   */
  public function setAssistantDeviceId($assistantDeviceId)
  {
    $this->assistantDeviceId = $assistantDeviceId;
  }
  /**
   * @return string
   */
  public function getAssistantDeviceId()
  {
    return $this->assistantDeviceId;
  }
  /**
   * @param array[]
   */
  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return array[]
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  /**
   * @param string
   */
  public function setCreatorGaiaId($creatorGaiaId)
  {
    $this->creatorGaiaId = $creatorGaiaId;
  }
  /**
   * @return string
   */
  public function getCreatorGaiaId()
  {
    return $this->creatorGaiaId;
  }
  /**
   * @param string[]
   */
  public function setDerivedType($derivedType)
  {
    $this->derivedType = $derivedType;
  }
  /**
   * @return string[]
   */
  public function getDerivedType()
  {
    return $this->derivedType;
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
   * @param string
   */
  public function setGcmExecutionAddress($gcmExecutionAddress)
  {
    $this->gcmExecutionAddress = $gcmExecutionAddress;
  }
  /**
   * @return string
   */
  public function getGcmExecutionAddress()
  {
    return $this->gcmExecutionAddress;
  }
  /**
   * @param string
   */
  public function setHashValue($hashValue)
  {
    $this->hashValue = $hashValue;
  }
  /**
   * @return string
   */
  public function getHashValue()
  {
    return $this->hashValue;
  }
  /**
   * @param bool
   */
  public function setLanscanOptedIn($lanscanOptedIn)
  {
    $this->lanscanOptedIn = $lanscanOptedIn;
  }
  /**
   * @return bool
   */
  public function getLanscanOptedIn()
  {
    return $this->lanscanOptedIn;
  }
  /**
   * @param string
   */
  public function setModelName($modelName)
  {
    $this->modelName = $modelName;
  }
  /**
   * @return string
   */
  public function getModelName()
  {
    return $this->modelName;
  }
  /**
   * @param bool
   */
  public function setNotificationEnabledByUser($notificationEnabledByUser)
  {
    $this->notificationEnabledByUser = $notificationEnabledByUser;
  }
  /**
   * @return bool
   */
  public function getNotificationEnabledByUser()
  {
    return $this->notificationEnabledByUser;
  }
  /**
   * @param bool
   */
  public function setNotificationSupportedByAgent($notificationSupportedByAgent)
  {
    $this->notificationSupportedByAgent = $notificationSupportedByAgent;
  }
  /**
   * @return bool
   */
  public function getNotificationSupportedByAgent()
  {
    return $this->notificationSupportedByAgent;
  }
  /**
   * @param string
   */
  public function setOpaqueCustomData($opaqueCustomData)
  {
    $this->opaqueCustomData = $opaqueCustomData;
  }
  /**
   * @return string
   */
  public function getOpaqueCustomData()
  {
    return $this->opaqueCustomData;
  }
  /**
   * @param string
   */
  public function setOperationalNodeId($operationalNodeId)
  {
    $this->operationalNodeId = $operationalNodeId;
  }
  /**
   * @return string
   */
  public function getOperationalNodeId()
  {
    return $this->operationalNodeId;
  }
  /**
   * @param AssistantVerticalsHomeautomationProtoAgentDeviceId[]
   */
  public function setOtherDeviceIds($otherDeviceIds)
  {
    $this->otherDeviceIds = $otherDeviceIds;
  }
  /**
   * @return AssistantVerticalsHomeautomationProtoAgentDeviceId[]
   */
  public function getOtherDeviceIds()
  {
    return $this->otherDeviceIds;
  }
  /**
   * @param string[]
   */
  public function setParentNode($parentNode)
  {
    $this->parentNode = $parentNode;
  }
  /**
   * @return string[]
   */
  public function getParentNode()
  {
    return $this->parentNode;
  }
  /**
   * @param string[]
   */
  public function setParentType($parentType)
  {
    $this->parentType = $parentType;
  }
  /**
   * @return string[]
   */
  public function getParentType()
  {
    return $this->parentType;
  }
  /**
   * @param string[]
   */
  public function setPersonalizedNicknames($personalizedNicknames)
  {
    $this->personalizedNicknames = $personalizedNicknames;
  }
  /**
   * @return string[]
   */
  public function getPersonalizedNicknames()
  {
    return $this->personalizedNicknames;
  }
  /**
   * @param AssistantVerticalsHomeautomationProtoPhysicalLocation
   */
  public function setPhysicalLocation(AssistantVerticalsHomeautomationProtoPhysicalLocation $physicalLocation)
  {
    $this->physicalLocation = $physicalLocation;
  }
  /**
   * @return AssistantVerticalsHomeautomationProtoPhysicalLocation
   */
  public function getPhysicalLocation()
  {
    return $this->physicalLocation;
  }
  /**
   * @param string[]
   */
  public function setPlural($plural)
  {
    $this->plural = $plural;
  }
  /**
   * @return string[]
   */
  public function getPlural()
  {
    return $this->plural;
  }
  /**
   * @param string
   */
  public function setPrimaryName($primaryName)
  {
    $this->primaryName = $primaryName;
  }
  /**
   * @return string
   */
  public function getPrimaryName()
  {
    return $this->primaryName;
  }
  /**
   * @param AssistantVerticalsHomeautomationProtoRoleInformation
   */
  public function setRoleInformation(AssistantVerticalsHomeautomationProtoRoleInformation $roleInformation)
  {
    $this->roleInformation = $roleInformation;
  }
  /**
   * @return AssistantVerticalsHomeautomationProtoRoleInformation
   */
  public function getRoleInformation()
  {
    return $this->roleInformation;
  }
  /**
   * @param bool
   */
  public function setRoutableViaGcm($routableViaGcm)
  {
    $this->routableViaGcm = $routableViaGcm;
  }
  /**
   * @return bool
   */
  public function getRoutableViaGcm()
  {
    return $this->routableViaGcm;
  }
  /**
   * @param NlpSaftDocument
   */
  public function setSaftDocument(NlpSaftDocument $saftDocument)
  {
    $this->saftDocument = $saftDocument;
  }
  /**
   * @return NlpSaftDocument
   */
  public function getSaftDocument()
  {
    return $this->saftDocument;
  }
  /**
   * @param AssistantVerticalsHomeautomationProtoSmartDeviceManagementData
   */
  public function setSmartDeviceManagementData(AssistantVerticalsHomeautomationProtoSmartDeviceManagementData $smartDeviceManagementData)
  {
    $this->smartDeviceManagementData = $smartDeviceManagementData;
  }
  /**
   * @return AssistantVerticalsHomeautomationProtoSmartDeviceManagementData
   */
  public function getSmartDeviceManagementData()
  {
    return $this->smartDeviceManagementData;
  }
  /**
   * @param AssistantVerticalsHomeautomationProtoSmartHomeFeatures
   */
  public function setSmartHomeFeatures(AssistantVerticalsHomeautomationProtoSmartHomeFeatures $smartHomeFeatures)
  {
    $this->smartHomeFeatures = $smartHomeFeatures;
  }
  /**
   * @return AssistantVerticalsHomeautomationProtoSmartHomeFeatures
   */
  public function getSmartHomeFeatures()
  {
    return $this->smartHomeFeatures;
  }
  /**
   * @param AssistantVerticalsHomeautomationProtoSupportedStructureFeatures
   */
  public function setSupportedStructureFeatures(AssistantVerticalsHomeautomationProtoSupportedStructureFeatures $supportedStructureFeatures)
  {
    $this->supportedStructureFeatures = $supportedStructureFeatures;
  }
  /**
   * @return AssistantVerticalsHomeautomationProtoSupportedStructureFeatures
   */
  public function getSupportedStructureFeatures()
  {
    return $this->supportedStructureFeatures;
  }
  /**
   * @param AssistantVerticalsHomeautomationProtoHomeAutomationMetaDataSupportedTraits[]
   */
  public function setSupportedTraitsByAgent($supportedTraitsByAgent)
  {
    $this->supportedTraitsByAgent = $supportedTraitsByAgent;
  }
  /**
   * @return AssistantVerticalsHomeautomationProtoHomeAutomationMetaDataSupportedTraits[]
   */
  public function getSupportedTraitsByAgent()
  {
    return $this->supportedTraitsByAgent;
  }
  /**
   * @param bool
   */
  public function setSupportsDirectResponse($supportsDirectResponse)
  {
    $this->supportsDirectResponse = $supportsDirectResponse;
  }
  /**
   * @return bool
   */
  public function getSupportsDirectResponse()
  {
    return $this->supportsDirectResponse;
  }
  /**
   * @param string[]
   */
  public function setTargetDeviceSignalStrengths($targetDeviceSignalStrengths)
  {
    $this->targetDeviceSignalStrengths = $targetDeviceSignalStrengths;
  }
  /**
   * @return string[]
   */
  public function getTargetDeviceSignalStrengths()
  {
    return $this->targetDeviceSignalStrengths;
  }
  /**
   * @param HomeGraphCommonTraitRoutingHints[]
   */
  public function setTraitRoutingHints($traitRoutingHints)
  {
    $this->traitRoutingHints = $traitRoutingHints;
  }
  /**
   * @return HomeGraphCommonTraitRoutingHints[]
   */
  public function getTraitRoutingHints()
  {
    return $this->traitRoutingHints;
  }
  /**
   * @param HomeGraphCommonRoutingTable[]
   */
  public function setTraitRoutingTable($traitRoutingTable)
  {
    $this->traitRoutingTable = $traitRoutingTable;
  }
  /**
   * @return HomeGraphCommonRoutingTable[]
   */
  public function getTraitRoutingTable()
  {
    return $this->traitRoutingTable;
  }
  /**
   * @param AssistantVerticalsHomeautomationProtoAttributes[]
   */
  public function setTraitToAttributeProtos($traitToAttributeProtos)
  {
    $this->traitToAttributeProtos = $traitToAttributeProtos;
  }
  /**
   * @return AssistantVerticalsHomeautomationProtoAttributes[]
   */
  public function getTraitToAttributeProtos()
  {
    return $this->traitToAttributeProtos;
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
   * @param string
   */
  public function setUserDefinedDeviceType($userDefinedDeviceType)
  {
    $this->userDefinedDeviceType = $userDefinedDeviceType;
  }
  /**
   * @return string
   */
  public function getUserDefinedDeviceType()
  {
    return $this->userDefinedDeviceType;
  }
  /**
   * @param string
   */
  public function setVoiceMatchRequired($voiceMatchRequired)
  {
    $this->voiceMatchRequired = $voiceMatchRequired;
  }
  /**
   * @return string
   */
  public function getVoiceMatchRequired()
  {
    return $this->voiceMatchRequired;
  }
  /**
   * @param bool
   */
  public function setWillReportState($willReportState)
  {
    $this->willReportState = $willReportState;
  }
  /**
   * @return bool
   */
  public function getWillReportState()
  {
    return $this->willReportState;
  }
  /**
   * @param NlpSaftDocument
   */
  public function setZoneNameSaftDocument(NlpSaftDocument $zoneNameSaftDocument)
  {
    $this->zoneNameSaftDocument = $zoneNameSaftDocument;
  }
  /**
   * @return NlpSaftDocument
   */
  public function getZoneNameSaftDocument()
  {
    return $this->zoneNameSaftDocument;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantVerticalsHomeautomationProtoHomeAutomationMetaData::class, 'Google_Service_Contentwarehouse_AssistantVerticalsHomeautomationProtoHomeAutomationMetaData');

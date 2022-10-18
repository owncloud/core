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

class AttentionalEntitiesMentionProperties extends \Google\Model
{
  protected $deviceIdType = AssistantApiCoreTypesDeviceId::class;
  protected $deviceIdDataType = '';
  protected $eventIdType = EventIdMessage::class;
  protected $eventIdDataType = '';
  /**
   * @var float
   */
  public $factoidScore;
  protected $listEntryInfoType = AttentionalEntitiesMentionPropertiesListEntryInfo::class;
  protected $listEntryInfoDataType = '';
  /**
   * @var string
   */
  public $recency;
  protected $roleType = AttentionalEntitiesSemanticRoleId::class;
  protected $roleDataType = '';
  /**
   * @var string
   */
  public $salience;
  protected $sourceType = AttentionalEntitiesMentionPropertiesSource::class;
  protected $sourceDataType = '';
  protected $spatialPropertiesType = AttentionalEntitiesSpatialProperties::class;
  protected $spatialPropertiesDataType = '';
  protected $surfaceFormType = AttentionalEntitiesSurfaceForm::class;
  protected $surfaceFormDataType = '';
  /**
   * @var string
   */
  public $timestamp;

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
   * @param EventIdMessage
   */
  public function setEventId(EventIdMessage $eventId)
  {
    $this->eventId = $eventId;
  }
  /**
   * @return EventIdMessage
   */
  public function getEventId()
  {
    return $this->eventId;
  }
  /**
   * @param float
   */
  public function setFactoidScore($factoidScore)
  {
    $this->factoidScore = $factoidScore;
  }
  /**
   * @return float
   */
  public function getFactoidScore()
  {
    return $this->factoidScore;
  }
  /**
   * @param AttentionalEntitiesMentionPropertiesListEntryInfo
   */
  public function setListEntryInfo(AttentionalEntitiesMentionPropertiesListEntryInfo $listEntryInfo)
  {
    $this->listEntryInfo = $listEntryInfo;
  }
  /**
   * @return AttentionalEntitiesMentionPropertiesListEntryInfo
   */
  public function getListEntryInfo()
  {
    return $this->listEntryInfo;
  }
  /**
   * @param string
   */
  public function setRecency($recency)
  {
    $this->recency = $recency;
  }
  /**
   * @return string
   */
  public function getRecency()
  {
    return $this->recency;
  }
  /**
   * @param AttentionalEntitiesSemanticRoleId
   */
  public function setRole(AttentionalEntitiesSemanticRoleId $role)
  {
    $this->role = $role;
  }
  /**
   * @return AttentionalEntitiesSemanticRoleId
   */
  public function getRole()
  {
    return $this->role;
  }
  /**
   * @param string
   */
  public function setSalience($salience)
  {
    $this->salience = $salience;
  }
  /**
   * @return string
   */
  public function getSalience()
  {
    return $this->salience;
  }
  /**
   * @param AttentionalEntitiesMentionPropertiesSource
   */
  public function setSource(AttentionalEntitiesMentionPropertiesSource $source)
  {
    $this->source = $source;
  }
  /**
   * @return AttentionalEntitiesMentionPropertiesSource
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param AttentionalEntitiesSpatialProperties
   */
  public function setSpatialProperties(AttentionalEntitiesSpatialProperties $spatialProperties)
  {
    $this->spatialProperties = $spatialProperties;
  }
  /**
   * @return AttentionalEntitiesSpatialProperties
   */
  public function getSpatialProperties()
  {
    return $this->spatialProperties;
  }
  /**
   * @param AttentionalEntitiesSurfaceForm
   */
  public function setSurfaceForm(AttentionalEntitiesSurfaceForm $surfaceForm)
  {
    $this->surfaceForm = $surfaceForm;
  }
  /**
   * @return AttentionalEntitiesSurfaceForm
   */
  public function getSurfaceForm()
  {
    return $this->surfaceForm;
  }
  /**
   * @param string
   */
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  /**
   * @return string
   */
  public function getTimestamp()
  {
    return $this->timestamp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AttentionalEntitiesMentionProperties::class, 'Google_Service_Contentwarehouse_AttentionalEntitiesMentionProperties');

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

class CopleySourceTypeMetadata extends \Google\Collection
{
  protected $collection_key = 'provenanceCategory';
  /**
   * @var string
   */
  public $contactAnnotationId;
  /**
   * @var string
   */
  public $displayableName;
  /**
   * @var string
   */
  public $emailIdentifier;
  protected $eventIdType = EventIdMessage::class;
  protected $eventIdDataType = '';
  protected $localDiscoverySettingsMetadataType = PersonalizationSettingsApiProtoLocalDiscoveryLocalDiscoverySettingsMetadata::class;
  protected $localDiscoverySettingsMetadataDataType = '';
  /**
   * @var string
   */
  public $personalDataProvenance;
  /**
   * @var string
   */
  public $personalDataType;
  /**
   * @var string[]
   */
  public $provenanceCategory;
  protected $sensitivityType = KnowledgeAnswersSensitivitySensitivity::class;
  protected $sensitivityDataType = '';

  /**
   * @param string
   */
  public function setContactAnnotationId($contactAnnotationId)
  {
    $this->contactAnnotationId = $contactAnnotationId;
  }
  /**
   * @return string
   */
  public function getContactAnnotationId()
  {
    return $this->contactAnnotationId;
  }
  /**
   * @param string
   */
  public function setDisplayableName($displayableName)
  {
    $this->displayableName = $displayableName;
  }
  /**
   * @return string
   */
  public function getDisplayableName()
  {
    return $this->displayableName;
  }
  /**
   * @param string
   */
  public function setEmailIdentifier($emailIdentifier)
  {
    $this->emailIdentifier = $emailIdentifier;
  }
  /**
   * @return string
   */
  public function getEmailIdentifier()
  {
    return $this->emailIdentifier;
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
   * @param PersonalizationSettingsApiProtoLocalDiscoveryLocalDiscoverySettingsMetadata
   */
  public function setLocalDiscoverySettingsMetadata(PersonalizationSettingsApiProtoLocalDiscoveryLocalDiscoverySettingsMetadata $localDiscoverySettingsMetadata)
  {
    $this->localDiscoverySettingsMetadata = $localDiscoverySettingsMetadata;
  }
  /**
   * @return PersonalizationSettingsApiProtoLocalDiscoveryLocalDiscoverySettingsMetadata
   */
  public function getLocalDiscoverySettingsMetadata()
  {
    return $this->localDiscoverySettingsMetadata;
  }
  /**
   * @param string
   */
  public function setPersonalDataProvenance($personalDataProvenance)
  {
    $this->personalDataProvenance = $personalDataProvenance;
  }
  /**
   * @return string
   */
  public function getPersonalDataProvenance()
  {
    return $this->personalDataProvenance;
  }
  /**
   * @param string
   */
  public function setPersonalDataType($personalDataType)
  {
    $this->personalDataType = $personalDataType;
  }
  /**
   * @return string
   */
  public function getPersonalDataType()
  {
    return $this->personalDataType;
  }
  /**
   * @param string[]
   */
  public function setProvenanceCategory($provenanceCategory)
  {
    $this->provenanceCategory = $provenanceCategory;
  }
  /**
   * @return string[]
   */
  public function getProvenanceCategory()
  {
    return $this->provenanceCategory;
  }
  /**
   * @param KnowledgeAnswersSensitivitySensitivity
   */
  public function setSensitivity(KnowledgeAnswersSensitivitySensitivity $sensitivity)
  {
    $this->sensitivity = $sensitivity;
  }
  /**
   * @return KnowledgeAnswersSensitivitySensitivity
   */
  public function getSensitivity()
  {
    return $this->sensitivity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CopleySourceTypeMetadata::class, 'Google_Service_Contentwarehouse_CopleySourceTypeMetadata');

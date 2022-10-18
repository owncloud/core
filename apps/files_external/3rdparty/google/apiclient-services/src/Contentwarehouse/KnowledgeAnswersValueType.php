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

class KnowledgeAnswersValueType extends \Google\Model
{
  protected $anyTypeType = KnowledgeAnswersAnyType::class;
  protected $anyTypeDataType = '';
  protected $attributeTypeType = KnowledgeAnswersAttributeType::class;
  protected $attributeTypeDataType = '';
  protected $booleanTypeType = KnowledgeAnswersBooleanType::class;
  protected $booleanTypeDataType = '';
  protected $collectionTypeType = KnowledgeAnswersCollectionType::class;
  protected $collectionTypeDataType = '';
  protected $compoundTypeType = KnowledgeAnswersCompoundType::class;
  protected $compoundTypeDataType = '';
  protected $dateTypeType = KnowledgeAnswersDateType::class;
  protected $dateTypeDataType = '';
  protected $dependencyTypeType = KnowledgeAnswersDependencyType::class;
  protected $dependencyTypeDataType = '';
  protected $durationTypeType = KnowledgeAnswersDurationType::class;
  protected $durationTypeDataType = '';
  protected $entityTypeType = KnowledgeAnswersEntityType::class;
  protected $entityTypeDataType = '';
  protected $measurementTypeType = KnowledgeAnswersMeasurementType::class;
  protected $measurementTypeDataType = '';
  protected $normalizedStringTypeType = KnowledgeAnswersNormalizedStringType::class;
  protected $normalizedStringTypeDataType = '';
  protected $numberTypeType = KnowledgeAnswersNumberType::class;
  protected $numberTypeDataType = '';
  protected $opaqueTypeType = KnowledgeAnswersOpaqueType::class;
  protected $opaqueTypeDataType = '';
  protected $plexityRequirementType = KnowledgeAnswersPlexityRequirement::class;
  protected $plexityRequirementDataType = '';
  /**
   * @var string
   */
  public $pluralityType;
  protected $polarQuestionTypeType = KnowledgeAnswersPolarQuestionType::class;
  protected $polarQuestionTypeDataType = '';
  protected $semanticTypeType = KnowledgeAnswersSemanticType::class;
  protected $semanticTypeDataType = '';
  /**
   * @var string
   */
  public $slotName;
  protected $stateOfAffairsTypeType = KnowledgeAnswersStateOfAffairsType::class;
  protected $stateOfAffairsTypeDataType = '';
  protected $stringTypeType = KnowledgeAnswersStringType::class;
  protected $stringTypeDataType = '';
  protected $timezoneTypeType = KnowledgeAnswersTimeZoneType::class;
  protected $timezoneTypeDataType = '';
  protected $trackingNumberTypeType = KnowledgeAnswersTrackingNumberType::class;
  protected $trackingNumberTypeDataType = '';
  protected $withTraitType = KnowledgeAnswersTypeTrait::class;
  protected $withTraitDataType = '';

  /**
   * @param KnowledgeAnswersAnyType
   */
  public function setAnyType(KnowledgeAnswersAnyType $anyType)
  {
    $this->anyType = $anyType;
  }
  /**
   * @return KnowledgeAnswersAnyType
   */
  public function getAnyType()
  {
    return $this->anyType;
  }
  /**
   * @param KnowledgeAnswersAttributeType
   */
  public function setAttributeType(KnowledgeAnswersAttributeType $attributeType)
  {
    $this->attributeType = $attributeType;
  }
  /**
   * @return KnowledgeAnswersAttributeType
   */
  public function getAttributeType()
  {
    return $this->attributeType;
  }
  /**
   * @param KnowledgeAnswersBooleanType
   */
  public function setBooleanType(KnowledgeAnswersBooleanType $booleanType)
  {
    $this->booleanType = $booleanType;
  }
  /**
   * @return KnowledgeAnswersBooleanType
   */
  public function getBooleanType()
  {
    return $this->booleanType;
  }
  /**
   * @param KnowledgeAnswersCollectionType
   */
  public function setCollectionType(KnowledgeAnswersCollectionType $collectionType)
  {
    $this->collectionType = $collectionType;
  }
  /**
   * @return KnowledgeAnswersCollectionType
   */
  public function getCollectionType()
  {
    return $this->collectionType;
  }
  /**
   * @param KnowledgeAnswersCompoundType
   */
  public function setCompoundType(KnowledgeAnswersCompoundType $compoundType)
  {
    $this->compoundType = $compoundType;
  }
  /**
   * @return KnowledgeAnswersCompoundType
   */
  public function getCompoundType()
  {
    return $this->compoundType;
  }
  /**
   * @param KnowledgeAnswersDateType
   */
  public function setDateType(KnowledgeAnswersDateType $dateType)
  {
    $this->dateType = $dateType;
  }
  /**
   * @return KnowledgeAnswersDateType
   */
  public function getDateType()
  {
    return $this->dateType;
  }
  /**
   * @param KnowledgeAnswersDependencyType
   */
  public function setDependencyType(KnowledgeAnswersDependencyType $dependencyType)
  {
    $this->dependencyType = $dependencyType;
  }
  /**
   * @return KnowledgeAnswersDependencyType
   */
  public function getDependencyType()
  {
    return $this->dependencyType;
  }
  /**
   * @param KnowledgeAnswersDurationType
   */
  public function setDurationType(KnowledgeAnswersDurationType $durationType)
  {
    $this->durationType = $durationType;
  }
  /**
   * @return KnowledgeAnswersDurationType
   */
  public function getDurationType()
  {
    return $this->durationType;
  }
  /**
   * @param KnowledgeAnswersEntityType
   */
  public function setEntityType(KnowledgeAnswersEntityType $entityType)
  {
    $this->entityType = $entityType;
  }
  /**
   * @return KnowledgeAnswersEntityType
   */
  public function getEntityType()
  {
    return $this->entityType;
  }
  /**
   * @param KnowledgeAnswersMeasurementType
   */
  public function setMeasurementType(KnowledgeAnswersMeasurementType $measurementType)
  {
    $this->measurementType = $measurementType;
  }
  /**
   * @return KnowledgeAnswersMeasurementType
   */
  public function getMeasurementType()
  {
    return $this->measurementType;
  }
  /**
   * @param KnowledgeAnswersNormalizedStringType
   */
  public function setNormalizedStringType(KnowledgeAnswersNormalizedStringType $normalizedStringType)
  {
    $this->normalizedStringType = $normalizedStringType;
  }
  /**
   * @return KnowledgeAnswersNormalizedStringType
   */
  public function getNormalizedStringType()
  {
    return $this->normalizedStringType;
  }
  /**
   * @param KnowledgeAnswersNumberType
   */
  public function setNumberType(KnowledgeAnswersNumberType $numberType)
  {
    $this->numberType = $numberType;
  }
  /**
   * @return KnowledgeAnswersNumberType
   */
  public function getNumberType()
  {
    return $this->numberType;
  }
  /**
   * @param KnowledgeAnswersOpaqueType
   */
  public function setOpaqueType(KnowledgeAnswersOpaqueType $opaqueType)
  {
    $this->opaqueType = $opaqueType;
  }
  /**
   * @return KnowledgeAnswersOpaqueType
   */
  public function getOpaqueType()
  {
    return $this->opaqueType;
  }
  /**
   * @param KnowledgeAnswersPlexityRequirement
   */
  public function setPlexityRequirement(KnowledgeAnswersPlexityRequirement $plexityRequirement)
  {
    $this->plexityRequirement = $plexityRequirement;
  }
  /**
   * @return KnowledgeAnswersPlexityRequirement
   */
  public function getPlexityRequirement()
  {
    return $this->plexityRequirement;
  }
  /**
   * @param string
   */
  public function setPluralityType($pluralityType)
  {
    $this->pluralityType = $pluralityType;
  }
  /**
   * @return string
   */
  public function getPluralityType()
  {
    return $this->pluralityType;
  }
  /**
   * @param KnowledgeAnswersPolarQuestionType
   */
  public function setPolarQuestionType(KnowledgeAnswersPolarQuestionType $polarQuestionType)
  {
    $this->polarQuestionType = $polarQuestionType;
  }
  /**
   * @return KnowledgeAnswersPolarQuestionType
   */
  public function getPolarQuestionType()
  {
    return $this->polarQuestionType;
  }
  /**
   * @param KnowledgeAnswersSemanticType
   */
  public function setSemanticType(KnowledgeAnswersSemanticType $semanticType)
  {
    $this->semanticType = $semanticType;
  }
  /**
   * @return KnowledgeAnswersSemanticType
   */
  public function getSemanticType()
  {
    return $this->semanticType;
  }
  /**
   * @param string
   */
  public function setSlotName($slotName)
  {
    $this->slotName = $slotName;
  }
  /**
   * @return string
   */
  public function getSlotName()
  {
    return $this->slotName;
  }
  /**
   * @param KnowledgeAnswersStateOfAffairsType
   */
  public function setStateOfAffairsType(KnowledgeAnswersStateOfAffairsType $stateOfAffairsType)
  {
    $this->stateOfAffairsType = $stateOfAffairsType;
  }
  /**
   * @return KnowledgeAnswersStateOfAffairsType
   */
  public function getStateOfAffairsType()
  {
    return $this->stateOfAffairsType;
  }
  /**
   * @param KnowledgeAnswersStringType
   */
  public function setStringType(KnowledgeAnswersStringType $stringType)
  {
    $this->stringType = $stringType;
  }
  /**
   * @return KnowledgeAnswersStringType
   */
  public function getStringType()
  {
    return $this->stringType;
  }
  /**
   * @param KnowledgeAnswersTimeZoneType
   */
  public function setTimezoneType(KnowledgeAnswersTimeZoneType $timezoneType)
  {
    $this->timezoneType = $timezoneType;
  }
  /**
   * @return KnowledgeAnswersTimeZoneType
   */
  public function getTimezoneType()
  {
    return $this->timezoneType;
  }
  /**
   * @param KnowledgeAnswersTrackingNumberType
   */
  public function setTrackingNumberType(KnowledgeAnswersTrackingNumberType $trackingNumberType)
  {
    $this->trackingNumberType = $trackingNumberType;
  }
  /**
   * @return KnowledgeAnswersTrackingNumberType
   */
  public function getTrackingNumberType()
  {
    return $this->trackingNumberType;
  }
  /**
   * @param KnowledgeAnswersTypeTrait
   */
  public function setWithTrait(KnowledgeAnswersTypeTrait $withTrait)
  {
    $this->withTrait = $withTrait;
  }
  /**
   * @return KnowledgeAnswersTypeTrait
   */
  public function getWithTrait()
  {
    return $this->withTrait;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersValueType::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersValueType');

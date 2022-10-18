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

class NlpSemanticParsingLocalLocationElement extends \Google\Collection
{
  protected $collection_key = 'dialogReferents';
  protected $aliasIconType = PersonalizationMapsAliasIcon::class;
  protected $aliasIconDataType = 'array';
  /**
   * @var string
   */
  public $aliasLocation;
  protected $businessTypeType = NlpSemanticParsingLocalBusinessType::class;
  protected $businessTypeDataType = '';
  protected $contactLocationType = NlpSemanticParsingLocalContactLocation::class;
  protected $contactLocationDataType = '';
  protected $dialogReferentsType = NlpSemanticParsingModelsDialogReferentsDialogReferents::class;
  protected $dialogReferentsDataType = 'array';
  /**
   * @var string
   */
  public $directionalModifier;
  /**
   * @var bool
   */
  public $genericLocation;
  protected $hotelTypeType = NlpSemanticParsingLocalHotelType::class;
  protected $hotelTypeDataType = '';
  protected $hyperReliableDataType = NlpSemanticParsingLocalHyperReliableData::class;
  protected $hyperReliableDataDataType = '';
  protected $implicitLocalCategoryType = NlpSemanticParsingLocalImplicitLocalCategory::class;
  protected $implicitLocalCategoryDataType = '';
  protected $localResultIdType = NlpSemanticParsingLocalLocalResultId::class;
  protected $localResultIdDataType = '';
  /**
   * @var int
   */
  public $numBytes;
  /**
   * @var int
   */
  public $number;
  protected $personalReferenceLocationType = NlpSemanticParsingPersonalReferenceAnnotation::class;
  protected $personalReferenceLocationDataType = '';
  protected $qrefLocationType = NlpSemanticParsingQRefAnnotation::class;
  protected $qrefLocationDataType = '';
  protected $saftLocationType = NlpSemanticParsingSaftMentionAnnotation::class;
  protected $saftLocationDataType = '';
  /**
   * @var string
   */
  public $source;
  /**
   * @var int
   */
  public $startByte;
  /**
   * @var string
   */
  public $text;
  /**
   * @var string
   */
  public $transitLineNumber;
  /**
   * @var string
   */
  public $type;

  /**
   * @param PersonalizationMapsAliasIcon[]
   */
  public function setAliasIcon($aliasIcon)
  {
    $this->aliasIcon = $aliasIcon;
  }
  /**
   * @return PersonalizationMapsAliasIcon[]
   */
  public function getAliasIcon()
  {
    return $this->aliasIcon;
  }
  /**
   * @param string
   */
  public function setAliasLocation($aliasLocation)
  {
    $this->aliasLocation = $aliasLocation;
  }
  /**
   * @return string
   */
  public function getAliasLocation()
  {
    return $this->aliasLocation;
  }
  /**
   * @param NlpSemanticParsingLocalBusinessType
   */
  public function setBusinessType(NlpSemanticParsingLocalBusinessType $businessType)
  {
    $this->businessType = $businessType;
  }
  /**
   * @return NlpSemanticParsingLocalBusinessType
   */
  public function getBusinessType()
  {
    return $this->businessType;
  }
  /**
   * @param NlpSemanticParsingLocalContactLocation
   */
  public function setContactLocation(NlpSemanticParsingLocalContactLocation $contactLocation)
  {
    $this->contactLocation = $contactLocation;
  }
  /**
   * @return NlpSemanticParsingLocalContactLocation
   */
  public function getContactLocation()
  {
    return $this->contactLocation;
  }
  /**
   * @param NlpSemanticParsingModelsDialogReferentsDialogReferents[]
   */
  public function setDialogReferents($dialogReferents)
  {
    $this->dialogReferents = $dialogReferents;
  }
  /**
   * @return NlpSemanticParsingModelsDialogReferentsDialogReferents[]
   */
  public function getDialogReferents()
  {
    return $this->dialogReferents;
  }
  /**
   * @param string
   */
  public function setDirectionalModifier($directionalModifier)
  {
    $this->directionalModifier = $directionalModifier;
  }
  /**
   * @return string
   */
  public function getDirectionalModifier()
  {
    return $this->directionalModifier;
  }
  /**
   * @param bool
   */
  public function setGenericLocation($genericLocation)
  {
    $this->genericLocation = $genericLocation;
  }
  /**
   * @return bool
   */
  public function getGenericLocation()
  {
    return $this->genericLocation;
  }
  /**
   * @param NlpSemanticParsingLocalHotelType
   */
  public function setHotelType(NlpSemanticParsingLocalHotelType $hotelType)
  {
    $this->hotelType = $hotelType;
  }
  /**
   * @return NlpSemanticParsingLocalHotelType
   */
  public function getHotelType()
  {
    return $this->hotelType;
  }
  /**
   * @param NlpSemanticParsingLocalHyperReliableData
   */
  public function setHyperReliableData(NlpSemanticParsingLocalHyperReliableData $hyperReliableData)
  {
    $this->hyperReliableData = $hyperReliableData;
  }
  /**
   * @return NlpSemanticParsingLocalHyperReliableData
   */
  public function getHyperReliableData()
  {
    return $this->hyperReliableData;
  }
  /**
   * @param NlpSemanticParsingLocalImplicitLocalCategory
   */
  public function setImplicitLocalCategory(NlpSemanticParsingLocalImplicitLocalCategory $implicitLocalCategory)
  {
    $this->implicitLocalCategory = $implicitLocalCategory;
  }
  /**
   * @return NlpSemanticParsingLocalImplicitLocalCategory
   */
  public function getImplicitLocalCategory()
  {
    return $this->implicitLocalCategory;
  }
  /**
   * @param NlpSemanticParsingLocalLocalResultId
   */
  public function setLocalResultId(NlpSemanticParsingLocalLocalResultId $localResultId)
  {
    $this->localResultId = $localResultId;
  }
  /**
   * @return NlpSemanticParsingLocalLocalResultId
   */
  public function getLocalResultId()
  {
    return $this->localResultId;
  }
  /**
   * @param int
   */
  public function setNumBytes($numBytes)
  {
    $this->numBytes = $numBytes;
  }
  /**
   * @return int
   */
  public function getNumBytes()
  {
    return $this->numBytes;
  }
  /**
   * @param int
   */
  public function setNumber($number)
  {
    $this->number = $number;
  }
  /**
   * @return int
   */
  public function getNumber()
  {
    return $this->number;
  }
  /**
   * @param NlpSemanticParsingPersonalReferenceAnnotation
   */
  public function setPersonalReferenceLocation(NlpSemanticParsingPersonalReferenceAnnotation $personalReferenceLocation)
  {
    $this->personalReferenceLocation = $personalReferenceLocation;
  }
  /**
   * @return NlpSemanticParsingPersonalReferenceAnnotation
   */
  public function getPersonalReferenceLocation()
  {
    return $this->personalReferenceLocation;
  }
  /**
   * @param NlpSemanticParsingQRefAnnotation
   */
  public function setQrefLocation(NlpSemanticParsingQRefAnnotation $qrefLocation)
  {
    $this->qrefLocation = $qrefLocation;
  }
  /**
   * @return NlpSemanticParsingQRefAnnotation
   */
  public function getQrefLocation()
  {
    return $this->qrefLocation;
  }
  /**
   * @param NlpSemanticParsingSaftMentionAnnotation
   */
  public function setSaftLocation(NlpSemanticParsingSaftMentionAnnotation $saftLocation)
  {
    $this->saftLocation = $saftLocation;
  }
  /**
   * @return NlpSemanticParsingSaftMentionAnnotation
   */
  public function getSaftLocation()
  {
    return $this->saftLocation;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param int
   */
  public function setStartByte($startByte)
  {
    $this->startByte = $startByte;
  }
  /**
   * @return int
   */
  public function getStartByte()
  {
    return $this->startByte;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param string
   */
  public function setTransitLineNumber($transitLineNumber)
  {
    $this->transitLineNumber = $transitLineNumber;
  }
  /**
   * @return string
   */
  public function getTransitLineNumber()
  {
    return $this->transitLineNumber;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingLocalLocationElement::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingLocalLocationElement');

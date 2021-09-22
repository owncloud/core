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

namespace Google\Service\Dfareporting;

class CreativeAssetMetadata extends \Google\Collection
{
  protected $collection_key = 'warnedValidationRules';
  protected $assetIdentifierType = CreativeAssetId::class;
  protected $assetIdentifierDataType = '';
  protected $clickTagsType = ClickTag::class;
  protected $clickTagsDataType = 'array';
  protected $counterCustomEventsType = CreativeCustomEvent::class;
  protected $counterCustomEventsDataType = 'array';
  public $detectedFeatures;
  protected $exitCustomEventsType = CreativeCustomEvent::class;
  protected $exitCustomEventsDataType = 'array';
  public $id;
  protected $idDimensionValueType = DimensionValue::class;
  protected $idDimensionValueDataType = '';
  public $kind;
  public $richMedia;
  protected $timerCustomEventsType = CreativeCustomEvent::class;
  protected $timerCustomEventsDataType = 'array';
  public $warnedValidationRules;

  /**
   * @param CreativeAssetId
   */
  public function setAssetIdentifier(CreativeAssetId $assetIdentifier)
  {
    $this->assetIdentifier = $assetIdentifier;
  }
  /**
   * @return CreativeAssetId
   */
  public function getAssetIdentifier()
  {
    return $this->assetIdentifier;
  }
  /**
   * @param ClickTag[]
   */
  public function setClickTags($clickTags)
  {
    $this->clickTags = $clickTags;
  }
  /**
   * @return ClickTag[]
   */
  public function getClickTags()
  {
    return $this->clickTags;
  }
  /**
   * @param CreativeCustomEvent[]
   */
  public function setCounterCustomEvents($counterCustomEvents)
  {
    $this->counterCustomEvents = $counterCustomEvents;
  }
  /**
   * @return CreativeCustomEvent[]
   */
  public function getCounterCustomEvents()
  {
    return $this->counterCustomEvents;
  }
  public function setDetectedFeatures($detectedFeatures)
  {
    $this->detectedFeatures = $detectedFeatures;
  }
  public function getDetectedFeatures()
  {
    return $this->detectedFeatures;
  }
  /**
   * @param CreativeCustomEvent[]
   */
  public function setExitCustomEvents($exitCustomEvents)
  {
    $this->exitCustomEvents = $exitCustomEvents;
  }
  /**
   * @return CreativeCustomEvent[]
   */
  public function getExitCustomEvents()
  {
    return $this->exitCustomEvents;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param DimensionValue
   */
  public function setIdDimensionValue(DimensionValue $idDimensionValue)
  {
    $this->idDimensionValue = $idDimensionValue;
  }
  /**
   * @return DimensionValue
   */
  public function getIdDimensionValue()
  {
    return $this->idDimensionValue;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setRichMedia($richMedia)
  {
    $this->richMedia = $richMedia;
  }
  public function getRichMedia()
  {
    return $this->richMedia;
  }
  /**
   * @param CreativeCustomEvent[]
   */
  public function setTimerCustomEvents($timerCustomEvents)
  {
    $this->timerCustomEvents = $timerCustomEvents;
  }
  /**
   * @return CreativeCustomEvent[]
   */
  public function getTimerCustomEvents()
  {
    return $this->timerCustomEvents;
  }
  public function setWarnedValidationRules($warnedValidationRules)
  {
    $this->warnedValidationRules = $warnedValidationRules;
  }
  public function getWarnedValidationRules()
  {
    return $this->warnedValidationRules;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreativeAssetMetadata::class, 'Google_Service_Dfareporting_CreativeAssetMetadata');

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

class Google_Service_Dfareporting_CreativeAssetMetadata extends Google_Collection
{
  protected $collection_key = 'warnedValidationRules';
  protected $assetIdentifierType = 'Google_Service_Dfareporting_CreativeAssetId';
  protected $assetIdentifierDataType = '';
  protected $clickTagsType = 'Google_Service_Dfareporting_ClickTag';
  protected $clickTagsDataType = 'array';
  protected $counterCustomEventsType = 'Google_Service_Dfareporting_CreativeCustomEvent';
  protected $counterCustomEventsDataType = 'array';
  public $detectedFeatures;
  protected $exitCustomEventsType = 'Google_Service_Dfareporting_CreativeCustomEvent';
  protected $exitCustomEventsDataType = 'array';
  public $id;
  protected $idDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $idDimensionValueDataType = '';
  public $kind;
  public $richMedia;
  protected $timerCustomEventsType = 'Google_Service_Dfareporting_CreativeCustomEvent';
  protected $timerCustomEventsDataType = 'array';
  public $warnedValidationRules;

  /**
   * @param Google_Service_Dfareporting_CreativeAssetId
   */
  public function setAssetIdentifier(Google_Service_Dfareporting_CreativeAssetId $assetIdentifier)
  {
    $this->assetIdentifier = $assetIdentifier;
  }
  /**
   * @return Google_Service_Dfareporting_CreativeAssetId
   */
  public function getAssetIdentifier()
  {
    return $this->assetIdentifier;
  }
  /**
   * @param Google_Service_Dfareporting_ClickTag[]
   */
  public function setClickTags($clickTags)
  {
    $this->clickTags = $clickTags;
  }
  /**
   * @return Google_Service_Dfareporting_ClickTag[]
   */
  public function getClickTags()
  {
    return $this->clickTags;
  }
  /**
   * @param Google_Service_Dfareporting_CreativeCustomEvent[]
   */
  public function setCounterCustomEvents($counterCustomEvents)
  {
    $this->counterCustomEvents = $counterCustomEvents;
  }
  /**
   * @return Google_Service_Dfareporting_CreativeCustomEvent[]
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
   * @param Google_Service_Dfareporting_CreativeCustomEvent[]
   */
  public function setExitCustomEvents($exitCustomEvents)
  {
    $this->exitCustomEvents = $exitCustomEvents;
  }
  /**
   * @return Google_Service_Dfareporting_CreativeCustomEvent[]
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
   * @param Google_Service_Dfareporting_DimensionValue
   */
  public function setIdDimensionValue(Google_Service_Dfareporting_DimensionValue $idDimensionValue)
  {
    $this->idDimensionValue = $idDimensionValue;
  }
  /**
   * @return Google_Service_Dfareporting_DimensionValue
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
   * @param Google_Service_Dfareporting_CreativeCustomEvent[]
   */
  public function setTimerCustomEvents($timerCustomEvents)
  {
    $this->timerCustomEvents = $timerCustomEvents;
  }
  /**
   * @return Google_Service_Dfareporting_CreativeCustomEvent[]
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

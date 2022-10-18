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

class FreebaseValue extends \Google\Collection
{
  protected $collection_key = 'subgraphId';
  /**
   * @var bool
   */
  public $boolValue;
  protected $citationType = FreebaseCitation::class;
  protected $citationDataType = '';
  protected $compoundValueType = FreebaseTopic::class;
  protected $compoundValueDataType = '';
  protected $deletionProvenanceType = StorageGraphBfgTripleProvenance::class;
  protected $deletionProvenanceDataType = 'array';
  /**
   * @var string
   */
  public $displayLang;
  /**
   * @var string
   */
  public $displayValue;
  /**
   * @var string
   */
  public $expectedProto;
  public $floatValue;
  protected $idValueType = FreebaseId::class;
  protected $idValueDataType = '';
  /**
   * @var string
   */
  public $index;
  /**
   * @var string
   */
  public $intValue;
  /**
   * @var string
   */
  public $lang;
  protected $latLongValueType = FreebaseLatLong::class;
  protected $latLongValueDataType = '';
  protected $measurementValueType = FreebaseMeasurement::class;
  protected $measurementValueDataType = '';
  protected $nestedStructType = FreebaseNestedStruct::class;
  protected $nestedStructDataType = '';
  protected $provenanceType = StorageGraphBfgTripleProvenance::class;
  protected $provenanceDataType = 'array';
  /**
   * @var string
   */
  public $rawValue;
  /**
   * @var string
   */
  public $stringValue;
  /**
   * @var string[]
   */
  public $subgraphId;
  /**
   * @var string
   */
  public $timestamp;
  /**
   * @var string
   */
  public $timestampUsec;
  /**
   * @var string
   */
  public $type;

  /**
   * @param bool
   */
  public function setBoolValue($boolValue)
  {
    $this->boolValue = $boolValue;
  }
  /**
   * @return bool
   */
  public function getBoolValue()
  {
    return $this->boolValue;
  }
  /**
   * @param FreebaseCitation
   */
  public function setCitation(FreebaseCitation $citation)
  {
    $this->citation = $citation;
  }
  /**
   * @return FreebaseCitation
   */
  public function getCitation()
  {
    return $this->citation;
  }
  /**
   * @param FreebaseTopic
   */
  public function setCompoundValue(FreebaseTopic $compoundValue)
  {
    $this->compoundValue = $compoundValue;
  }
  /**
   * @return FreebaseTopic
   */
  public function getCompoundValue()
  {
    return $this->compoundValue;
  }
  /**
   * @param StorageGraphBfgTripleProvenance[]
   */
  public function setDeletionProvenance($deletionProvenance)
  {
    $this->deletionProvenance = $deletionProvenance;
  }
  /**
   * @return StorageGraphBfgTripleProvenance[]
   */
  public function getDeletionProvenance()
  {
    return $this->deletionProvenance;
  }
  /**
   * @param string
   */
  public function setDisplayLang($displayLang)
  {
    $this->displayLang = $displayLang;
  }
  /**
   * @return string
   */
  public function getDisplayLang()
  {
    return $this->displayLang;
  }
  /**
   * @param string
   */
  public function setDisplayValue($displayValue)
  {
    $this->displayValue = $displayValue;
  }
  /**
   * @return string
   */
  public function getDisplayValue()
  {
    return $this->displayValue;
  }
  /**
   * @param string
   */
  public function setExpectedProto($expectedProto)
  {
    $this->expectedProto = $expectedProto;
  }
  /**
   * @return string
   */
  public function getExpectedProto()
  {
    return $this->expectedProto;
  }
  public function setFloatValue($floatValue)
  {
    $this->floatValue = $floatValue;
  }
  public function getFloatValue()
  {
    return $this->floatValue;
  }
  /**
   * @param FreebaseId
   */
  public function setIdValue(FreebaseId $idValue)
  {
    $this->idValue = $idValue;
  }
  /**
   * @return FreebaseId
   */
  public function getIdValue()
  {
    return $this->idValue;
  }
  /**
   * @param string
   */
  public function setIndex($index)
  {
    $this->index = $index;
  }
  /**
   * @return string
   */
  public function getIndex()
  {
    return $this->index;
  }
  /**
   * @param string
   */
  public function setIntValue($intValue)
  {
    $this->intValue = $intValue;
  }
  /**
   * @return string
   */
  public function getIntValue()
  {
    return $this->intValue;
  }
  /**
   * @param string
   */
  public function setLang($lang)
  {
    $this->lang = $lang;
  }
  /**
   * @return string
   */
  public function getLang()
  {
    return $this->lang;
  }
  /**
   * @param FreebaseLatLong
   */
  public function setLatLongValue(FreebaseLatLong $latLongValue)
  {
    $this->latLongValue = $latLongValue;
  }
  /**
   * @return FreebaseLatLong
   */
  public function getLatLongValue()
  {
    return $this->latLongValue;
  }
  /**
   * @param FreebaseMeasurement
   */
  public function setMeasurementValue(FreebaseMeasurement $measurementValue)
  {
    $this->measurementValue = $measurementValue;
  }
  /**
   * @return FreebaseMeasurement
   */
  public function getMeasurementValue()
  {
    return $this->measurementValue;
  }
  /**
   * @param FreebaseNestedStruct
   */
  public function setNestedStruct(FreebaseNestedStruct $nestedStruct)
  {
    $this->nestedStruct = $nestedStruct;
  }
  /**
   * @return FreebaseNestedStruct
   */
  public function getNestedStruct()
  {
    return $this->nestedStruct;
  }
  /**
   * @param StorageGraphBfgTripleProvenance[]
   */
  public function setProvenance($provenance)
  {
    $this->provenance = $provenance;
  }
  /**
   * @return StorageGraphBfgTripleProvenance[]
   */
  public function getProvenance()
  {
    return $this->provenance;
  }
  /**
   * @param string
   */
  public function setRawValue($rawValue)
  {
    $this->rawValue = $rawValue;
  }
  /**
   * @return string
   */
  public function getRawValue()
  {
    return $this->rawValue;
  }
  /**
   * @param string
   */
  public function setStringValue($stringValue)
  {
    $this->stringValue = $stringValue;
  }
  /**
   * @return string
   */
  public function getStringValue()
  {
    return $this->stringValue;
  }
  /**
   * @param string[]
   */
  public function setSubgraphId($subgraphId)
  {
    $this->subgraphId = $subgraphId;
  }
  /**
   * @return string[]
   */
  public function getSubgraphId()
  {
    return $this->subgraphId;
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
  /**
   * @param string
   */
  public function setTimestampUsec($timestampUsec)
  {
    $this->timestampUsec = $timestampUsec;
  }
  /**
   * @return string
   */
  public function getTimestampUsec()
  {
    return $this->timestampUsec;
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
class_alias(FreebaseValue::class, 'Google_Service_Contentwarehouse_FreebaseValue');

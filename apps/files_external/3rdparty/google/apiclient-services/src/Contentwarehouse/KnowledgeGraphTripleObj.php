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

class KnowledgeGraphTripleObj extends \Google\Model
{
  /**
   * @var bool
   */
  public $boolValue;
  protected $datetimeValueType = KnowledgeGraphDateTimeProto::class;
  protected $datetimeValueDataType = '';
  public $doubleValue;
  /**
   * @var string
   */
  public $durationValue;
  /**
   * @var string
   */
  public $idValue;
  /**
   * @var string
   */
  public $int64Value;
  /**
   * @var string
   */
  public $locale;
  protected $nestedStructValueType = KnowledgeGraphNestedStruct::class;
  protected $nestedStructValueDataType = '';
  protected $protoValueType = KnowledgeGraphTripleObjProto::class;
  protected $protoValueDataType = '';
  /**
   * @var string
   */
  public $s2cellId;
  /**
   * @var string
   */
  public $stringValue;
  /**
   * @var string
   */
  public $uint64Value;
  /**
   * @var string
   */
  public $uriValue;

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
   * @param KnowledgeGraphDateTimeProto
   */
  public function setDatetimeValue(KnowledgeGraphDateTimeProto $datetimeValue)
  {
    $this->datetimeValue = $datetimeValue;
  }
  /**
   * @return KnowledgeGraphDateTimeProto
   */
  public function getDatetimeValue()
  {
    return $this->datetimeValue;
  }
  public function setDoubleValue($doubleValue)
  {
    $this->doubleValue = $doubleValue;
  }
  public function getDoubleValue()
  {
    return $this->doubleValue;
  }
  /**
   * @param string
   */
  public function setDurationValue($durationValue)
  {
    $this->durationValue = $durationValue;
  }
  /**
   * @return string
   */
  public function getDurationValue()
  {
    return $this->durationValue;
  }
  /**
   * @param string
   */
  public function setIdValue($idValue)
  {
    $this->idValue = $idValue;
  }
  /**
   * @return string
   */
  public function getIdValue()
  {
    return $this->idValue;
  }
  /**
   * @param string
   */
  public function setInt64Value($int64Value)
  {
    $this->int64Value = $int64Value;
  }
  /**
   * @return string
   */
  public function getInt64Value()
  {
    return $this->int64Value;
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
   * @param KnowledgeGraphNestedStruct
   */
  public function setNestedStructValue(KnowledgeGraphNestedStruct $nestedStructValue)
  {
    $this->nestedStructValue = $nestedStructValue;
  }
  /**
   * @return KnowledgeGraphNestedStruct
   */
  public function getNestedStructValue()
  {
    return $this->nestedStructValue;
  }
  /**
   * @param KnowledgeGraphTripleObjProto
   */
  public function setProtoValue(KnowledgeGraphTripleObjProto $protoValue)
  {
    $this->protoValue = $protoValue;
  }
  /**
   * @return KnowledgeGraphTripleObjProto
   */
  public function getProtoValue()
  {
    return $this->protoValue;
  }
  /**
   * @param string
   */
  public function setS2cellId($s2cellId)
  {
    $this->s2cellId = $s2cellId;
  }
  /**
   * @return string
   */
  public function getS2cellId()
  {
    return $this->s2cellId;
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
   * @param string
   */
  public function setUint64Value($uint64Value)
  {
    $this->uint64Value = $uint64Value;
  }
  /**
   * @return string
   */
  public function getUint64Value()
  {
    return $this->uint64Value;
  }
  /**
   * @param string
   */
  public function setUriValue($uriValue)
  {
    $this->uriValue = $uriValue;
  }
  /**
   * @return string
   */
  public function getUriValue()
  {
    return $this->uriValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeGraphTripleObj::class, 'Google_Service_Contentwarehouse_KnowledgeGraphTripleObj');

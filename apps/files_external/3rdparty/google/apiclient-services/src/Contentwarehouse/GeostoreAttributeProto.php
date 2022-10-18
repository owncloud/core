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

class GeostoreAttributeProto extends \Google\Collection
{
  protected $collection_key = 'valueDisplay';
  protected $applicationDataType = Proto2BridgeMessageSet::class;
  protected $applicationDataDataType = '';
  protected $attributeDisplayType = GeostoreAttributeValueDisplayProto::class;
  protected $attributeDisplayDataType = 'array';
  /**
   * @var bool
   */
  public $booleanValue;
  protected $canonicalAttributeIdType = GeostoreAttributeIdProto::class;
  protected $canonicalAttributeIdDataType = '';
  public $doubleValue;
  /**
   * @var string
   */
  public $enumIdValue;
  /**
   * @var float
   */
  public $floatValue;
  /**
   * @var string
   */
  public $int64Value;
  /**
   * @var int
   */
  public $integerValue;
  protected $itemClassIdType = GeostoreAttributeIdProto::class;
  protected $itemClassIdDataType = '';
  protected $metadataType = GeostoreFieldMetadataProto::class;
  protected $metadataDataType = '';
  protected $protoValueType = Proto2BridgeMessageSet::class;
  protected $protoValueDataType = '';
  /**
   * @var string
   */
  public $stringValue;
  /**
   * @var string
   */
  public $uint32Value;
  protected $valueDisplayType = GeostoreAttributeValueDisplayProto::class;
  protected $valueDisplayDataType = 'array';
  protected $valueSpaceIdType = GeostoreAttributeIdProto::class;
  protected $valueSpaceIdDataType = '';
  /**
   * @var string
   */
  public $valueType;

  /**
   * @param Proto2BridgeMessageSet
   */
  public function setApplicationData(Proto2BridgeMessageSet $applicationData)
  {
    $this->applicationData = $applicationData;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getApplicationData()
  {
    return $this->applicationData;
  }
  /**
   * @param GeostoreAttributeValueDisplayProto[]
   */
  public function setAttributeDisplay($attributeDisplay)
  {
    $this->attributeDisplay = $attributeDisplay;
  }
  /**
   * @return GeostoreAttributeValueDisplayProto[]
   */
  public function getAttributeDisplay()
  {
    return $this->attributeDisplay;
  }
  /**
   * @param bool
   */
  public function setBooleanValue($booleanValue)
  {
    $this->booleanValue = $booleanValue;
  }
  /**
   * @return bool
   */
  public function getBooleanValue()
  {
    return $this->booleanValue;
  }
  /**
   * @param GeostoreAttributeIdProto
   */
  public function setCanonicalAttributeId(GeostoreAttributeIdProto $canonicalAttributeId)
  {
    $this->canonicalAttributeId = $canonicalAttributeId;
  }
  /**
   * @return GeostoreAttributeIdProto
   */
  public function getCanonicalAttributeId()
  {
    return $this->canonicalAttributeId;
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
  public function setEnumIdValue($enumIdValue)
  {
    $this->enumIdValue = $enumIdValue;
  }
  /**
   * @return string
   */
  public function getEnumIdValue()
  {
    return $this->enumIdValue;
  }
  /**
   * @param float
   */
  public function setFloatValue($floatValue)
  {
    $this->floatValue = $floatValue;
  }
  /**
   * @return float
   */
  public function getFloatValue()
  {
    return $this->floatValue;
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
   * @param int
   */
  public function setIntegerValue($integerValue)
  {
    $this->integerValue = $integerValue;
  }
  /**
   * @return int
   */
  public function getIntegerValue()
  {
    return $this->integerValue;
  }
  /**
   * @param GeostoreAttributeIdProto
   */
  public function setItemClassId(GeostoreAttributeIdProto $itemClassId)
  {
    $this->itemClassId = $itemClassId;
  }
  /**
   * @return GeostoreAttributeIdProto
   */
  public function getItemClassId()
  {
    return $this->itemClassId;
  }
  /**
   * @param GeostoreFieldMetadataProto
   */
  public function setMetadata(GeostoreFieldMetadataProto $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return GeostoreFieldMetadataProto
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setProtoValue(Proto2BridgeMessageSet $protoValue)
  {
    $this->protoValue = $protoValue;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getProtoValue()
  {
    return $this->protoValue;
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
  public function setUint32Value($uint32Value)
  {
    $this->uint32Value = $uint32Value;
  }
  /**
   * @return string
   */
  public function getUint32Value()
  {
    return $this->uint32Value;
  }
  /**
   * @param GeostoreAttributeValueDisplayProto[]
   */
  public function setValueDisplay($valueDisplay)
  {
    $this->valueDisplay = $valueDisplay;
  }
  /**
   * @return GeostoreAttributeValueDisplayProto[]
   */
  public function getValueDisplay()
  {
    return $this->valueDisplay;
  }
  /**
   * @param GeostoreAttributeIdProto
   */
  public function setValueSpaceId(GeostoreAttributeIdProto $valueSpaceId)
  {
    $this->valueSpaceId = $valueSpaceId;
  }
  /**
   * @return GeostoreAttributeIdProto
   */
  public function getValueSpaceId()
  {
    return $this->valueSpaceId;
  }
  /**
   * @param string
   */
  public function setValueType($valueType)
  {
    $this->valueType = $valueType;
  }
  /**
   * @return string
   */
  public function getValueType()
  {
    return $this->valueType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreAttributeProto::class, 'Google_Service_Contentwarehouse_GeostoreAttributeProto');

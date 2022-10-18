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

class GeostoreAddressComponentProto extends \Google\Collection
{
  protected $collection_key = 'textAffix';
  protected $featureIdType = GeostoreFeatureIdProto::class;
  protected $featureIdDataType = '';
  /**
   * @var int
   */
  public $featureType;
  /**
   * @var int
   */
  public $index;
  protected $parsedNameType = GeostoreNameProto::class;
  protected $parsedNameDataType = 'array';
  protected $rangeType = GeostoreAddressRangeProto::class;
  protected $rangeDataType = '';
  protected $temporaryDataType = Proto2BridgeMessageSet::class;
  protected $temporaryDataDataType = '';
  protected $textAffixType = GeostoreTextAffixProto::class;
  protected $textAffixDataType = 'array';
  /**
   * @var string
   */
  public $type;

  /**
   * @param GeostoreFeatureIdProto
   */
  public function setFeatureId(GeostoreFeatureIdProto $featureId)
  {
    $this->featureId = $featureId;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getFeatureId()
  {
    return $this->featureId;
  }
  /**
   * @param int
   */
  public function setFeatureType($featureType)
  {
    $this->featureType = $featureType;
  }
  /**
   * @return int
   */
  public function getFeatureType()
  {
    return $this->featureType;
  }
  /**
   * @param int
   */
  public function setIndex($index)
  {
    $this->index = $index;
  }
  /**
   * @return int
   */
  public function getIndex()
  {
    return $this->index;
  }
  /**
   * @param GeostoreNameProto[]
   */
  public function setParsedName($parsedName)
  {
    $this->parsedName = $parsedName;
  }
  /**
   * @return GeostoreNameProto[]
   */
  public function getParsedName()
  {
    return $this->parsedName;
  }
  /**
   * @param GeostoreAddressRangeProto
   */
  public function setRange(GeostoreAddressRangeProto $range)
  {
    $this->range = $range;
  }
  /**
   * @return GeostoreAddressRangeProto
   */
  public function getRange()
  {
    return $this->range;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setTemporaryData(Proto2BridgeMessageSet $temporaryData)
  {
    $this->temporaryData = $temporaryData;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getTemporaryData()
  {
    return $this->temporaryData;
  }
  /**
   * @param GeostoreTextAffixProto[]
   */
  public function setTextAffix($textAffix)
  {
    $this->textAffix = $textAffix;
  }
  /**
   * @return GeostoreTextAffixProto[]
   */
  public function getTextAffix()
  {
    return $this->textAffix;
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
class_alias(GeostoreAddressComponentProto::class, 'Google_Service_Contentwarehouse_GeostoreAddressComponentProto');

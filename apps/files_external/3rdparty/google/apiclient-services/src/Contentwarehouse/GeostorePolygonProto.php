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

class GeostorePolygonProto extends \Google\Collection
{
  protected $collection_key = 'loop';
  /**
   * @var float
   */
  public $baseMeters;
  /**
   * @var string
   */
  public $cellId;
  /**
   * @var string
   */
  public $encoded;
  /**
   * @var float
   */
  public $heightMeters;
  protected $loopType = GeostorePolyLineProto::class;
  protected $loopDataType = 'array';
  protected $metadataType = GeostoreFieldMetadataProto::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $shapeId;
  protected $temporaryDataType = Proto2BridgeMessageSet::class;
  protected $temporaryDataDataType = '';
  /**
   * @var bool
   */
  public $unsuitableForDisplay;

  /**
   * @param float
   */
  public function setBaseMeters($baseMeters)
  {
    $this->baseMeters = $baseMeters;
  }
  /**
   * @return float
   */
  public function getBaseMeters()
  {
    return $this->baseMeters;
  }
  /**
   * @param string
   */
  public function setCellId($cellId)
  {
    $this->cellId = $cellId;
  }
  /**
   * @return string
   */
  public function getCellId()
  {
    return $this->cellId;
  }
  /**
   * @param string
   */
  public function setEncoded($encoded)
  {
    $this->encoded = $encoded;
  }
  /**
   * @return string
   */
  public function getEncoded()
  {
    return $this->encoded;
  }
  /**
   * @param float
   */
  public function setHeightMeters($heightMeters)
  {
    $this->heightMeters = $heightMeters;
  }
  /**
   * @return float
   */
  public function getHeightMeters()
  {
    return $this->heightMeters;
  }
  /**
   * @param GeostorePolyLineProto[]
   */
  public function setLoop($loop)
  {
    $this->loop = $loop;
  }
  /**
   * @return GeostorePolyLineProto[]
   */
  public function getLoop()
  {
    return $this->loop;
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
   * @param string
   */
  public function setShapeId($shapeId)
  {
    $this->shapeId = $shapeId;
  }
  /**
   * @return string
   */
  public function getShapeId()
  {
    return $this->shapeId;
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
   * @param bool
   */
  public function setUnsuitableForDisplay($unsuitableForDisplay)
  {
    $this->unsuitableForDisplay = $unsuitableForDisplay;
  }
  /**
   * @return bool
   */
  public function getUnsuitableForDisplay()
  {
    return $this->unsuitableForDisplay;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostorePolygonProto::class, 'Google_Service_Contentwarehouse_GeostorePolygonProto');

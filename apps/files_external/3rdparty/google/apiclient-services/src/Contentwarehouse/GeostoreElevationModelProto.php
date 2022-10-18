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

class GeostoreElevationModelProto extends \Google\Model
{
  /**
   * @var int
   */
  public $blendOrder;
  /**
   * @var int
   */
  public $dataLevel;
  /**
   * @var int
   */
  public $dataMaxlevel;
  protected $elevationDataType = Proto2BridgeMessageSet::class;
  protected $elevationDataDataType = '';
  /**
   * @var bool
   */
  public $fullChildDataAvailable;
  /**
   * @var bool
   */
  public $partialChildDataAvailable;

  /**
   * @param int
   */
  public function setBlendOrder($blendOrder)
  {
    $this->blendOrder = $blendOrder;
  }
  /**
   * @return int
   */
  public function getBlendOrder()
  {
    return $this->blendOrder;
  }
  /**
   * @param int
   */
  public function setDataLevel($dataLevel)
  {
    $this->dataLevel = $dataLevel;
  }
  /**
   * @return int
   */
  public function getDataLevel()
  {
    return $this->dataLevel;
  }
  /**
   * @param int
   */
  public function setDataMaxlevel($dataMaxlevel)
  {
    $this->dataMaxlevel = $dataMaxlevel;
  }
  /**
   * @return int
   */
  public function getDataMaxlevel()
  {
    return $this->dataMaxlevel;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setElevationData(Proto2BridgeMessageSet $elevationData)
  {
    $this->elevationData = $elevationData;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getElevationData()
  {
    return $this->elevationData;
  }
  /**
   * @param bool
   */
  public function setFullChildDataAvailable($fullChildDataAvailable)
  {
    $this->fullChildDataAvailable = $fullChildDataAvailable;
  }
  /**
   * @return bool
   */
  public function getFullChildDataAvailable()
  {
    return $this->fullChildDataAvailable;
  }
  /**
   * @param bool
   */
  public function setPartialChildDataAvailable($partialChildDataAvailable)
  {
    $this->partialChildDataAvailable = $partialChildDataAvailable;
  }
  /**
   * @return bool
   */
  public function getPartialChildDataAvailable()
  {
    return $this->partialChildDataAvailable;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreElevationModelProto::class, 'Google_Service_Contentwarehouse_GeostoreElevationModelProto');

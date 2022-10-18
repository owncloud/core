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

class GeostoreBorderProto extends \Google\Collection
{
  protected $collection_key = 'overrideStatus';
  protected $featureIdLeftType = GeostoreFeatureIdProto::class;
  protected $featureIdLeftDataType = '';
  protected $featureIdRightType = GeostoreFeatureIdProto::class;
  protected $featureIdRightDataType = '';
  protected $logicalBorderType = GeostoreFeatureIdProto::class;
  protected $logicalBorderDataType = 'array';
  protected $overrideStatusType = GeostoreOverrideBorderStatusProto::class;
  protected $overrideStatusDataType = 'array';
  /**
   * @var string
   */
  public $status;
  /**
   * @var int
   */
  public $type;

  /**
   * @param GeostoreFeatureIdProto
   */
  public function setFeatureIdLeft(GeostoreFeatureIdProto $featureIdLeft)
  {
    $this->featureIdLeft = $featureIdLeft;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getFeatureIdLeft()
  {
    return $this->featureIdLeft;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setFeatureIdRight(GeostoreFeatureIdProto $featureIdRight)
  {
    $this->featureIdRight = $featureIdRight;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getFeatureIdRight()
  {
    return $this->featureIdRight;
  }
  /**
   * @param GeostoreFeatureIdProto[]
   */
  public function setLogicalBorder($logicalBorder)
  {
    $this->logicalBorder = $logicalBorder;
  }
  /**
   * @return GeostoreFeatureIdProto[]
   */
  public function getLogicalBorder()
  {
    return $this->logicalBorder;
  }
  /**
   * @param GeostoreOverrideBorderStatusProto[]
   */
  public function setOverrideStatus($overrideStatus)
  {
    $this->overrideStatus = $overrideStatus;
  }
  /**
   * @return GeostoreOverrideBorderStatusProto[]
   */
  public function getOverrideStatus()
  {
    return $this->overrideStatus;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param int
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return int
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreBorderProto::class, 'Google_Service_Contentwarehouse_GeostoreBorderProto');

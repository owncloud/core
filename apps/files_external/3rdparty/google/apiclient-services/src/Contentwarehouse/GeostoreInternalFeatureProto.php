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

class GeostoreInternalFeatureProto extends \Google\Model
{
  /**
   * @var string
   */
  public $polygonShapeId;
  /**
   * @var string
   */
  public $restOfWorldPolygonShapeId;
  protected $rightsStatusType = GeostoreRightsStatusProto::class;
  protected $rightsStatusDataType = '';
  /**
   * @var string
   */
  public $selfPolygonShapeId;
  protected $trustType = GeostoreTrustSignalsProto::class;
  protected $trustDataType = '';
  /**
   * @var string
   */
  public $waterRemovedPolygonShapeId;

  /**
   * @param string
   */
  public function setPolygonShapeId($polygonShapeId)
  {
    $this->polygonShapeId = $polygonShapeId;
  }
  /**
   * @return string
   */
  public function getPolygonShapeId()
  {
    return $this->polygonShapeId;
  }
  /**
   * @param string
   */
  public function setRestOfWorldPolygonShapeId($restOfWorldPolygonShapeId)
  {
    $this->restOfWorldPolygonShapeId = $restOfWorldPolygonShapeId;
  }
  /**
   * @return string
   */
  public function getRestOfWorldPolygonShapeId()
  {
    return $this->restOfWorldPolygonShapeId;
  }
  /**
   * @param GeostoreRightsStatusProto
   */
  public function setRightsStatus(GeostoreRightsStatusProto $rightsStatus)
  {
    $this->rightsStatus = $rightsStatus;
  }
  /**
   * @return GeostoreRightsStatusProto
   */
  public function getRightsStatus()
  {
    return $this->rightsStatus;
  }
  /**
   * @param string
   */
  public function setSelfPolygonShapeId($selfPolygonShapeId)
  {
    $this->selfPolygonShapeId = $selfPolygonShapeId;
  }
  /**
   * @return string
   */
  public function getSelfPolygonShapeId()
  {
    return $this->selfPolygonShapeId;
  }
  /**
   * @param GeostoreTrustSignalsProto
   */
  public function setTrust(GeostoreTrustSignalsProto $trust)
  {
    $this->trust = $trust;
  }
  /**
   * @return GeostoreTrustSignalsProto
   */
  public function getTrust()
  {
    return $this->trust;
  }
  /**
   * @param string
   */
  public function setWaterRemovedPolygonShapeId($waterRemovedPolygonShapeId)
  {
    $this->waterRemovedPolygonShapeId = $waterRemovedPolygonShapeId;
  }
  /**
   * @return string
   */
  public function getWaterRemovedPolygonShapeId()
  {
    return $this->waterRemovedPolygonShapeId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreInternalFeatureProto::class, 'Google_Service_Contentwarehouse_GeostoreInternalFeatureProto');

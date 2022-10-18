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

class GeostoreSweepProto extends \Google\Model
{
  protected $otherSegmentFeatureIdType = GeostoreFeatureIdProto::class;
  protected $otherSegmentFeatureIdDataType = '';
  protected $polygonType = GeostorePolygonProto::class;
  protected $polygonDataType = '';
  protected $sweepCurveType = GeostoreCurveConnectionProto::class;
  protected $sweepCurveDataType = '';
  /**
   * @var string
   */
  public $sweepToken;

  /**
   * @param GeostoreFeatureIdProto
   */
  public function setOtherSegmentFeatureId(GeostoreFeatureIdProto $otherSegmentFeatureId)
  {
    $this->otherSegmentFeatureId = $otherSegmentFeatureId;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getOtherSegmentFeatureId()
  {
    return $this->otherSegmentFeatureId;
  }
  /**
   * @param GeostorePolygonProto
   */
  public function setPolygon(GeostorePolygonProto $polygon)
  {
    $this->polygon = $polygon;
  }
  /**
   * @return GeostorePolygonProto
   */
  public function getPolygon()
  {
    return $this->polygon;
  }
  /**
   * @param GeostoreCurveConnectionProto
   */
  public function setSweepCurve(GeostoreCurveConnectionProto $sweepCurve)
  {
    $this->sweepCurve = $sweepCurve;
  }
  /**
   * @return GeostoreCurveConnectionProto
   */
  public function getSweepCurve()
  {
    return $this->sweepCurve;
  }
  /**
   * @param string
   */
  public function setSweepToken($sweepToken)
  {
    $this->sweepToken = $sweepToken;
  }
  /**
   * @return string
   */
  public function getSweepToken()
  {
    return $this->sweepToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreSweepProto::class, 'Google_Service_Contentwarehouse_GeostoreSweepProto');

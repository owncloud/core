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

class GeostoreCurveConnectionProto extends \Google\Model
{
  protected $bezierParamsType = GeostoreCurveConnectionProtoBezierParams::class;
  protected $bezierParamsDataType = '';
  protected $circleParamsType = GeostoreCurveConnectionProtoCircleParams::class;
  protected $circleParamsDataType = '';
  /**
   * @var string
   */
  public $type;

  /**
   * @param GeostoreCurveConnectionProtoBezierParams
   */
  public function setBezierParams(GeostoreCurveConnectionProtoBezierParams $bezierParams)
  {
    $this->bezierParams = $bezierParams;
  }
  /**
   * @return GeostoreCurveConnectionProtoBezierParams
   */
  public function getBezierParams()
  {
    return $this->bezierParams;
  }
  /**
   * @param GeostoreCurveConnectionProtoCircleParams
   */
  public function setCircleParams(GeostoreCurveConnectionProtoCircleParams $circleParams)
  {
    $this->circleParams = $circleParams;
  }
  /**
   * @return GeostoreCurveConnectionProtoCircleParams
   */
  public function getCircleParams()
  {
    return $this->circleParams;
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
class_alias(GeostoreCurveConnectionProto::class, 'Google_Service_Contentwarehouse_GeostoreCurveConnectionProto');

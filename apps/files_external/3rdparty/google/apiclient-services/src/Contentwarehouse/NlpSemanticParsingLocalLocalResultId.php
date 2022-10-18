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

class NlpSemanticParsingLocalLocalResultId extends \Google\Model
{
  protected $featureIdType = GeostoreFeatureIdProto::class;
  protected $featureIdDataType = '';
  /**
   * @var string
   */
  public $geocodingAddress;
  /**
   * @var string
   */
  public $kgMid;
  protected $positionType = GeostorePointProto::class;
  protected $positionDataType = '';
  protected $rectType = GeostoreRectProto::class;
  protected $rectDataType = '';

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
   * @param string
   */
  public function setGeocodingAddress($geocodingAddress)
  {
    $this->geocodingAddress = $geocodingAddress;
  }
  /**
   * @return string
   */
  public function getGeocodingAddress()
  {
    return $this->geocodingAddress;
  }
  /**
   * @param string
   */
  public function setKgMid($kgMid)
  {
    $this->kgMid = $kgMid;
  }
  /**
   * @return string
   */
  public function getKgMid()
  {
    return $this->kgMid;
  }
  /**
   * @param GeostorePointProto
   */
  public function setPosition(GeostorePointProto $position)
  {
    $this->position = $position;
  }
  /**
   * @return GeostorePointProto
   */
  public function getPosition()
  {
    return $this->position;
  }
  /**
   * @param GeostoreRectProto
   */
  public function setRect(GeostoreRectProto $rect)
  {
    $this->rect = $rect;
  }
  /**
   * @return GeostoreRectProto
   */
  public function getRect()
  {
    return $this->rect;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingLocalLocalResultId::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingLocalLocalResultId');

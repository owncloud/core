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

class VideoAmbisonicsAmbisonicsMetadata extends \Google\Collection
{
  protected $collection_key = 'channelMap';
  /**
   * @var int[]
   */
  public $channelMap;
  /**
   * @var string
   */
  public $channelOrdering;
  /**
   * @var bool
   */
  public $nonDiegeticStereo;
  /**
   * @var string
   */
  public $normalization;
  /**
   * @var int
   */
  public $numChannels;
  /**
   * @var int
   */
  public $order;
  /**
   * @var string
   */
  public $type;
  /**
   * @var int
   */
  public $version;

  /**
   * @param int[]
   */
  public function setChannelMap($channelMap)
  {
    $this->channelMap = $channelMap;
  }
  /**
   * @return int[]
   */
  public function getChannelMap()
  {
    return $this->channelMap;
  }
  /**
   * @param string
   */
  public function setChannelOrdering($channelOrdering)
  {
    $this->channelOrdering = $channelOrdering;
  }
  /**
   * @return string
   */
  public function getChannelOrdering()
  {
    return $this->channelOrdering;
  }
  /**
   * @param bool
   */
  public function setNonDiegeticStereo($nonDiegeticStereo)
  {
    $this->nonDiegeticStereo = $nonDiegeticStereo;
  }
  /**
   * @return bool
   */
  public function getNonDiegeticStereo()
  {
    return $this->nonDiegeticStereo;
  }
  /**
   * @param string
   */
  public function setNormalization($normalization)
  {
    $this->normalization = $normalization;
  }
  /**
   * @return string
   */
  public function getNormalization()
  {
    return $this->normalization;
  }
  /**
   * @param int
   */
  public function setNumChannels($numChannels)
  {
    $this->numChannels = $numChannels;
  }
  /**
   * @return int
   */
  public function getNumChannels()
  {
    return $this->numChannels;
  }
  /**
   * @param int
   */
  public function setOrder($order)
  {
    $this->order = $order;
  }
  /**
   * @return int
   */
  public function getOrder()
  {
    return $this->order;
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
  /**
   * @param int
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return int
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoAmbisonicsAmbisonicsMetadata::class, 'Google_Service_Contentwarehouse_VideoAmbisonicsAmbisonicsMetadata');

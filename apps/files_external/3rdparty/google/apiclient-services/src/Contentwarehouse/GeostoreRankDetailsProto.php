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

class GeostoreRankDetailsProto extends \Google\Collection
{
  protected $collection_key = 'signal';
  protected $signalType = GeostoreRankSignalProto::class;
  protected $signalDataType = 'array';
  /**
   * @var string
   */
  public $signalMixerType;

  /**
   * @param GeostoreRankSignalProto[]
   */
  public function setSignal($signal)
  {
    $this->signal = $signal;
  }
  /**
   * @return GeostoreRankSignalProto[]
   */
  public function getSignal()
  {
    return $this->signal;
  }
  /**
   * @param string
   */
  public function setSignalMixerType($signalMixerType)
  {
    $this->signalMixerType = $signalMixerType;
  }
  /**
   * @return string
   */
  public function getSignalMixerType()
  {
    return $this->signalMixerType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreRankDetailsProto::class, 'Google_Service_Contentwarehouse_GeostoreRankDetailsProto');

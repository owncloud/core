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

namespace Google\Service\CloudSearch;

class DeliveryMedium extends \Google\Model
{
  /**
   * @var string
   */
  public $mediumType;
  protected $selfPhoneType = VoicePhoneNumber::class;
  protected $selfPhoneDataType = '';

  /**
   * @param string
   */
  public function setMediumType($mediumType)
  {
    $this->mediumType = $mediumType;
  }
  /**
   * @return string
   */
  public function getMediumType()
  {
    return $this->mediumType;
  }
  /**
   * @param VoicePhoneNumber
   */
  public function setSelfPhone(VoicePhoneNumber $selfPhone)
  {
    $this->selfPhone = $selfPhone;
  }
  /**
   * @return VoicePhoneNumber
   */
  public function getSelfPhone()
  {
    return $this->selfPhone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeliveryMedium::class, 'Google_Service_CloudSearch_DeliveryMedium');

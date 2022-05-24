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

namespace Google\Service\FirebaseCloudMessaging;

class LightSettings extends \Google\Model
{
  protected $colorType = Color::class;
  protected $colorDataType = '';
  /**
   * @var string
   */
  public $lightOffDuration;
  /**
   * @var string
   */
  public $lightOnDuration;

  /**
   * @param Color
   */
  public function setColor(Color $color)
  {
    $this->color = $color;
  }
  /**
   * @return Color
   */
  public function getColor()
  {
    return $this->color;
  }
  /**
   * @param string
   */
  public function setLightOffDuration($lightOffDuration)
  {
    $this->lightOffDuration = $lightOffDuration;
  }
  /**
   * @return string
   */
  public function getLightOffDuration()
  {
    return $this->lightOffDuration;
  }
  /**
   * @param string
   */
  public function setLightOnDuration($lightOnDuration)
  {
    $this->lightOnDuration = $lightOnDuration;
  }
  /**
   * @return string
   */
  public function getLightOnDuration()
  {
    return $this->lightOnDuration;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LightSettings::class, 'Google_Service_FirebaseCloudMessaging_LightSettings');

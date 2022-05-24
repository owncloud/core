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

namespace Google\Service\Transcoder;

class Audio extends \Google\Model
{
  /**
   * @var bool
   */
  public $highBoost;
  /**
   * @var bool
   */
  public $lowBoost;
  public $lufs;

  /**
   * @param bool
   */
  public function setHighBoost($highBoost)
  {
    $this->highBoost = $highBoost;
  }
  /**
   * @return bool
   */
  public function getHighBoost()
  {
    return $this->highBoost;
  }
  /**
   * @param bool
   */
  public function setLowBoost($lowBoost)
  {
    $this->lowBoost = $lowBoost;
  }
  /**
   * @return bool
   */
  public function getLowBoost()
  {
    return $this->lowBoost;
  }
  public function setLufs($lufs)
  {
    $this->lufs = $lufs;
  }
  public function getLufs()
  {
    return $this->lufs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Audio::class, 'Google_Service_Transcoder_Audio');

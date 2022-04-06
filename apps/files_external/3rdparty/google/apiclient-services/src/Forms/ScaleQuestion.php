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

namespace Google\Service\Forms;

class ScaleQuestion extends \Google\Model
{
  /**
   * @var int
   */
  public $high;
  /**
   * @var string
   */
  public $highLabel;
  /**
   * @var int
   */
  public $low;
  /**
   * @var string
   */
  public $lowLabel;

  /**
   * @param int
   */
  public function setHigh($high)
  {
    $this->high = $high;
  }
  /**
   * @return int
   */
  public function getHigh()
  {
    return $this->high;
  }
  /**
   * @param string
   */
  public function setHighLabel($highLabel)
  {
    $this->highLabel = $highLabel;
  }
  /**
   * @return string
   */
  public function getHighLabel()
  {
    return $this->highLabel;
  }
  /**
   * @param int
   */
  public function setLow($low)
  {
    $this->low = $low;
  }
  /**
   * @return int
   */
  public function getLow()
  {
    return $this->low;
  }
  /**
   * @param string
   */
  public function setLowLabel($lowLabel)
  {
    $this->lowLabel = $lowLabel;
  }
  /**
   * @return string
   */
  public function getLowLabel()
  {
    return $this->lowLabel;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ScaleQuestion::class, 'Google_Service_Forms_ScaleQuestion');

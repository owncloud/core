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

class TitleSizeParams extends \Google\Model
{
  /**
   * @var int
   */
  public $muppetTitleLengthInDeciems;
  /**
   * @var int
   */
  public $muppetTitleNumLines;

  /**
   * @param int
   */
  public function setMuppetTitleLengthInDeciems($muppetTitleLengthInDeciems)
  {
    $this->muppetTitleLengthInDeciems = $muppetTitleLengthInDeciems;
  }
  /**
   * @return int
   */
  public function getMuppetTitleLengthInDeciems()
  {
    return $this->muppetTitleLengthInDeciems;
  }
  /**
   * @param int
   */
  public function setMuppetTitleNumLines($muppetTitleNumLines)
  {
    $this->muppetTitleNumLines = $muppetTitleNumLines;
  }
  /**
   * @return int
   */
  public function getMuppetTitleNumLines()
  {
    return $this->muppetTitleNumLines;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TitleSizeParams::class, 'Google_Service_Contentwarehouse_TitleSizeParams');

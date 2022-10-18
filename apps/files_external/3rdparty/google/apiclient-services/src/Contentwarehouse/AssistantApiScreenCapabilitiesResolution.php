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

class AssistantApiScreenCapabilitiesResolution extends \Google\Model
{
  /**
   * @var int
   */
  public $dpi;
  /**
   * @var int
   */
  public $heightPx;
  /**
   * @var int
   */
  public $mSize;
  /**
   * @var int
   */
  public $nengSize;
  /**
   * @var int
   */
  public $widthPx;

  /**
   * @param int
   */
  public function setDpi($dpi)
  {
    $this->dpi = $dpi;
  }
  /**
   * @return int
   */
  public function getDpi()
  {
    return $this->dpi;
  }
  /**
   * @param int
   */
  public function setHeightPx($heightPx)
  {
    $this->heightPx = $heightPx;
  }
  /**
   * @return int
   */
  public function getHeightPx()
  {
    return $this->heightPx;
  }
  /**
   * @param int
   */
  public function setMSize($mSize)
  {
    $this->mSize = $mSize;
  }
  /**
   * @return int
   */
  public function getMSize()
  {
    return $this->mSize;
  }
  /**
   * @param int
   */
  public function setNengSize($nengSize)
  {
    $this->nengSize = $nengSize;
  }
  /**
   * @return int
   */
  public function getNengSize()
  {
    return $this->nengSize;
  }
  /**
   * @param int
   */
  public function setWidthPx($widthPx)
  {
    $this->widthPx = $widthPx;
  }
  /**
   * @return int
   */
  public function getWidthPx()
  {
    return $this->widthPx;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiScreenCapabilitiesResolution::class, 'Google_Service_Contentwarehouse_AssistantApiScreenCapabilitiesResolution');

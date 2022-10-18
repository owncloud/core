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

class OcrPhotoCurvedBoundingBox extends \Google\Model
{
  protected $midLineCurveType = OcrPhotoCurve::class;
  protected $midLineCurveDataType = '';
  public $thickness;
  /**
   * @var bool
   */
  public $topToBottom;

  /**
   * @param OcrPhotoCurve
   */
  public function setMidLineCurve(OcrPhotoCurve $midLineCurve)
  {
    $this->midLineCurve = $midLineCurve;
  }
  /**
   * @return OcrPhotoCurve
   */
  public function getMidLineCurve()
  {
    return $this->midLineCurve;
  }
  public function setThickness($thickness)
  {
    $this->thickness = $thickness;
  }
  public function getThickness()
  {
    return $this->thickness;
  }
  /**
   * @param bool
   */
  public function setTopToBottom($topToBottom)
  {
    $this->topToBottom = $topToBottom;
  }
  /**
   * @return bool
   */
  public function getTopToBottom()
  {
    return $this->topToBottom;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OcrPhotoCurvedBoundingBox::class, 'Google_Service_Contentwarehouse_OcrPhotoCurvedBoundingBox');

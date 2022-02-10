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

namespace Google\Service\Sheets;

class BasicChartAxis extends \Google\Model
{
  protected $formatType = TextFormat::class;
  protected $formatDataType = '';
  /**
   * @var string
   */
  public $position;
  /**
   * @var string
   */
  public $title;
  protected $titleTextPositionType = TextPosition::class;
  protected $titleTextPositionDataType = '';
  protected $viewWindowOptionsType = ChartAxisViewWindowOptions::class;
  protected $viewWindowOptionsDataType = '';

  /**
   * @param TextFormat
   */
  public function setFormat(TextFormat $format)
  {
    $this->format = $format;
  }
  /**
   * @return TextFormat
   */
  public function getFormat()
  {
    return $this->format;
  }
  /**
   * @param string
   */
  public function setPosition($position)
  {
    $this->position = $position;
  }
  /**
   * @return string
   */
  public function getPosition()
  {
    return $this->position;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param TextPosition
   */
  public function setTitleTextPosition(TextPosition $titleTextPosition)
  {
    $this->titleTextPosition = $titleTextPosition;
  }
  /**
   * @return TextPosition
   */
  public function getTitleTextPosition()
  {
    return $this->titleTextPosition;
  }
  /**
   * @param ChartAxisViewWindowOptions
   */
  public function setViewWindowOptions(ChartAxisViewWindowOptions $viewWindowOptions)
  {
    $this->viewWindowOptions = $viewWindowOptions;
  }
  /**
   * @return ChartAxisViewWindowOptions
   */
  public function getViewWindowOptions()
  {
    return $this->viewWindowOptions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BasicChartAxis::class, 'Google_Service_Sheets_BasicChartAxis');

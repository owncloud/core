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

class GoodocParagraphRoute extends \Google\Collection
{
  protected $collection_key = 'Word';
  protected $internal_gapi_mappings = [
        "endPoint" => "EndPoint",
        "startPoint" => "StartPoint",
        "weight" => "Weight",
        "word" => "Word",
  ];
  protected $endPointType = GoodocRoutePoint::class;
  protected $endPointDataType = '';
  protected $startPointType = GoodocRoutePoint::class;
  protected $startPointDataType = '';
  /**
   * @var int
   */
  public $weight;
  protected $wordType = GoodocWord::class;
  protected $wordDataType = 'array';

  /**
   * @param GoodocRoutePoint
   */
  public function setEndPoint(GoodocRoutePoint $endPoint)
  {
    $this->endPoint = $endPoint;
  }
  /**
   * @return GoodocRoutePoint
   */
  public function getEndPoint()
  {
    return $this->endPoint;
  }
  /**
   * @param GoodocRoutePoint
   */
  public function setStartPoint(GoodocRoutePoint $startPoint)
  {
    $this->startPoint = $startPoint;
  }
  /**
   * @return GoodocRoutePoint
   */
  public function getStartPoint()
  {
    return $this->startPoint;
  }
  /**
   * @param int
   */
  public function setWeight($weight)
  {
    $this->weight = $weight;
  }
  /**
   * @return int
   */
  public function getWeight()
  {
    return $this->weight;
  }
  /**
   * @param GoodocWord[]
   */
  public function setWord($word)
  {
    $this->word = $word;
  }
  /**
   * @return GoodocWord[]
   */
  public function getWord()
  {
    return $this->word;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocParagraphRoute::class, 'Google_Service_Contentwarehouse_GoodocParagraphRoute');

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

class ExtraSnippetInfoResponseQuerySubitem extends \Google\Model
{
  /**
   * @var bool
   */
  public $isHighlighted;
  /**
   * @var bool
   */
  public $isOptional;
  /**
   * @var bool
   */
  public $isOriginal;
  /**
   * @var int
   */
  public $items;
  /**
   * @var string
   */
  public $text;
  /**
   * @var int
   */
  public $weight;

  /**
   * @param bool
   */
  public function setIsHighlighted($isHighlighted)
  {
    $this->isHighlighted = $isHighlighted;
  }
  /**
   * @return bool
   */
  public function getIsHighlighted()
  {
    return $this->isHighlighted;
  }
  /**
   * @param bool
   */
  public function setIsOptional($isOptional)
  {
    $this->isOptional = $isOptional;
  }
  /**
   * @return bool
   */
  public function getIsOptional()
  {
    return $this->isOptional;
  }
  /**
   * @param bool
   */
  public function setIsOriginal($isOriginal)
  {
    $this->isOriginal = $isOriginal;
  }
  /**
   * @return bool
   */
  public function getIsOriginal()
  {
    return $this->isOriginal;
  }
  /**
   * @param int
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return int
   */
  public function getItems()
  {
    return $this->items;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExtraSnippetInfoResponseQuerySubitem::class, 'Google_Service_Contentwarehouse_ExtraSnippetInfoResponseQuerySubitem');

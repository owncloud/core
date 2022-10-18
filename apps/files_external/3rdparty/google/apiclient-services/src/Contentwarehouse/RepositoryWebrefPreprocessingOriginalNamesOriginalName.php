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

class RepositoryWebrefPreprocessingOriginalNamesOriginalName extends \Google\Collection
{
  protected $collection_key = 'source';
  /**
   * @var int
   */
  public $count;
  public $score;
  /**
   * @var int[]
   */
  public $source;
  /**
   * @var string
   */
  public $text;

  /**
   * @param int
   */
  public function setCount($count)
  {
    $this->count = $count;
  }
  /**
   * @return int
   */
  public function getCount()
  {
    return $this->count;
  }
  public function setScore($score)
  {
    $this->score = $score;
  }
  public function getScore()
  {
    return $this->score;
  }
  /**
   * @param int[]
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return int[]
   */
  public function getSource()
  {
    return $this->source;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefPreprocessingOriginalNamesOriginalName::class, 'Google_Service_Contentwarehouse_RepositoryWebrefPreprocessingOriginalNamesOriginalName');

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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2CustomAttribute extends \Google\Collection
{
  protected $collection_key = 'text';
  /**
   * @var bool
   */
  public $indexable;
  public $numbers;
  /**
   * @var bool
   */
  public $searchable;
  /**
   * @var string[]
   */
  public $text;

  /**
   * @param bool
   */
  public function setIndexable($indexable)
  {
    $this->indexable = $indexable;
  }
  /**
   * @return bool
   */
  public function getIndexable()
  {
    return $this->indexable;
  }
  public function setNumbers($numbers)
  {
    $this->numbers = $numbers;
  }
  public function getNumbers()
  {
    return $this->numbers;
  }
  /**
   * @param bool
   */
  public function setSearchable($searchable)
  {
    $this->searchable = $searchable;
  }
  /**
   * @return bool
   */
  public function getSearchable()
  {
    return $this->searchable;
  }
  /**
   * @param string[]
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string[]
   */
  public function getText()
  {
    return $this->text;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2CustomAttribute::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2CustomAttribute');

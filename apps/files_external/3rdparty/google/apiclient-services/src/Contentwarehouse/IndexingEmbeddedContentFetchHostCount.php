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

class IndexingEmbeddedContentFetchHostCount extends \Google\Collection
{
  protected $collection_key = 'counter';
  protected $counterType = IndexingEmbeddedContentFetchHostCountCounter::class;
  protected $counterDataType = 'array';
  /**
   * @var string
   */
  public $host;
  /**
   * @var int
   */
  public $num;

  /**
   * @param IndexingEmbeddedContentFetchHostCountCounter[]
   */
  public function setCounter($counter)
  {
    $this->counter = $counter;
  }
  /**
   * @return IndexingEmbeddedContentFetchHostCountCounter[]
   */
  public function getCounter()
  {
    return $this->counter;
  }
  /**
   * @param string
   */
  public function setHost($host)
  {
    $this->host = $host;
  }
  /**
   * @return string
   */
  public function getHost()
  {
    return $this->host;
  }
  /**
   * @param int
   */
  public function setNum($num)
  {
    $this->num = $num;
  }
  /**
   * @return int
   */
  public function getNum()
  {
    return $this->num;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingEmbeddedContentFetchHostCount::class, 'Google_Service_Contentwarehouse_IndexingEmbeddedContentFetchHostCount');

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

namespace Google\Service\Datastore;

class Query extends \Google\Collection
{
  protected $collection_key = 'projection';
  protected $distinctOnType = PropertyReference::class;
  protected $distinctOnDataType = 'array';
  /**
   * @var string
   */
  public $endCursor;
  protected $filterType = Filter::class;
  protected $filterDataType = '';
  protected $kindType = KindExpression::class;
  protected $kindDataType = 'array';
  /**
   * @var int
   */
  public $limit;
  /**
   * @var int
   */
  public $offset;
  protected $orderType = PropertyOrder::class;
  protected $orderDataType = 'array';
  protected $projectionType = Projection::class;
  protected $projectionDataType = 'array';
  /**
   * @var string
   */
  public $startCursor;

  /**
   * @param PropertyReference[]
   */
  public function setDistinctOn($distinctOn)
  {
    $this->distinctOn = $distinctOn;
  }
  /**
   * @return PropertyReference[]
   */
  public function getDistinctOn()
  {
    return $this->distinctOn;
  }
  /**
   * @param string
   */
  public function setEndCursor($endCursor)
  {
    $this->endCursor = $endCursor;
  }
  /**
   * @return string
   */
  public function getEndCursor()
  {
    return $this->endCursor;
  }
  /**
   * @param Filter
   */
  public function setFilter(Filter $filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return Filter
   */
  public function getFilter()
  {
    return $this->filter;
  }
  /**
   * @param KindExpression[]
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return KindExpression[]
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param int
   */
  public function setLimit($limit)
  {
    $this->limit = $limit;
  }
  /**
   * @return int
   */
  public function getLimit()
  {
    return $this->limit;
  }
  /**
   * @param int
   */
  public function setOffset($offset)
  {
    $this->offset = $offset;
  }
  /**
   * @return int
   */
  public function getOffset()
  {
    return $this->offset;
  }
  /**
   * @param PropertyOrder[]
   */
  public function setOrder($order)
  {
    $this->order = $order;
  }
  /**
   * @return PropertyOrder[]
   */
  public function getOrder()
  {
    return $this->order;
  }
  /**
   * @param Projection[]
   */
  public function setProjection($projection)
  {
    $this->projection = $projection;
  }
  /**
   * @return Projection[]
   */
  public function getProjection()
  {
    return $this->projection;
  }
  /**
   * @param string
   */
  public function setStartCursor($startCursor)
  {
    $this->startCursor = $startCursor;
  }
  /**
   * @return string
   */
  public function getStartCursor()
  {
    return $this->startCursor;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Query::class, 'Google_Service_Datastore_Query');

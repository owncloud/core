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

namespace Google\Service\Firestore;

class StructuredQuery extends \Google\Collection
{
  protected $collection_key = 'orderBy';
  protected $endAtType = Cursor::class;
  protected $endAtDataType = '';
  protected $fromType = CollectionSelector::class;
  protected $fromDataType = 'array';
  public $limit;
  public $offset;
  protected $orderByType = Order::class;
  protected $orderByDataType = 'array';
  protected $selectType = Projection::class;
  protected $selectDataType = '';
  protected $startAtType = Cursor::class;
  protected $startAtDataType = '';
  protected $whereType = Filter::class;
  protected $whereDataType = '';

  /**
   * @param Cursor
   */
  public function setEndAt(Cursor $endAt)
  {
    $this->endAt = $endAt;
  }
  /**
   * @return Cursor
   */
  public function getEndAt()
  {
    return $this->endAt;
  }
  /**
   * @param CollectionSelector[]
   */
  public function setFrom($from)
  {
    $this->from = $from;
  }
  /**
   * @return CollectionSelector[]
   */
  public function getFrom()
  {
    return $this->from;
  }
  public function setLimit($limit)
  {
    $this->limit = $limit;
  }
  public function getLimit()
  {
    return $this->limit;
  }
  public function setOffset($offset)
  {
    $this->offset = $offset;
  }
  public function getOffset()
  {
    return $this->offset;
  }
  /**
   * @param Order[]
   */
  public function setOrderBy($orderBy)
  {
    $this->orderBy = $orderBy;
  }
  /**
   * @return Order[]
   */
  public function getOrderBy()
  {
    return $this->orderBy;
  }
  /**
   * @param Projection
   */
  public function setSelect(Projection $select)
  {
    $this->select = $select;
  }
  /**
   * @return Projection
   */
  public function getSelect()
  {
    return $this->select;
  }
  /**
   * @param Cursor
   */
  public function setStartAt(Cursor $startAt)
  {
    $this->startAt = $startAt;
  }
  /**
   * @return Cursor
   */
  public function getStartAt()
  {
    return $this->startAt;
  }
  /**
   * @param Filter
   */
  public function setWhere(Filter $where)
  {
    $this->where = $where;
  }
  /**
   * @return Filter
   */
  public function getWhere()
  {
    return $this->where;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StructuredQuery::class, 'Google_Service_Firestore_StructuredQuery');

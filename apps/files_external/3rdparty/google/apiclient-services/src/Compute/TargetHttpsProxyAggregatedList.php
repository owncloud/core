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

namespace Google\Service\Compute;

class TargetHttpsProxyAggregatedList extends \Google\Collection
{
  protected $collection_key = 'unreachables';
  public $id;
  protected $itemsType = TargetHttpsProxiesScopedList::class;
  protected $itemsDataType = 'map';
  public $kind;
  public $nextPageToken;
  public $selfLink;
  public $unreachables;
  protected $warningType = TargetHttpsProxyAggregatedListWarning::class;
  protected $warningDataType = '';

  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param TargetHttpsProxiesScopedList[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return TargetHttpsProxiesScopedList[]
   */
  public function getItems()
  {
    return $this->items;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setUnreachables($unreachables)
  {
    $this->unreachables = $unreachables;
  }
  public function getUnreachables()
  {
    return $this->unreachables;
  }
  /**
   * @param TargetHttpsProxyAggregatedListWarning
   */
  public function setWarning(TargetHttpsProxyAggregatedListWarning $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return TargetHttpsProxyAggregatedListWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetHttpsProxyAggregatedList::class, 'Google_Service_Compute_TargetHttpsProxyAggregatedList');

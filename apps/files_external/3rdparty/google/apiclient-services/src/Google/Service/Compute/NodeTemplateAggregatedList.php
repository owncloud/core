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

class Google_Service_Compute_NodeTemplateAggregatedList extends Google_Collection
{
  protected $collection_key = 'unreachables';
  public $id;
  protected $itemsType = 'Google_Service_Compute_NodeTemplatesScopedList';
  protected $itemsDataType = 'map';
  public $kind;
  public $nextPageToken;
  public $selfLink;
  public $unreachables;
  protected $warningType = 'Google_Service_Compute_NodeTemplateAggregatedListWarning';
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
   * @param Google_Service_Compute_NodeTemplatesScopedList[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return Google_Service_Compute_NodeTemplatesScopedList[]
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
   * @param Google_Service_Compute_NodeTemplateAggregatedListWarning
   */
  public function setWarning(Google_Service_Compute_NodeTemplateAggregatedListWarning $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return Google_Service_Compute_NodeTemplateAggregatedListWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}

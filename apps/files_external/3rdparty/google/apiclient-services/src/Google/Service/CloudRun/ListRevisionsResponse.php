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

class Google_Service_CloudRun_ListRevisionsResponse extends Google_Collection
{
  protected $collection_key = 'unreachable';
  public $apiVersion;
  protected $itemsType = 'Google_Service_CloudRun_Revision';
  protected $itemsDataType = 'array';
  public $kind;
  protected $metadataType = 'Google_Service_CloudRun_ListMeta';
  protected $metadataDataType = '';
  public $unreachable;

  public function setApiVersion($apiVersion)
  {
    $this->apiVersion = $apiVersion;
  }
  public function getApiVersion()
  {
    return $this->apiVersion;
  }
  /**
   * @param Google_Service_CloudRun_Revision[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return Google_Service_CloudRun_Revision[]
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
  /**
   * @param Google_Service_CloudRun_ListMeta
   */
  public function setMetadata(Google_Service_CloudRun_ListMeta $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_CloudRun_ListMeta
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setUnreachable($unreachable)
  {
    $this->unreachable = $unreachable;
  }
  public function getUnreachable()
  {
    return $this->unreachable;
  }
}

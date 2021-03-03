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

class Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1SearchCatalogResult extends Google_Model
{
  public $linkedResource;
  public $modifyTime;
  public $relativeResourceName;
  public $searchResultSubtype;
  public $searchResultType;

  public function setLinkedResource($linkedResource)
  {
    $this->linkedResource = $linkedResource;
  }
  public function getLinkedResource()
  {
    return $this->linkedResource;
  }
  public function setModifyTime($modifyTime)
  {
    $this->modifyTime = $modifyTime;
  }
  public function getModifyTime()
  {
    return $this->modifyTime;
  }
  public function setRelativeResourceName($relativeResourceName)
  {
    $this->relativeResourceName = $relativeResourceName;
  }
  public function getRelativeResourceName()
  {
    return $this->relativeResourceName;
  }
  public function setSearchResultSubtype($searchResultSubtype)
  {
    $this->searchResultSubtype = $searchResultSubtype;
  }
  public function getSearchResultSubtype()
  {
    return $this->searchResultSubtype;
  }
  public function setSearchResultType($searchResultType)
  {
    $this->searchResultType = $searchResultType;
  }
  public function getSearchResultType()
  {
    return $this->searchResultType;
  }
}

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

namespace Google\Service\DataCatalog;

class GoogleCloudDatacatalogV1SearchCatalogResult extends \Google\Model
{
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $fullyQualifiedName;
  /**
   * @var string
   */
  public $integratedSystem;
  /**
   * @var string
   */
  public $linkedResource;
  /**
   * @var string
   */
  public $modifyTime;
  /**
   * @var string
   */
  public $relativeResourceName;
  /**
   * @var string
   */
  public $searchResultSubtype;
  /**
   * @var string
   */
  public $searchResultType;
  /**
   * @var string
   */
  public $userSpecifiedSystem;

  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setFullyQualifiedName($fullyQualifiedName)
  {
    $this->fullyQualifiedName = $fullyQualifiedName;
  }
  /**
   * @return string
   */
  public function getFullyQualifiedName()
  {
    return $this->fullyQualifiedName;
  }
  /**
   * @param string
   */
  public function setIntegratedSystem($integratedSystem)
  {
    $this->integratedSystem = $integratedSystem;
  }
  /**
   * @return string
   */
  public function getIntegratedSystem()
  {
    return $this->integratedSystem;
  }
  /**
   * @param string
   */
  public function setLinkedResource($linkedResource)
  {
    $this->linkedResource = $linkedResource;
  }
  /**
   * @return string
   */
  public function getLinkedResource()
  {
    return $this->linkedResource;
  }
  /**
   * @param string
   */
  public function setModifyTime($modifyTime)
  {
    $this->modifyTime = $modifyTime;
  }
  /**
   * @return string
   */
  public function getModifyTime()
  {
    return $this->modifyTime;
  }
  /**
   * @param string
   */
  public function setRelativeResourceName($relativeResourceName)
  {
    $this->relativeResourceName = $relativeResourceName;
  }
  /**
   * @return string
   */
  public function getRelativeResourceName()
  {
    return $this->relativeResourceName;
  }
  /**
   * @param string
   */
  public function setSearchResultSubtype($searchResultSubtype)
  {
    $this->searchResultSubtype = $searchResultSubtype;
  }
  /**
   * @return string
   */
  public function getSearchResultSubtype()
  {
    return $this->searchResultSubtype;
  }
  /**
   * @param string
   */
  public function setSearchResultType($searchResultType)
  {
    $this->searchResultType = $searchResultType;
  }
  /**
   * @return string
   */
  public function getSearchResultType()
  {
    return $this->searchResultType;
  }
  /**
   * @param string
   */
  public function setUserSpecifiedSystem($userSpecifiedSystem)
  {
    $this->userSpecifiedSystem = $userSpecifiedSystem;
  }
  /**
   * @return string
   */
  public function getUserSpecifiedSystem()
  {
    return $this->userSpecifiedSystem;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1SearchCatalogResult::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1SearchCatalogResult');

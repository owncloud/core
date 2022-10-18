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

class RepositoryWebrefSubSegmentIndex extends \Google\Model
{
  protected $anchorIndexType = RepositoryWebrefAnchorIndices::class;
  protected $anchorIndexDataType = '';
  protected $genericIndexType = RepositoryWebrefGenericIndices::class;
  protected $genericIndexDataType = '';
  protected $imageQueryIndexType = RepositoryWebrefImageQueryIndices::class;
  protected $imageQueryIndexDataType = '';
  protected $jgnIndexType = RepositoryWebrefJuggernautIndices::class;
  protected $jgnIndexDataType = '';
  protected $queryIndexType = RepositoryWebrefQueryIndices::class;
  protected $queryIndexDataType = '';

  /**
   * @param RepositoryWebrefAnchorIndices
   */
  public function setAnchorIndex(RepositoryWebrefAnchorIndices $anchorIndex)
  {
    $this->anchorIndex = $anchorIndex;
  }
  /**
   * @return RepositoryWebrefAnchorIndices
   */
  public function getAnchorIndex()
  {
    return $this->anchorIndex;
  }
  /**
   * @param RepositoryWebrefGenericIndices
   */
  public function setGenericIndex(RepositoryWebrefGenericIndices $genericIndex)
  {
    $this->genericIndex = $genericIndex;
  }
  /**
   * @return RepositoryWebrefGenericIndices
   */
  public function getGenericIndex()
  {
    return $this->genericIndex;
  }
  /**
   * @param RepositoryWebrefImageQueryIndices
   */
  public function setImageQueryIndex(RepositoryWebrefImageQueryIndices $imageQueryIndex)
  {
    $this->imageQueryIndex = $imageQueryIndex;
  }
  /**
   * @return RepositoryWebrefImageQueryIndices
   */
  public function getImageQueryIndex()
  {
    return $this->imageQueryIndex;
  }
  /**
   * @param RepositoryWebrefJuggernautIndices
   */
  public function setJgnIndex(RepositoryWebrefJuggernautIndices $jgnIndex)
  {
    $this->jgnIndex = $jgnIndex;
  }
  /**
   * @return RepositoryWebrefJuggernautIndices
   */
  public function getJgnIndex()
  {
    return $this->jgnIndex;
  }
  /**
   * @param RepositoryWebrefQueryIndices
   */
  public function setQueryIndex(RepositoryWebrefQueryIndices $queryIndex)
  {
    $this->queryIndex = $queryIndex;
  }
  /**
   * @return RepositoryWebrefQueryIndices
   */
  public function getQueryIndex()
  {
    return $this->queryIndex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefSubSegmentIndex::class, 'Google_Service_Contentwarehouse_RepositoryWebrefSubSegmentIndex');

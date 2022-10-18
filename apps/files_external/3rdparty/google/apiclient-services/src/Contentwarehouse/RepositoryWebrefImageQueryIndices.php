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

class RepositoryWebrefImageQueryIndices extends \Google\Model
{
  /**
   * @var int
   */
  public $imageIndex;
  protected $queryIndexType = RepositoryWebrefQueryIndices::class;
  protected $queryIndexDataType = '';

  /**
   * @param int
   */
  public function setImageIndex($imageIndex)
  {
    $this->imageIndex = $imageIndex;
  }
  /**
   * @return int
   */
  public function getImageIndex()
  {
    return $this->imageIndex;
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
class_alias(RepositoryWebrefImageQueryIndices::class, 'Google_Service_Contentwarehouse_RepositoryWebrefImageQueryIndices');

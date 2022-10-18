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

class RepositoryWebrefLatentEntities extends \Google\Collection
{
  protected $collection_key = 'latentMid';
  protected $latentEntityType = RepositoryWebrefLatentEntity::class;
  protected $latentEntityDataType = 'array';
  /**
   * @var string[]
   */
  public $latentMid;

  /**
   * @param RepositoryWebrefLatentEntity[]
   */
  public function setLatentEntity($latentEntity)
  {
    $this->latentEntity = $latentEntity;
  }
  /**
   * @return RepositoryWebrefLatentEntity[]
   */
  public function getLatentEntity()
  {
    return $this->latentEntity;
  }
  /**
   * @param string[]
   */
  public function setLatentMid($latentMid)
  {
    $this->latentMid = $latentMid;
  }
  /**
   * @return string[]
   */
  public function getLatentMid()
  {
    return $this->latentMid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefLatentEntities::class, 'Google_Service_Contentwarehouse_RepositoryWebrefLatentEntities');

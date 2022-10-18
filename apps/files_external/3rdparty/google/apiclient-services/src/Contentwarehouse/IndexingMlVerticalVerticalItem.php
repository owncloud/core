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

class IndexingMlVerticalVerticalItem extends \Google\Model
{
  /**
   * @var int
   */
  public $id;
  /**
   * @var string
   */
  public $name;
  /**
   * @var int
   */
  public $petacatId;
  /**
   * @var float
   */
  public $probability;

  /**
   * @param int
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return int
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param int
   */
  public function setPetacatId($petacatId)
  {
    $this->petacatId = $petacatId;
  }
  /**
   * @return int
   */
  public function getPetacatId()
  {
    return $this->petacatId;
  }
  /**
   * @param float
   */
  public function setProbability($probability)
  {
    $this->probability = $probability;
  }
  /**
   * @return float
   */
  public function getProbability()
  {
    return $this->probability;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingMlVerticalVerticalItem::class, 'Google_Service_Contentwarehouse_IndexingMlVerticalVerticalItem');

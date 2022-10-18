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

class OrionDocEntitiesProto extends \Google\Collection
{
  protected $collection_key = 'encodedEntity';
  /**
   * @var string
   */
  public $docid;
  /**
   * @var int[]
   */
  public $encodedEntity;

  /**
   * @param string
   */
  public function setDocid($docid)
  {
    $this->docid = $docid;
  }
  /**
   * @return string
   */
  public function getDocid()
  {
    return $this->docid;
  }
  /**
   * @param int[]
   */
  public function setEncodedEntity($encodedEntity)
  {
    $this->encodedEntity = $encodedEntity;
  }
  /**
   * @return int[]
   */
  public function getEncodedEntity()
  {
    return $this->encodedEntity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrionDocEntitiesProto::class, 'Google_Service_Contentwarehouse_OrionDocEntitiesProto');

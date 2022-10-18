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

class VendingConsumerProtoTrustedGenomeHierarchy extends \Google\Collection
{
  protected $collection_key = 'entity';
  protected $entityType = VendingConsumerProtoTrustedGenomeEntity::class;
  protected $entityDataType = 'array';
  /**
   * @var string
   */
  public $hierarchyType;
  /**
   * @var string
   */
  public $source;
  /**
   * @var string
   */
  public $trustedGenomeType;

  /**
   * @param VendingConsumerProtoTrustedGenomeEntity[]
   */
  public function setEntity($entity)
  {
    $this->entity = $entity;
  }
  /**
   * @return VendingConsumerProtoTrustedGenomeEntity[]
   */
  public function getEntity()
  {
    return $this->entity;
  }
  /**
   * @param string
   */
  public function setHierarchyType($hierarchyType)
  {
    $this->hierarchyType = $hierarchyType;
  }
  /**
   * @return string
   */
  public function getHierarchyType()
  {
    return $this->hierarchyType;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param string
   */
  public function setTrustedGenomeType($trustedGenomeType)
  {
    $this->trustedGenomeType = $trustedGenomeType;
  }
  /**
   * @return string
   */
  public function getTrustedGenomeType()
  {
    return $this->trustedGenomeType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VendingConsumerProtoTrustedGenomeHierarchy::class, 'Google_Service_Contentwarehouse_VendingConsumerProtoTrustedGenomeHierarchy');

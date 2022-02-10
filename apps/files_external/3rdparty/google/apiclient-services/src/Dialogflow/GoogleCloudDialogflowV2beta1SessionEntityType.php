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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowV2beta1SessionEntityType extends \Google\Collection
{
  protected $collection_key = 'entities';
  protected $entitiesType = GoogleCloudDialogflowV2beta1EntityTypeEntity::class;
  protected $entitiesDataType = 'array';
  /**
   * @var string
   */
  public $entityOverrideMode;
  /**
   * @var string
   */
  public $name;

  /**
   * @param GoogleCloudDialogflowV2beta1EntityTypeEntity[]
   */
  public function setEntities($entities)
  {
    $this->entities = $entities;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1EntityTypeEntity[]
   */
  public function getEntities()
  {
    return $this->entities;
  }
  /**
   * @param string
   */
  public function setEntityOverrideMode($entityOverrideMode)
  {
    $this->entityOverrideMode = $entityOverrideMode;
  }
  /**
   * @return string
   */
  public function getEntityOverrideMode()
  {
    return $this->entityOverrideMode;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2beta1SessionEntityType::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SessionEntityType');

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

class GoogleCloudDialogflowV2BatchUpdateEntityTypesResponse extends \Google\Collection
{
  protected $collection_key = 'entityTypes';
  protected $entityTypesType = GoogleCloudDialogflowV2EntityType::class;
  protected $entityTypesDataType = 'array';

  /**
   * @param GoogleCloudDialogflowV2EntityType[]
   */
  public function setEntityTypes($entityTypes)
  {
    $this->entityTypes = $entityTypes;
  }
  /**
   * @return GoogleCloudDialogflowV2EntityType[]
   */
  public function getEntityTypes()
  {
    return $this->entityTypes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2BatchUpdateEntityTypesResponse::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2BatchUpdateEntityTypesResponse');

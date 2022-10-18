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

namespace Google\Service\Integrations;

class GoogleCloudIntegrationsV1alphaRuntimeEntitySchema extends \Google\Model
{
  /**
   * @var string
   */
  public $arrayFieldSchema;
  /**
   * @var string
   */
  public $entity;
  /**
   * @var string
   */
  public $fieldSchema;

  /**
   * @param string
   */
  public function setArrayFieldSchema($arrayFieldSchema)
  {
    $this->arrayFieldSchema = $arrayFieldSchema;
  }
  /**
   * @return string
   */
  public function getArrayFieldSchema()
  {
    return $this->arrayFieldSchema;
  }
  /**
   * @param string
   */
  public function setEntity($entity)
  {
    $this->entity = $entity;
  }
  /**
   * @return string
   */
  public function getEntity()
  {
    return $this->entity;
  }
  /**
   * @param string
   */
  public function setFieldSchema($fieldSchema)
  {
    $this->fieldSchema = $fieldSchema;
  }
  /**
   * @return string
   */
  public function getFieldSchema()
  {
    return $this->fieldSchema;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaRuntimeEntitySchema::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaRuntimeEntitySchema');

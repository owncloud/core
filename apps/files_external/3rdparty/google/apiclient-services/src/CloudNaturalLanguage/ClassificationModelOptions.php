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

namespace Google\Service\CloudNaturalLanguage;

class ClassificationModelOptions extends \Google\Model
{
  protected $v1ModelType = V1Model::class;
  protected $v1ModelDataType = '';
  protected $v2ModelType = V2Model::class;
  protected $v2ModelDataType = '';

  /**
   * @param V1Model
   */
  public function setV1Model(V1Model $v1Model)
  {
    $this->v1Model = $v1Model;
  }
  /**
   * @return V1Model
   */
  public function getV1Model()
  {
    return $this->v1Model;
  }
  /**
   * @param V2Model
   */
  public function setV2Model(V2Model $v2Model)
  {
    $this->v2Model = $v2Model;
  }
  /**
   * @return V2Model
   */
  public function getV2Model()
  {
    return $this->v2Model;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ClassificationModelOptions::class, 'Google_Service_CloudNaturalLanguage_ClassificationModelOptions');

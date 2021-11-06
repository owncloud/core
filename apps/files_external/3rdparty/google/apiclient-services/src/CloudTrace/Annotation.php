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

namespace Google\Service\CloudTrace;

class Annotation extends \Google\Model
{
  protected $attributesType = Attributes::class;
  protected $attributesDataType = '';
  protected $descriptionType = TruncatableString::class;
  protected $descriptionDataType = '';

  /**
   * @param Attributes
   */
  public function setAttributes(Attributes $attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return Attributes
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  /**
   * @param TruncatableString
   */
  public function setDescription(TruncatableString $description)
  {
    $this->description = $description;
  }
  /**
   * @return TruncatableString
   */
  public function getDescription()
  {
    return $this->description;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Annotation::class, 'Google_Service_CloudTrace_Annotation');

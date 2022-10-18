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

class EnterpriseCrmEventbusProtoMappedField extends \Google\Model
{
  protected $inputFieldType = EnterpriseCrmEventbusProtoField::class;
  protected $inputFieldDataType = '';
  protected $outputFieldType = EnterpriseCrmEventbusProtoField::class;
  protected $outputFieldDataType = '';

  /**
   * @param EnterpriseCrmEventbusProtoField
   */
  public function setInputField(EnterpriseCrmEventbusProtoField $inputField)
  {
    $this->inputField = $inputField;
  }
  /**
   * @return EnterpriseCrmEventbusProtoField
   */
  public function getInputField()
  {
    return $this->inputField;
  }
  /**
   * @param EnterpriseCrmEventbusProtoField
   */
  public function setOutputField(EnterpriseCrmEventbusProtoField $outputField)
  {
    $this->outputField = $outputField;
  }
  /**
   * @return EnterpriseCrmEventbusProtoField
   */
  public function getOutputField()
  {
    return $this->outputField;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoMappedField::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoMappedField');

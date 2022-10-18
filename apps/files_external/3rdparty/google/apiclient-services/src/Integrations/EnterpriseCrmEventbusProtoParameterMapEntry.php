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

class EnterpriseCrmEventbusProtoParameterMapEntry extends \Google\Model
{
  protected $keyType = EnterpriseCrmEventbusProtoParameterMapField::class;
  protected $keyDataType = '';
  protected $valueType = EnterpriseCrmEventbusProtoParameterMapField::class;
  protected $valueDataType = '';

  /**
   * @param EnterpriseCrmEventbusProtoParameterMapField
   */
  public function setKey(EnterpriseCrmEventbusProtoParameterMapField $key)
  {
    $this->key = $key;
  }
  /**
   * @return EnterpriseCrmEventbusProtoParameterMapField
   */
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param EnterpriseCrmEventbusProtoParameterMapField
   */
  public function setValue(EnterpriseCrmEventbusProtoParameterMapField $value)
  {
    $this->value = $value;
  }
  /**
   * @return EnterpriseCrmEventbusProtoParameterMapField
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoParameterMapEntry::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoParameterMapEntry');

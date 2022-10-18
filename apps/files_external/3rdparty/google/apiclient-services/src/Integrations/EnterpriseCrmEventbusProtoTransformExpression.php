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

class EnterpriseCrmEventbusProtoTransformExpression extends \Google\Collection
{
  protected $collection_key = 'transformationFunctions';
  protected $initialValueType = EnterpriseCrmEventbusProtoBaseValue::class;
  protected $initialValueDataType = '';
  protected $transformationFunctionsType = EnterpriseCrmEventbusProtoFunction::class;
  protected $transformationFunctionsDataType = 'array';

  /**
   * @param EnterpriseCrmEventbusProtoBaseValue
   */
  public function setInitialValue(EnterpriseCrmEventbusProtoBaseValue $initialValue)
  {
    $this->initialValue = $initialValue;
  }
  /**
   * @return EnterpriseCrmEventbusProtoBaseValue
   */
  public function getInitialValue()
  {
    return $this->initialValue;
  }
  /**
   * @param EnterpriseCrmEventbusProtoFunction[]
   */
  public function setTransformationFunctions($transformationFunctions)
  {
    $this->transformationFunctions = $transformationFunctions;
  }
  /**
   * @return EnterpriseCrmEventbusProtoFunction[]
   */
  public function getTransformationFunctions()
  {
    return $this->transformationFunctions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoTransformExpression::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoTransformExpression');

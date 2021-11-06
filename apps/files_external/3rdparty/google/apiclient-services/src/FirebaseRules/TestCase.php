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

namespace Google\Service\FirebaseRules;

class TestCase extends \Google\Collection
{
  protected $collection_key = 'functionMocks';
  public $expectation;
  public $expressionReportLevel;
  protected $functionMocksType = FunctionMock::class;
  protected $functionMocksDataType = 'array';
  public $pathEncoding;
  public $request;
  public $resource;

  public function setExpectation($expectation)
  {
    $this->expectation = $expectation;
  }
  public function getExpectation()
  {
    return $this->expectation;
  }
  public function setExpressionReportLevel($expressionReportLevel)
  {
    $this->expressionReportLevel = $expressionReportLevel;
  }
  public function getExpressionReportLevel()
  {
    return $this->expressionReportLevel;
  }
  /**
   * @param FunctionMock[]
   */
  public function setFunctionMocks($functionMocks)
  {
    $this->functionMocks = $functionMocks;
  }
  /**
   * @return FunctionMock[]
   */
  public function getFunctionMocks()
  {
    return $this->functionMocks;
  }
  public function setPathEncoding($pathEncoding)
  {
    $this->pathEncoding = $pathEncoding;
  }
  public function getPathEncoding()
  {
    return $this->pathEncoding;
  }
  public function setRequest($request)
  {
    $this->request = $request;
  }
  public function getRequest()
  {
    return $this->request;
  }
  public function setResource($resource)
  {
    $this->resource = $resource;
  }
  public function getResource()
  {
    return $this->resource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TestCase::class, 'Google_Service_FirebaseRules_TestCase');

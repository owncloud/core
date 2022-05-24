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
  /**
   * @var string
   */
  public $expectation;
  /**
   * @var string
   */
  public $expressionReportLevel;
  protected $functionMocksType = FunctionMock::class;
  protected $functionMocksDataType = 'array';
  /**
   * @var string
   */
  public $pathEncoding;
  /**
   * @var array
   */
  public $request;
  /**
   * @var array
   */
  public $resource;

  /**
   * @param string
   */
  public function setExpectation($expectation)
  {
    $this->expectation = $expectation;
  }
  /**
   * @return string
   */
  public function getExpectation()
  {
    return $this->expectation;
  }
  /**
   * @param string
   */
  public function setExpressionReportLevel($expressionReportLevel)
  {
    $this->expressionReportLevel = $expressionReportLevel;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setPathEncoding($pathEncoding)
  {
    $this->pathEncoding = $pathEncoding;
  }
  /**
   * @return string
   */
  public function getPathEncoding()
  {
    return $this->pathEncoding;
  }
  /**
   * @param array
   */
  public function setRequest($request)
  {
    $this->request = $request;
  }
  /**
   * @return array
   */
  public function getRequest()
  {
    return $this->request;
  }
  /**
   * @param array
   */
  public function setResource($resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return array
   */
  public function getResource()
  {
    return $this->resource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TestCase::class, 'Google_Service_FirebaseRules_TestCase');

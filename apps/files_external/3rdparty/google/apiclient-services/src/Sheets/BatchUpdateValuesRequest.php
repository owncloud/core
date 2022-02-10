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

namespace Google\Service\Sheets;

class BatchUpdateValuesRequest extends \Google\Collection
{
  protected $collection_key = 'data';
  protected $dataType = ValueRange::class;
  protected $dataDataType = 'array';
  /**
   * @var bool
   */
  public $includeValuesInResponse;
  /**
   * @var string
   */
  public $responseDateTimeRenderOption;
  /**
   * @var string
   */
  public $responseValueRenderOption;
  /**
   * @var string
   */
  public $valueInputOption;

  /**
   * @param ValueRange[]
   */
  public function setData($data)
  {
    $this->data = $data;
  }
  /**
   * @return ValueRange[]
   */
  public function getData()
  {
    return $this->data;
  }
  /**
   * @param bool
   */
  public function setIncludeValuesInResponse($includeValuesInResponse)
  {
    $this->includeValuesInResponse = $includeValuesInResponse;
  }
  /**
   * @return bool
   */
  public function getIncludeValuesInResponse()
  {
    return $this->includeValuesInResponse;
  }
  /**
   * @param string
   */
  public function setResponseDateTimeRenderOption($responseDateTimeRenderOption)
  {
    $this->responseDateTimeRenderOption = $responseDateTimeRenderOption;
  }
  /**
   * @return string
   */
  public function getResponseDateTimeRenderOption()
  {
    return $this->responseDateTimeRenderOption;
  }
  /**
   * @param string
   */
  public function setResponseValueRenderOption($responseValueRenderOption)
  {
    $this->responseValueRenderOption = $responseValueRenderOption;
  }
  /**
   * @return string
   */
  public function getResponseValueRenderOption()
  {
    return $this->responseValueRenderOption;
  }
  /**
   * @param string
   */
  public function setValueInputOption($valueInputOption)
  {
    $this->valueInputOption = $valueInputOption;
  }
  /**
   * @return string
   */
  public function getValueInputOption()
  {
    return $this->valueInputOption;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BatchUpdateValuesRequest::class, 'Google_Service_Sheets_BatchUpdateValuesRequest');

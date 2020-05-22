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

class Google_Service_PolyService_AssetImportMessage extends Google_Model
{
  public $code;
  public $filePath;
  protected $imageErrorType = 'Google_Service_PolyService_ImageError';
  protected $imageErrorDataType = '';
  protected $objParseErrorType = 'Google_Service_PolyService_ObjParseError';
  protected $objParseErrorDataType = '';

  public function setCode($code)
  {
    $this->code = $code;
  }
  public function getCode()
  {
    return $this->code;
  }
  public function setFilePath($filePath)
  {
    $this->filePath = $filePath;
  }
  public function getFilePath()
  {
    return $this->filePath;
  }
  /**
   * @param Google_Service_PolyService_ImageError
   */
  public function setImageError(Google_Service_PolyService_ImageError $imageError)
  {
    $this->imageError = $imageError;
  }
  /**
   * @return Google_Service_PolyService_ImageError
   */
  public function getImageError()
  {
    return $this->imageError;
  }
  /**
   * @param Google_Service_PolyService_ObjParseError
   */
  public function setObjParseError(Google_Service_PolyService_ObjParseError $objParseError)
  {
    $this->objParseError = $objParseError;
  }
  /**
   * @return Google_Service_PolyService_ObjParseError
   */
  public function getObjParseError()
  {
    return $this->objParseError;
  }
}

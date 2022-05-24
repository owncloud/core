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

namespace Google\Service\Acceleratedmobilepageurl;

class BatchGetAmpUrlsResponse extends \Google\Collection
{
  protected $collection_key = 'urlErrors';
  protected $ampUrlsType = AmpUrl::class;
  protected $ampUrlsDataType = 'array';
  protected $urlErrorsType = AmpUrlError::class;
  protected $urlErrorsDataType = 'array';

  /**
   * @param AmpUrl[]
   */
  public function setAmpUrls($ampUrls)
  {
    $this->ampUrls = $ampUrls;
  }
  /**
   * @return AmpUrl[]
   */
  public function getAmpUrls()
  {
    return $this->ampUrls;
  }
  /**
   * @param AmpUrlError[]
   */
  public function setUrlErrors($urlErrors)
  {
    $this->urlErrors = $urlErrors;
  }
  /**
   * @return AmpUrlError[]
   */
  public function getUrlErrors()
  {
    return $this->urlErrors;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BatchGetAmpUrlsResponse::class, 'Google_Service_Acceleratedmobilepageurl_BatchGetAmpUrlsResponse');

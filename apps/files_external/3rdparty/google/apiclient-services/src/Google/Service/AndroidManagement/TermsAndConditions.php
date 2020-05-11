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

class Google_Service_AndroidManagement_TermsAndConditions extends Google_Model
{
  protected $contentType = 'Google_Service_AndroidManagement_UserFacingMessage';
  protected $contentDataType = '';
  protected $headerType = 'Google_Service_AndroidManagement_UserFacingMessage';
  protected $headerDataType = '';

  /**
   * @param Google_Service_AndroidManagement_UserFacingMessage
   */
  public function setContent(Google_Service_AndroidManagement_UserFacingMessage $content)
  {
    $this->content = $content;
  }
  /**
   * @return Google_Service_AndroidManagement_UserFacingMessage
   */
  public function getContent()
  {
    return $this->content;
  }
  /**
   * @param Google_Service_AndroidManagement_UserFacingMessage
   */
  public function setHeader(Google_Service_AndroidManagement_UserFacingMessage $header)
  {
    $this->header = $header;
  }
  /**
   * @return Google_Service_AndroidManagement_UserFacingMessage
   */
  public function getHeader()
  {
    return $this->header;
  }
}

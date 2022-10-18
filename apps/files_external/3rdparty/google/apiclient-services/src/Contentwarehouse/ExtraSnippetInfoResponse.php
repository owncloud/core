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

namespace Google\Service\Contentwarehouse;

class ExtraSnippetInfoResponse extends \Google\Collection
{
  protected $collection_key = 'tidbit';
  protected $matchinfoType = ExtraSnippetInfoResponseMatchInfo::class;
  protected $matchinfoDataType = '';
  protected $querysubitemType = ExtraSnippetInfoResponseQuerySubitem::class;
  protected $querysubitemDataType = 'array';
  protected $tidbitType = ExtraSnippetInfoResponseTidbit::class;
  protected $tidbitDataType = 'array';

  /**
   * @param ExtraSnippetInfoResponseMatchInfo
   */
  public function setMatchinfo(ExtraSnippetInfoResponseMatchInfo $matchinfo)
  {
    $this->matchinfo = $matchinfo;
  }
  /**
   * @return ExtraSnippetInfoResponseMatchInfo
   */
  public function getMatchinfo()
  {
    return $this->matchinfo;
  }
  /**
   * @param ExtraSnippetInfoResponseQuerySubitem[]
   */
  public function setQuerysubitem($querysubitem)
  {
    $this->querysubitem = $querysubitem;
  }
  /**
   * @return ExtraSnippetInfoResponseQuerySubitem[]
   */
  public function getQuerysubitem()
  {
    return $this->querysubitem;
  }
  /**
   * @param ExtraSnippetInfoResponseTidbit[]
   */
  public function setTidbit($tidbit)
  {
    $this->tidbit = $tidbit;
  }
  /**
   * @return ExtraSnippetInfoResponseTidbit[]
   */
  public function getTidbit()
  {
    return $this->tidbit;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExtraSnippetInfoResponse::class, 'Google_Service_Contentwarehouse_ExtraSnippetInfoResponse');

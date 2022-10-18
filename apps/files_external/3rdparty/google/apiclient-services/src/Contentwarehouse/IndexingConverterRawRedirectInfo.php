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

class IndexingConverterRawRedirectInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $rawFinalTargetFromRendering;
  /**
   * @var string
   */
  public $rawFinalTargetFromTrawler;
  protected $rawRedirectChainFromRenderingType = IndexingConverterRedirectChain::class;
  protected $rawRedirectChainFromRenderingDataType = '';
  /**
   * @var int
   */
  public $renderingRedirectLimit;

  /**
   * @param string
   */
  public function setRawFinalTargetFromRendering($rawFinalTargetFromRendering)
  {
    $this->rawFinalTargetFromRendering = $rawFinalTargetFromRendering;
  }
  /**
   * @return string
   */
  public function getRawFinalTargetFromRendering()
  {
    return $this->rawFinalTargetFromRendering;
  }
  /**
   * @param string
   */
  public function setRawFinalTargetFromTrawler($rawFinalTargetFromTrawler)
  {
    $this->rawFinalTargetFromTrawler = $rawFinalTargetFromTrawler;
  }
  /**
   * @return string
   */
  public function getRawFinalTargetFromTrawler()
  {
    return $this->rawFinalTargetFromTrawler;
  }
  /**
   * @param IndexingConverterRedirectChain
   */
  public function setRawRedirectChainFromRendering(IndexingConverterRedirectChain $rawRedirectChainFromRendering)
  {
    $this->rawRedirectChainFromRendering = $rawRedirectChainFromRendering;
  }
  /**
   * @return IndexingConverterRedirectChain
   */
  public function getRawRedirectChainFromRendering()
  {
    return $this->rawRedirectChainFromRendering;
  }
  /**
   * @param int
   */
  public function setRenderingRedirectLimit($renderingRedirectLimit)
  {
    $this->renderingRedirectLimit = $renderingRedirectLimit;
  }
  /**
   * @return int
   */
  public function getRenderingRedirectLimit()
  {
    return $this->renderingRedirectLimit;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingConverterRawRedirectInfo::class, 'Google_Service_Contentwarehouse_IndexingConverterRawRedirectInfo');

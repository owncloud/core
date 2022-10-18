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

class IndexingConverterRedirectParams extends \Google\Model
{
  /**
   * @var int
   */
  public $delay;
  /**
   * @var bool
   */
  public $frameTargetDeniesFraming;
  /**
   * @var bool
   */
  public $isDownload;
  /**
   * @var bool
   */
  public $isRenderingRedirect;
  /**
   * @var bool
   */
  public $metaRedirectFromTrawler;
  /**
   * @var string
   */
  public $type;

  /**
   * @param int
   */
  public function setDelay($delay)
  {
    $this->delay = $delay;
  }
  /**
   * @return int
   */
  public function getDelay()
  {
    return $this->delay;
  }
  /**
   * @param bool
   */
  public function setFrameTargetDeniesFraming($frameTargetDeniesFraming)
  {
    $this->frameTargetDeniesFraming = $frameTargetDeniesFraming;
  }
  /**
   * @return bool
   */
  public function getFrameTargetDeniesFraming()
  {
    return $this->frameTargetDeniesFraming;
  }
  /**
   * @param bool
   */
  public function setIsDownload($isDownload)
  {
    $this->isDownload = $isDownload;
  }
  /**
   * @return bool
   */
  public function getIsDownload()
  {
    return $this->isDownload;
  }
  /**
   * @param bool
   */
  public function setIsRenderingRedirect($isRenderingRedirect)
  {
    $this->isRenderingRedirect = $isRenderingRedirect;
  }
  /**
   * @return bool
   */
  public function getIsRenderingRedirect()
  {
    return $this->isRenderingRedirect;
  }
  /**
   * @param bool
   */
  public function setMetaRedirectFromTrawler($metaRedirectFromTrawler)
  {
    $this->metaRedirectFromTrawler = $metaRedirectFromTrawler;
  }
  /**
   * @return bool
   */
  public function getMetaRedirectFromTrawler()
  {
    return $this->metaRedirectFromTrawler;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingConverterRedirectParams::class, 'Google_Service_Contentwarehouse_IndexingConverterRedirectParams');

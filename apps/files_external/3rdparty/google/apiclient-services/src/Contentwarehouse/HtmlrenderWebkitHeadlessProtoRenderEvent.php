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

class HtmlrenderWebkitHeadlessProtoRenderEvent extends \Google\Model
{
  protected $frameResizeType = HtmlrenderWebkitHeadlessProtoFrameResizeEvent::class;
  protected $frameResizeDataType = '';
  protected $initialLoadType = HtmlrenderWebkitHeadlessProtoInitialLoadEvent::class;
  protected $initialLoadDataType = '';
  protected $modalDialogType = HtmlrenderWebkitHeadlessProtoModalDialogEvent::class;
  protected $modalDialogDataType = '';
  protected $redirectType = HtmlrenderWebkitHeadlessProtoRedirectEvent::class;
  protected $redirectDataType = '';
  /**
   * @var string
   */
  public $scriptOriginUrl;
  public $virtualTimeOffset;
  protected $windowOpenType = HtmlrenderWebkitHeadlessProtoWindowOpenEvent::class;
  protected $windowOpenDataType = '';

  /**
   * @param HtmlrenderWebkitHeadlessProtoFrameResizeEvent
   */
  public function setFrameResize(HtmlrenderWebkitHeadlessProtoFrameResizeEvent $frameResize)
  {
    $this->frameResize = $frameResize;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoFrameResizeEvent
   */
  public function getFrameResize()
  {
    return $this->frameResize;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoInitialLoadEvent
   */
  public function setInitialLoad(HtmlrenderWebkitHeadlessProtoInitialLoadEvent $initialLoad)
  {
    $this->initialLoad = $initialLoad;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoInitialLoadEvent
   */
  public function getInitialLoad()
  {
    return $this->initialLoad;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoModalDialogEvent
   */
  public function setModalDialog(HtmlrenderWebkitHeadlessProtoModalDialogEvent $modalDialog)
  {
    $this->modalDialog = $modalDialog;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoModalDialogEvent
   */
  public function getModalDialog()
  {
    return $this->modalDialog;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoRedirectEvent
   */
  public function setRedirect(HtmlrenderWebkitHeadlessProtoRedirectEvent $redirect)
  {
    $this->redirect = $redirect;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoRedirectEvent
   */
  public function getRedirect()
  {
    return $this->redirect;
  }
  /**
   * @param string
   */
  public function setScriptOriginUrl($scriptOriginUrl)
  {
    $this->scriptOriginUrl = $scriptOriginUrl;
  }
  /**
   * @return string
   */
  public function getScriptOriginUrl()
  {
    return $this->scriptOriginUrl;
  }
  public function setVirtualTimeOffset($virtualTimeOffset)
  {
    $this->virtualTimeOffset = $virtualTimeOffset;
  }
  public function getVirtualTimeOffset()
  {
    return $this->virtualTimeOffset;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoWindowOpenEvent
   */
  public function setWindowOpen(HtmlrenderWebkitHeadlessProtoWindowOpenEvent $windowOpen)
  {
    $this->windowOpen = $windowOpen;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoWindowOpenEvent
   */
  public function getWindowOpen()
  {
    return $this->windowOpen;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HtmlrenderWebkitHeadlessProtoRenderEvent::class, 'Google_Service_Contentwarehouse_HtmlrenderWebkitHeadlessProtoRenderEvent');

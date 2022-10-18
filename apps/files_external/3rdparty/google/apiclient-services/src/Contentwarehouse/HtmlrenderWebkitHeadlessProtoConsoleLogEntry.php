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

class HtmlrenderWebkitHeadlessProtoConsoleLogEntry extends \Google\Collection
{
  protected $collection_key = 'stackTrace';
  /**
   * @var int
   */
  public $lineNumber;
  /**
   * @var string
   */
  public $message;
  /**
   * @var string
   */
  public $messageLevel;
  /**
   * @var string
   */
  public $sourceUrl;
  protected $stackTraceType = HtmlrenderWebkitHeadlessProtoScriptStackFrame::class;
  protected $stackTraceDataType = 'array';
  public $timestamp;

  /**
   * @param int
   */
  public function setLineNumber($lineNumber)
  {
    $this->lineNumber = $lineNumber;
  }
  /**
   * @return int
   */
  public function getLineNumber()
  {
    return $this->lineNumber;
  }
  /**
   * @param string
   */
  public function setMessage($message)
  {
    $this->message = $message;
  }
  /**
   * @return string
   */
  public function getMessage()
  {
    return $this->message;
  }
  /**
   * @param string
   */
  public function setMessageLevel($messageLevel)
  {
    $this->messageLevel = $messageLevel;
  }
  /**
   * @return string
   */
  public function getMessageLevel()
  {
    return $this->messageLevel;
  }
  /**
   * @param string
   */
  public function setSourceUrl($sourceUrl)
  {
    $this->sourceUrl = $sourceUrl;
  }
  /**
   * @return string
   */
  public function getSourceUrl()
  {
    return $this->sourceUrl;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoScriptStackFrame[]
   */
  public function setStackTrace($stackTrace)
  {
    $this->stackTrace = $stackTrace;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoScriptStackFrame[]
   */
  public function getStackTrace()
  {
    return $this->stackTrace;
  }
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  public function getTimestamp()
  {
    return $this->timestamp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HtmlrenderWebkitHeadlessProtoConsoleLogEntry::class, 'Google_Service_Contentwarehouse_HtmlrenderWebkitHeadlessProtoConsoleLogEntry');

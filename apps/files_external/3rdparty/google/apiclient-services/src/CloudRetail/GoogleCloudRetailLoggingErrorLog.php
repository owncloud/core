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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailLoggingErrorLog extends \Google\Model
{
  protected $contextType = GoogleCloudRetailLoggingErrorContext::class;
  protected $contextDataType = '';
  protected $importPayloadType = GoogleCloudRetailLoggingImportErrorContext::class;
  protected $importPayloadDataType = '';
  public $message;
  public $requestPayload;
  public $responsePayload;
  protected $serviceContextType = GoogleCloudRetailLoggingServiceContext::class;
  protected $serviceContextDataType = '';
  protected $statusType = GoogleRpcStatus::class;
  protected $statusDataType = '';

  /**
   * @param GoogleCloudRetailLoggingErrorContext
   */
  public function setContext(GoogleCloudRetailLoggingErrorContext $context)
  {
    $this->context = $context;
  }
  /**
   * @return GoogleCloudRetailLoggingErrorContext
   */
  public function getContext()
  {
    return $this->context;
  }
  /**
   * @param GoogleCloudRetailLoggingImportErrorContext
   */
  public function setImportPayload(GoogleCloudRetailLoggingImportErrorContext $importPayload)
  {
    $this->importPayload = $importPayload;
  }
  /**
   * @return GoogleCloudRetailLoggingImportErrorContext
   */
  public function getImportPayload()
  {
    return $this->importPayload;
  }
  public function setMessage($message)
  {
    $this->message = $message;
  }
  public function getMessage()
  {
    return $this->message;
  }
  public function setRequestPayload($requestPayload)
  {
    $this->requestPayload = $requestPayload;
  }
  public function getRequestPayload()
  {
    return $this->requestPayload;
  }
  public function setResponsePayload($responsePayload)
  {
    $this->responsePayload = $responsePayload;
  }
  public function getResponsePayload()
  {
    return $this->responsePayload;
  }
  /**
   * @param GoogleCloudRetailLoggingServiceContext
   */
  public function setServiceContext(GoogleCloudRetailLoggingServiceContext $serviceContext)
  {
    $this->serviceContext = $serviceContext;
  }
  /**
   * @return GoogleCloudRetailLoggingServiceContext
   */
  public function getServiceContext()
  {
    return $this->serviceContext;
  }
  /**
   * @param GoogleRpcStatus
   */
  public function setStatus(GoogleRpcStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return GoogleRpcStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailLoggingErrorLog::class, 'Google_Service_CloudRetail_GoogleCloudRetailLoggingErrorLog');

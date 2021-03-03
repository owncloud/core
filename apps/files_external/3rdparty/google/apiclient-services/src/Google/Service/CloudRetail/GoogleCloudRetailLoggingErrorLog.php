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

class Google_Service_CloudRetail_GoogleCloudRetailLoggingErrorLog extends Google_Model
{
  protected $contextType = 'Google_Service_CloudRetail_GoogleCloudRetailLoggingErrorContext';
  protected $contextDataType = '';
  protected $importPayloadType = 'Google_Service_CloudRetail_GoogleCloudRetailLoggingImportErrorContext';
  protected $importPayloadDataType = '';
  public $message;
  public $requestPayload;
  public $responsePayload;
  protected $serviceContextType = 'Google_Service_CloudRetail_GoogleCloudRetailLoggingServiceContext';
  protected $serviceContextDataType = '';
  protected $statusType = 'Google_Service_CloudRetail_GoogleRpcStatus';
  protected $statusDataType = '';

  /**
   * @param Google_Service_CloudRetail_GoogleCloudRetailLoggingErrorContext
   */
  public function setContext(Google_Service_CloudRetail_GoogleCloudRetailLoggingErrorContext $context)
  {
    $this->context = $context;
  }
  /**
   * @return Google_Service_CloudRetail_GoogleCloudRetailLoggingErrorContext
   */
  public function getContext()
  {
    return $this->context;
  }
  /**
   * @param Google_Service_CloudRetail_GoogleCloudRetailLoggingImportErrorContext
   */
  public function setImportPayload(Google_Service_CloudRetail_GoogleCloudRetailLoggingImportErrorContext $importPayload)
  {
    $this->importPayload = $importPayload;
  }
  /**
   * @return Google_Service_CloudRetail_GoogleCloudRetailLoggingImportErrorContext
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
   * @param Google_Service_CloudRetail_GoogleCloudRetailLoggingServiceContext
   */
  public function setServiceContext(Google_Service_CloudRetail_GoogleCloudRetailLoggingServiceContext $serviceContext)
  {
    $this->serviceContext = $serviceContext;
  }
  /**
   * @return Google_Service_CloudRetail_GoogleCloudRetailLoggingServiceContext
   */
  public function getServiceContext()
  {
    return $this->serviceContext;
  }
  /**
   * @param Google_Service_CloudRetail_GoogleRpcStatus
   */
  public function setStatus(Google_Service_CloudRetail_GoogleRpcStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_CloudRetail_GoogleRpcStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
}

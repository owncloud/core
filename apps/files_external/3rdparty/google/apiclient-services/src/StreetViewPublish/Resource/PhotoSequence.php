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

namespace Google\Service\StreetViewPublish\Resource;

use Google\Service\StreetViewPublish\Operation;
use Google\Service\StreetViewPublish\PhotoSequence as PhotoSequenceModel;
use Google\Service\StreetViewPublish\StreetviewpublishEmpty;
use Google\Service\StreetViewPublish\UploadRef;

/**
 * The "photoSequence" collection of methods.
 * Typical usage is:
 *  <code>
 *   $streetviewpublishService = new Google\Service\StreetViewPublish(...);
 *   $photoSequence = $streetviewpublishService->photoSequence;
 *  </code>
 */
class PhotoSequence extends \Google\Service\Resource
{
  /**
   * After the client finishes uploading the PhotoSequence with the returned
   * UploadRef, CreatePhotoSequence extracts a sequence of 360 photos from a video
   * or Extensible Device Metadata (XDM, http://www.xdm.org/) to be published to
   * Street View on Google Maps. `CreatePhotoSequence` returns an Operation, with
   * the PhotoSequence Id set in the `Operation.name` field. This method returns
   * the following error codes: * google.rpc.Code.INVALID_ARGUMENT if the request
   * is malformed. * google.rpc.Code.NOT_FOUND if the upload reference does not
   * exist. (photoSequence.create)
   *
   * @param PhotoSequenceModel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string inputType Required. The input form of PhotoSequence.
   * @return OperationModel
   */
  public function create(PhotoSequenceModel $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a PhotoSequence and its metadata. This method returns the following
   * error codes: * google.rpc.Code.PERMISSION_DENIED if the requesting user did
   * not create the requested photo sequence. * google.rpc.Code.NOT_FOUND if the
   * photo sequence ID does not exist. * google.rpc.Code.FAILED_PRECONDITION if
   * the photo sequence ID is not yet finished processing. (photoSequence.delete)
   *
   * @param string $sequenceId Required. ID of the PhotoSequence.
   * @param array $optParams Optional parameters.
   * @return StreetviewpublishEmpty
   */
  public function delete($sequenceId, $optParams = [])
  {
    $params = ['sequenceId' => $sequenceId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], StreetviewpublishEmpty::class);
  }
  /**
   * Gets the metadata of the specified PhotoSequence via the Operation interface.
   * This method returns the following three types of responses: *
   * `Operation.done` = false, if the processing of PhotoSequence is not finished
   * yet. * `Operation.done` = true and `Operation.error` is populated, if there
   * was an error in processing. * `Operation.done` = true and
   * `Operation.response` is poulated, which contains a PhotoSequence message.
   * This method returns the following error codes: *
   * google.rpc.Code.PERMISSION_DENIED if the requesting user did not create the
   * requested PhotoSequence. * google.rpc.Code.NOT_FOUND if the requested
   * PhotoSequence does not exist. (photoSequence.get)
   *
   * @param string $sequenceId Required. ID of the photo sequence.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter expression. For example:
   * `published_status=PUBLISHED`. The filters supported are: `published_status`.
   * See https://google.aip.dev/160 for more information.
   * @opt_param string view Specifies if a download URL for the photo sequence
   * should be returned in `download_url` of individual photos in the
   * PhotoSequence response. > Note: Currently not implemented.
   * @return Operation
   */
  public function get($sequenceId, $optParams = [])
  {
    $params = ['sequenceId' => $sequenceId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Operation::class);
  }
  /**
   * Creates an upload session to start uploading photo sequence data. The upload
   * URL of the returned UploadRef is used to upload the data for the
   * `photoSequence`. After the upload is complete, the UploadRef is used with
   * CreatePhotoSequence to create the PhotoSequence object entry.
   * (photoSequence.startUpload)
   *
   * @param StreetviewpublishEmpty $postBody
   * @param array $optParams Optional parameters.
   * @return UploadRef
   */
  public function startUpload(StreetviewpublishEmpty $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('startUpload', [$params], UploadRef::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhotoSequence::class, 'Google_Service_StreetViewPublish_Resource_PhotoSequence');

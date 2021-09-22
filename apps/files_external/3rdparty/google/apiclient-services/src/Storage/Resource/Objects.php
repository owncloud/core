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

namespace Google\Service\Storage\Resource;

use Google\Service\Storage\Channel;
use Google\Service\Storage\ComposeRequest;
use Google\Service\Storage\Objects as ObjectsModel;
use Google\Service\Storage\Policy;
use Google\Service\Storage\RewriteResponse;
use Google\Service\Storage\StorageObject;
use Google\Service\Storage\TestIamPermissionsResponse;

/**
 * The "objects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storageService = new Google\Service\Storage(...);
 *   $objects = $storageService->objects;
 *  </code>
 */
class Objects extends \Google\Service\Resource
{
  /**
   * Concatenates a list of existing objects into a new object in the same bucket.
   * (objects.compose)
   *
   * @param string $destinationBucket Name of the bucket containing the source
   * objects. The destination object is stored in this bucket.
   * @param string $destinationObject Name of the new object. For information
   * about how to URL encode object names to be path safe, see Encoding URI Path
   * Parts.
   * @param ComposeRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string destinationPredefinedAcl Apply a predefined set of access
   * controls to the destination object.
   * @opt_param string ifGenerationMatch Makes the operation conditional on
   * whether the object's current generation matches the given value. Setting to 0
   * makes the operation succeed only if there are no live versions of the object.
   * @opt_param string ifMetagenerationMatch Makes the operation conditional on
   * whether the object's current metageneration matches the given value.
   * @opt_param string kmsKeyName Resource name of the Cloud KMS key, of the form
   * projects/my-project/locations/global/keyRings/my-kr/cryptoKeys/my-key, that
   * will be used to encrypt the object. Overrides the object metadata's
   * kms_key_name value, if any.
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return StorageObject
   */
  public function compose($destinationBucket, $destinationObject, ComposeRequest $postBody, $optParams = [])
  {
    $params = ['destinationBucket' => $destinationBucket, 'destinationObject' => $destinationObject, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('compose', [$params], StorageObject::class);
  }
  /**
   * Copies a source object to a destination object. Optionally overrides
   * metadata. (objects.copy)
   *
   * @param string $sourceBucket Name of the bucket in which to find the source
   * object.
   * @param string $sourceObject Name of the source object. For information about
   * how to URL encode object names to be path safe, see Encoding URI Path Parts.
   * @param string $destinationBucket Name of the bucket in which to store the new
   * object. Overrides the provided object metadata's bucket value, if any.For
   * information about how to URL encode object names to be path safe, see
   * Encoding URI Path Parts.
   * @param string $destinationObject Name of the new object. Required when the
   * object metadata is not otherwise provided. Overrides the object metadata's
   * name value, if any.
   * @param StorageObject $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string destinationKmsKeyName Resource name of the Cloud KMS key,
   * of the form projects/my-project/locations/global/keyRings/my-kr/cryptoKeys
   * /my-key, that will be used to encrypt the object. Overrides the object
   * metadata's kms_key_name value, if any.
   * @opt_param string destinationPredefinedAcl Apply a predefined set of access
   * controls to the destination object.
   * @opt_param string ifGenerationMatch Makes the operation conditional on
   * whether the destination object's current generation matches the given value.
   * Setting to 0 makes the operation succeed only if there are no live versions
   * of the object.
   * @opt_param string ifGenerationNotMatch Makes the operation conditional on
   * whether the destination object's current generation does not match the given
   * value. If no live object exists, the precondition fails. Setting to 0 makes
   * the operation succeed only if there is a live version of the object.
   * @opt_param string ifMetagenerationMatch Makes the operation conditional on
   * whether the destination object's current metageneration matches the given
   * value.
   * @opt_param string ifMetagenerationNotMatch Makes the operation conditional on
   * whether the destination object's current metageneration does not match the
   * given value.
   * @opt_param string ifSourceGenerationMatch Makes the operation conditional on
   * whether the source object's current generation matches the given value.
   * @opt_param string ifSourceGenerationNotMatch Makes the operation conditional
   * on whether the source object's current generation does not match the given
   * value.
   * @opt_param string ifSourceMetagenerationMatch Makes the operation conditional
   * on whether the source object's current metageneration matches the given
   * value.
   * @opt_param string ifSourceMetagenerationNotMatch Makes the operation
   * conditional on whether the source object's current metageneration does not
   * match the given value.
   * @opt_param string projection Set of properties to return. Defaults to noAcl,
   * unless the object resource specifies the acl property, when it defaults to
   * full.
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string sourceGeneration If present, selects a specific revision of
   * the source object (as opposed to the latest version, the default).
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return StorageObject
   */
  public function copy($sourceBucket, $sourceObject, $destinationBucket, $destinationObject, StorageObject $postBody, $optParams = [])
  {
    $params = ['sourceBucket' => $sourceBucket, 'sourceObject' => $sourceObject, 'destinationBucket' => $destinationBucket, 'destinationObject' => $destinationObject, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('copy', [$params], StorageObject::class);
  }
  /**
   * Deletes an object and its metadata. Deletions are permanent if versioning is
   * not enabled for the bucket, or if the generation parameter is used.
   * (objects.delete)
   *
   * @param string $bucket Name of the bucket in which the object resides.
   * @param string $object Name of the object. For information about how to URL
   * encode object names to be path safe, see Encoding URI Path Parts.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string generation If present, permanently deletes a specific
   * revision of this object (as opposed to the latest version, the default).
   * @opt_param string ifGenerationMatch Makes the operation conditional on
   * whether the object's current generation matches the given value. Setting to 0
   * makes the operation succeed only if there are no live versions of the object.
   * @opt_param string ifGenerationNotMatch Makes the operation conditional on
   * whether the object's current generation does not match the given value. If no
   * live object exists, the precondition fails. Setting to 0 makes the operation
   * succeed only if there is a live version of the object.
   * @opt_param string ifMetagenerationMatch Makes the operation conditional on
   * whether the object's current metageneration matches the given value.
   * @opt_param string ifMetagenerationNotMatch Makes the operation conditional on
   * whether the object's current metageneration does not match the given value.
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   */
  public function delete($bucket, $object, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'object' => $object];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves an object or its metadata. (objects.get)
   *
   * @param string $bucket Name of the bucket in which the object resides.
   * @param string $object Name of the object. For information about how to URL
   * encode object names to be path safe, see Encoding URI Path Parts.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string generation If present, selects a specific revision of this
   * object (as opposed to the latest version, the default).
   * @opt_param string ifGenerationMatch Makes the operation conditional on
   * whether the object's current generation matches the given value. Setting to 0
   * makes the operation succeed only if there are no live versions of the object.
   * @opt_param string ifGenerationNotMatch Makes the operation conditional on
   * whether the object's current generation does not match the given value. If no
   * live object exists, the precondition fails. Setting to 0 makes the operation
   * succeed only if there is a live version of the object.
   * @opt_param string ifMetagenerationMatch Makes the operation conditional on
   * whether the object's current metageneration matches the given value.
   * @opt_param string ifMetagenerationNotMatch Makes the operation conditional on
   * whether the object's current metageneration does not match the given value.
   * @opt_param string projection Set of properties to return. Defaults to noAcl.
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return StorageObject
   */
  public function get($bucket, $object, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'object' => $object];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], StorageObject::class);
  }
  /**
   * Returns an IAM policy for the specified object. (objects.getIamPolicy)
   *
   * @param string $bucket Name of the bucket in which the object resides.
   * @param string $object Name of the object. For information about how to URL
   * encode object names to be path safe, see Encoding URI Path Parts.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string generation If present, selects a specific revision of this
   * object (as opposed to the latest version, the default).
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Policy
   */
  public function getIamPolicy($bucket, $object, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'object' => $object];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Stores a new object and metadata. (objects.insert)
   *
   * @param string $bucket Name of the bucket in which to store the new object.
   * Overrides the provided object metadata's bucket value, if any.
   * @param StorageObject $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string contentEncoding If set, sets the contentEncoding property
   * of the final object to this value. Setting this parameter is equivalent to
   * setting the contentEncoding metadata property. This can be useful when
   * uploading an object with uploadType=media to indicate the encoding of the
   * content being uploaded.
   * @opt_param string ifGenerationMatch Makes the operation conditional on
   * whether the object's current generation matches the given value. Setting to 0
   * makes the operation succeed only if there are no live versions of the object.
   * @opt_param string ifGenerationNotMatch Makes the operation conditional on
   * whether the object's current generation does not match the given value. If no
   * live object exists, the precondition fails. Setting to 0 makes the operation
   * succeed only if there is a live version of the object.
   * @opt_param string ifMetagenerationMatch Makes the operation conditional on
   * whether the object's current metageneration matches the given value.
   * @opt_param string ifMetagenerationNotMatch Makes the operation conditional on
   * whether the object's current metageneration does not match the given value.
   * @opt_param string kmsKeyName Resource name of the Cloud KMS key, of the form
   * projects/my-project/locations/global/keyRings/my-kr/cryptoKeys/my-key, that
   * will be used to encrypt the object. Overrides the object metadata's
   * kms_key_name value, if any.
   * @opt_param string name Name of the object. Required when the object metadata
   * is not otherwise provided. Overrides the object metadata's name value, if
   * any. For information about how to URL encode object names to be path safe,
   * see Encoding URI Path Parts.
   * @opt_param string predefinedAcl Apply a predefined set of access controls to
   * this object.
   * @opt_param string projection Set of properties to return. Defaults to noAcl,
   * unless the object resource specifies the acl property, when it defaults to
   * full.
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return StorageObject
   */
  public function insert($bucket, StorageObject $postBody, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], StorageObject::class);
  }
  /**
   * Retrieves a list of objects matching the criteria. (objects.listObjects)
   *
   * @param string $bucket Name of the bucket in which to look for objects.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string delimiter Returns results in a directory-like mode. items
   * will contain only objects whose names, aside from the prefix, do not contain
   * delimiter. Objects whose names, aside from the prefix, contain delimiter will
   * have their name, truncated after the delimiter, returned in prefixes.
   * Duplicate prefixes are omitted.
   * @opt_param string endOffset Filter results to objects whose names are
   * lexicographically before endOffset. If startOffset is also set, the objects
   * listed will have names between startOffset (inclusive) and endOffset
   * (exclusive).
   * @opt_param bool includeTrailingDelimiter If true, objects that end in exactly
   * one instance of delimiter will have their metadata included in items in
   * addition to prefixes.
   * @opt_param string maxResults Maximum number of items plus prefixes to return
   * in a single page of responses. As duplicate prefixes are omitted, fewer total
   * results may be returned than requested. The service will use this parameter
   * or 1,000 items, whichever is smaller.
   * @opt_param string pageToken A previously-returned page token representing
   * part of the larger set of results to view.
   * @opt_param string prefix Filter results to objects whose names begin with
   * this prefix.
   * @opt_param string projection Set of properties to return. Defaults to noAcl.
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string startOffset Filter results to objects whose names are
   * lexicographically equal to or after startOffset. If endOffset is also set,
   * the objects listed will have names between startOffset (inclusive) and
   * endOffset (exclusive).
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @opt_param bool versions If true, lists all versions of an object as distinct
   * results. The default is false. For more information, see Object Versioning.
   * @return ObjectsModel
   */
  public function listObjects($bucket, $optParams = [])
  {
    $params = ['bucket' => $bucket];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ObjectsModel::class);
  }
  /**
   * Patches an object's metadata. (objects.patch)
   *
   * @param string $bucket Name of the bucket in which the object resides.
   * @param string $object Name of the object. For information about how to URL
   * encode object names to be path safe, see Encoding URI Path Parts.
   * @param StorageObject $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string generation If present, selects a specific revision of this
   * object (as opposed to the latest version, the default).
   * @opt_param string ifGenerationMatch Makes the operation conditional on
   * whether the object's current generation matches the given value. Setting to 0
   * makes the operation succeed only if there are no live versions of the object.
   * @opt_param string ifGenerationNotMatch Makes the operation conditional on
   * whether the object's current generation does not match the given value. If no
   * live object exists, the precondition fails. Setting to 0 makes the operation
   * succeed only if there is a live version of the object.
   * @opt_param string ifMetagenerationMatch Makes the operation conditional on
   * whether the object's current metageneration matches the given value.
   * @opt_param string ifMetagenerationNotMatch Makes the operation conditional on
   * whether the object's current metageneration does not match the given value.
   * @opt_param string predefinedAcl Apply a predefined set of access controls to
   * this object.
   * @opt_param string projection Set of properties to return. Defaults to full.
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request, for
   * Requester Pays buckets.
   * @return StorageObject
   */
  public function patch($bucket, $object, StorageObject $postBody, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'object' => $object, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], StorageObject::class);
  }
  /**
   * Rewrites a source object to a destination object. Optionally overrides
   * metadata. (objects.rewrite)
   *
   * @param string $sourceBucket Name of the bucket in which to find the source
   * object.
   * @param string $sourceObject Name of the source object. For information about
   * how to URL encode object names to be path safe, see Encoding URI Path Parts.
   * @param string $destinationBucket Name of the bucket in which to store the new
   * object. Overrides the provided object metadata's bucket value, if any.
   * @param string $destinationObject Name of the new object. Required when the
   * object metadata is not otherwise provided. Overrides the object metadata's
   * name value, if any. For information about how to URL encode object names to
   * be path safe, see Encoding URI Path Parts.
   * @param StorageObject $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string destinationKmsKeyName Resource name of the Cloud KMS key,
   * of the form projects/my-project/locations/global/keyRings/my-kr/cryptoKeys
   * /my-key, that will be used to encrypt the object. Overrides the object
   * metadata's kms_key_name value, if any.
   * @opt_param string destinationPredefinedAcl Apply a predefined set of access
   * controls to the destination object.
   * @opt_param string ifGenerationMatch Makes the operation conditional on
   * whether the object's current generation matches the given value. Setting to 0
   * makes the operation succeed only if there are no live versions of the object.
   * @opt_param string ifGenerationNotMatch Makes the operation conditional on
   * whether the object's current generation does not match the given value. If no
   * live object exists, the precondition fails. Setting to 0 makes the operation
   * succeed only if there is a live version of the object.
   * @opt_param string ifMetagenerationMatch Makes the operation conditional on
   * whether the destination object's current metageneration matches the given
   * value.
   * @opt_param string ifMetagenerationNotMatch Makes the operation conditional on
   * whether the destination object's current metageneration does not match the
   * given value.
   * @opt_param string ifSourceGenerationMatch Makes the operation conditional on
   * whether the source object's current generation matches the given value.
   * @opt_param string ifSourceGenerationNotMatch Makes the operation conditional
   * on whether the source object's current generation does not match the given
   * value.
   * @opt_param string ifSourceMetagenerationMatch Makes the operation conditional
   * on whether the source object's current metageneration matches the given
   * value.
   * @opt_param string ifSourceMetagenerationNotMatch Makes the operation
   * conditional on whether the source object's current metageneration does not
   * match the given value.
   * @opt_param string maxBytesRewrittenPerCall The maximum number of bytes that
   * will be rewritten per rewrite request. Most callers shouldn't need to specify
   * this parameter - it is primarily in place to support testing. If specified
   * the value must be an integral multiple of 1 MiB (1048576). Also, this only
   * applies to requests where the source and destination span locations and/or
   * storage classes. Finally, this value must not change across rewrite calls
   * else you'll get an error that the rewriteToken is invalid.
   * @opt_param string projection Set of properties to return. Defaults to noAcl,
   * unless the object resource specifies the acl property, when it defaults to
   * full.
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string rewriteToken Include this field (from the previous rewrite
   * response) on each rewrite request after the first one, until the rewrite
   * response 'done' flag is true. Calls that provide a rewriteToken can omit all
   * other request fields, but if included those fields must match the values
   * provided in the first rewrite request.
   * @opt_param string sourceGeneration If present, selects a specific revision of
   * the source object (as opposed to the latest version, the default).
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return RewriteResponse
   */
  public function rewrite($sourceBucket, $sourceObject, $destinationBucket, $destinationObject, StorageObject $postBody, $optParams = [])
  {
    $params = ['sourceBucket' => $sourceBucket, 'sourceObject' => $sourceObject, 'destinationBucket' => $destinationBucket, 'destinationObject' => $destinationObject, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('rewrite', [$params], RewriteResponse::class);
  }
  /**
   * Updates an IAM policy for the specified object. (objects.setIamPolicy)
   *
   * @param string $bucket Name of the bucket in which the object resides.
   * @param string $object Name of the object. For information about how to URL
   * encode object names to be path safe, see Encoding URI Path Parts.
   * @param Policy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string generation If present, selects a specific revision of this
   * object (as opposed to the latest version, the default).
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Policy
   */
  public function setIamPolicy($bucket, $object, Policy $postBody, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'object' => $object, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Tests a set of permissions on the given object to see which, if any, are held
   * by the caller. (objects.testIamPermissions)
   *
   * @param string $bucket Name of the bucket in which the object resides.
   * @param string $object Name of the object. For information about how to URL
   * encode object names to be path safe, see Encoding URI Path Parts.
   * @param string|array $permissions Permissions to test.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string generation If present, selects a specific revision of this
   * object (as opposed to the latest version, the default).
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return TestIamPermissionsResponse
   */
  public function testIamPermissions($bucket, $object, $permissions, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'object' => $object, 'permissions' => $permissions];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestIamPermissionsResponse::class);
  }
  /**
   * Updates an object's metadata. (objects.update)
   *
   * @param string $bucket Name of the bucket in which the object resides.
   * @param string $object Name of the object. For information about how to URL
   * encode object names to be path safe, see Encoding URI Path Parts.
   * @param StorageObject $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string generation If present, selects a specific revision of this
   * object (as opposed to the latest version, the default).
   * @opt_param string ifGenerationMatch Makes the operation conditional on
   * whether the object's current generation matches the given value. Setting to 0
   * makes the operation succeed only if there are no live versions of the object.
   * @opt_param string ifGenerationNotMatch Makes the operation conditional on
   * whether the object's current generation does not match the given value. If no
   * live object exists, the precondition fails. Setting to 0 makes the operation
   * succeed only if there is a live version of the object.
   * @opt_param string ifMetagenerationMatch Makes the operation conditional on
   * whether the object's current metageneration matches the given value.
   * @opt_param string ifMetagenerationNotMatch Makes the operation conditional on
   * whether the object's current metageneration does not match the given value.
   * @opt_param string predefinedAcl Apply a predefined set of access controls to
   * this object.
   * @opt_param string projection Set of properties to return. Defaults to full.
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return StorageObject
   */
  public function update($bucket, $object, StorageObject $postBody, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'object' => $object, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], StorageObject::class);
  }
  /**
   * Watch for changes on all objects in a bucket. (objects.watchAll)
   *
   * @param string $bucket Name of the bucket in which to look for objects.
   * @param Channel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string delimiter Returns results in a directory-like mode. items
   * will contain only objects whose names, aside from the prefix, do not contain
   * delimiter. Objects whose names, aside from the prefix, contain delimiter will
   * have their name, truncated after the delimiter, returned in prefixes.
   * Duplicate prefixes are omitted.
   * @opt_param string endOffset Filter results to objects whose names are
   * lexicographically before endOffset. If startOffset is also set, the objects
   * listed will have names between startOffset (inclusive) and endOffset
   * (exclusive).
   * @opt_param bool includeTrailingDelimiter If true, objects that end in exactly
   * one instance of delimiter will have their metadata included in items in
   * addition to prefixes.
   * @opt_param string maxResults Maximum number of items plus prefixes to return
   * in a single page of responses. As duplicate prefixes are omitted, fewer total
   * results may be returned than requested. The service will use this parameter
   * or 1,000 items, whichever is smaller.
   * @opt_param string pageToken A previously-returned page token representing
   * part of the larger set of results to view.
   * @opt_param string prefix Filter results to objects whose names begin with
   * this prefix.
   * @opt_param string projection Set of properties to return. Defaults to noAcl.
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string startOffset Filter results to objects whose names are
   * lexicographically equal to or after startOffset. If endOffset is also set,
   * the objects listed will have names between startOffset (inclusive) and
   * endOffset (exclusive).
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @opt_param bool versions If true, lists all versions of an object as distinct
   * results. The default is false. For more information, see Object Versioning.
   * @return Channel
   */
  public function watchAll($bucket, Channel $postBody, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('watchAll', [$params], Channel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Objects::class, 'Google_Service_Storage_Resource_Objects');

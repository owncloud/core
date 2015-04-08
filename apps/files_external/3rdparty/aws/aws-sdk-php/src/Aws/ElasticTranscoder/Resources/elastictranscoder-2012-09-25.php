<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

return array (
    'apiVersion' => '2012-09-25',
    'endpointPrefix' => 'elastictranscoder',
    'serviceFullName' => 'Amazon Elastic Transcoder',
    'serviceType' => 'rest-json',
    'signatureVersion' => 'v4',
    'namespace' => 'ElasticTranscoder',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elastictranscoder.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elastictranscoder.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elastictranscoder.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elastictranscoder.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elastictranscoder.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elastictranscoder.ap-southeast-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'CancelJob' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/2012-09-25/jobs/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more required parameter values were not provided in the request.',
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'IncompatibleVersionException',
                ),
                array(
                    'reason' => 'The requested resource does not exist or is not available. For example, the pipeline to which you\'re trying to add a job doesn\'t exist or is still being created.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'The resource you are attempting to change is in use. For example, you are attempting to delete a pipeline that is currently in use.',
                    'class' => 'ResourceInUseException',
                ),
                array(
                    'reason' => 'General authentication failure. The request was not signed correctly.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'Elastic Transcoder encountered an unexpected exception while trying to fulfill the request.',
                    'class' => 'InternalServiceException',
                ),
            ),
        ),
        'CreateJob' => array(
            'httpMethod' => 'POST',
            'uri' => '/2012-09-25/jobs',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'CreateJobResponse',
            'responseType' => 'model',
            'parameters' => array(
                'PipelineId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Input' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Key' => array(
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 255,
                        ),
                        'FrameRate' => array(
                            'type' => 'string',
                        ),
                        'Resolution' => array(
                            'type' => 'string',
                        ),
                        'AspectRatio' => array(
                            'type' => 'string',
                        ),
                        'Interlaced' => array(
                            'type' => 'string',
                        ),
                        'Container' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Output' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Key' => array(
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 255,
                        ),
                        'ThumbnailPattern' => array(
                            'type' => 'string',
                        ),
                        'Rotate' => array(
                            'type' => 'string',
                        ),
                        'PresetId' => array(
                            'type' => 'string',
                        ),
                        'SegmentDuration' => array(
                            'type' => 'string',
                        ),
                        'Watermarks' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'JobWatermark',
                                'type' => 'object',
                                'properties' => array(
                                    'PresetWatermarkId' => array(
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 40,
                                    ),
                                    'InputKey' => array(
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 255,
                                    ),
                                ),
                            ),
                        ),
                        'AlbumArt' => array(
                            'type' => 'object',
                            'properties' => array(
                                'MergePolicy' => array(
                                    'type' => 'string',
                                ),
                                'Artwork' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Artwork',
                                        'type' => 'object',
                                        'properties' => array(
                                            'InputKey' => array(
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 255,
                                            ),
                                            'MaxWidth' => array(
                                                'type' => 'string',
                                            ),
                                            'MaxHeight' => array(
                                                'type' => 'string',
                                            ),
                                            'SizingPolicy' => array(
                                                'type' => 'string',
                                            ),
                                            'PaddingPolicy' => array(
                                                'type' => 'string',
                                            ),
                                            'AlbumArtFormat' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Composition' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Clip',
                                'type' => 'object',
                                'properties' => array(
                                    'TimeSpan' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'StartTime' => array(
                                                'type' => 'string',
                                            ),
                                            'Duration' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Captions' => array(
                            'type' => 'object',
                            'properties' => array(
                                'MergePolicy' => array(
                                    'type' => 'string',
                                ),
                                'CaptionSources' => array(
                                    'type' => 'array',
                                    'maxItems' => 20,
                                    'items' => array(
                                        'name' => 'CaptionSource',
                                        'type' => 'object',
                                        'properties' => array(
                                            'Key' => array(
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 255,
                                            ),
                                            'Language' => array(
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 255,
                                            ),
                                            'TimeOffset' => array(
                                                'type' => 'string',
                                            ),
                                            'Label' => array(
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 40,
                                            ),
                                        ),
                                    ),
                                ),
                                'CaptionFormats' => array(
                                    'type' => 'array',
                                    'maxItems' => 4,
                                    'items' => array(
                                        'name' => 'CaptionFormat',
                                        'type' => 'object',
                                        'properties' => array(
                                            'Format' => array(
                                                'type' => 'string',
                                            ),
                                            'Pattern' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Outputs' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'maxItems' => 30,
                    'items' => array(
                        'name' => 'CreateJobOutput',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 255,
                            ),
                            'ThumbnailPattern' => array(
                                'type' => 'string',
                            ),
                            'Rotate' => array(
                                'type' => 'string',
                            ),
                            'PresetId' => array(
                                'type' => 'string',
                            ),
                            'SegmentDuration' => array(
                                'type' => 'string',
                            ),
                            'Watermarks' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'JobWatermark',
                                    'type' => 'object',
                                    'properties' => array(
                                        'PresetWatermarkId' => array(
                                            'type' => 'string',
                                            'minLength' => 1,
                                            'maxLength' => 40,
                                        ),
                                        'InputKey' => array(
                                            'type' => 'string',
                                            'minLength' => 1,
                                            'maxLength' => 255,
                                        ),
                                    ),
                                ),
                            ),
                            'AlbumArt' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'MergePolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'Artwork' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Artwork',
                                            'type' => 'object',
                                            'properties' => array(
                                                'InputKey' => array(
                                                    'type' => 'string',
                                                    'minLength' => 1,
                                                    'maxLength' => 255,
                                                ),
                                                'MaxWidth' => array(
                                                    'type' => 'string',
                                                ),
                                                'MaxHeight' => array(
                                                    'type' => 'string',
                                                ),
                                                'SizingPolicy' => array(
                                                    'type' => 'string',
                                                ),
                                                'PaddingPolicy' => array(
                                                    'type' => 'string',
                                                ),
                                                'AlbumArtFormat' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Composition' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Clip',
                                    'type' => 'object',
                                    'properties' => array(
                                        'TimeSpan' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'StartTime' => array(
                                                    'type' => 'string',
                                                ),
                                                'Duration' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Captions' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'MergePolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'CaptionSources' => array(
                                        'type' => 'array',
                                        'maxItems' => 20,
                                        'items' => array(
                                            'name' => 'CaptionSource',
                                            'type' => 'object',
                                            'properties' => array(
                                                'Key' => array(
                                                    'type' => 'string',
                                                    'minLength' => 1,
                                                    'maxLength' => 255,
                                                ),
                                                'Language' => array(
                                                    'type' => 'string',
                                                    'minLength' => 1,
                                                    'maxLength' => 255,
                                                ),
                                                'TimeOffset' => array(
                                                    'type' => 'string',
                                                ),
                                                'Label' => array(
                                                    'type' => 'string',
                                                    'minLength' => 1,
                                                    'maxLength' => 40,
                                                ),
                                            ),
                                        ),
                                    ),
                                    'CaptionFormats' => array(
                                        'type' => 'array',
                                        'maxItems' => 4,
                                        'items' => array(
                                            'name' => 'CaptionFormat',
                                            'type' => 'object',
                                            'properties' => array(
                                                'Format' => array(
                                                    'type' => 'string',
                                                ),
                                                'Pattern' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'OutputKeyPrefix' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'Playlists' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'maxItems' => 30,
                    'items' => array(
                        'name' => 'CreateJobPlaylist',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 255,
                            ),
                            'Format' => array(
                                'type' => 'string',
                            ),
                            'OutputKeys' => array(
                                'type' => 'array',
                                'maxItems' => 30,
                                'items' => array(
                                    'name' => 'Key',
                                    'type' => 'string',
                                    'minLength' => 1,
                                    'maxLength' => 255,
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more required parameter values were not provided in the request.',
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'IncompatibleVersionException',
                ),
                array(
                    'reason' => 'The requested resource does not exist or is not available. For example, the pipeline to which you\'re trying to add a job doesn\'t exist or is still being created.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'General authentication failure. The request was not signed correctly.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'Too many operations for a given AWS account. For example, the number of pipelines exceeds the maximum allowed.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'Elastic Transcoder encountered an unexpected exception while trying to fulfill the request.',
                    'class' => 'InternalServiceException',
                ),
            ),
        ),
        'CreatePipeline' => array(
            'httpMethod' => 'POST',
            'uri' => '/2012-09-25/pipelines',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'CreatePipelineResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 40,
                ),
                'InputBucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'OutputBucket' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Role' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Notifications' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Progressing' => array(
                            'type' => 'string',
                        ),
                        'Completed' => array(
                            'type' => 'string',
                        ),
                        'Warning' => array(
                            'type' => 'string',
                        ),
                        'Error' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'ContentConfig' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Bucket' => array(
                            'type' => 'string',
                        ),
                        'StorageClass' => array(
                            'type' => 'string',
                        ),
                        'Permissions' => array(
                            'type' => 'array',
                            'maxItems' => 30,
                            'items' => array(
                                'name' => 'Permission',
                                'type' => 'object',
                                'properties' => array(
                                    'GranteeType' => array(
                                        'type' => 'string',
                                    ),
                                    'Grantee' => array(
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 255,
                                    ),
                                    'Access' => array(
                                        'type' => 'array',
                                        'maxItems' => 30,
                                        'items' => array(
                                            'name' => 'AccessControl',
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ThumbnailConfig' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Bucket' => array(
                            'type' => 'string',
                        ),
                        'StorageClass' => array(
                            'type' => 'string',
                        ),
                        'Permissions' => array(
                            'type' => 'array',
                            'maxItems' => 30,
                            'items' => array(
                                'name' => 'Permission',
                                'type' => 'object',
                                'properties' => array(
                                    'GranteeType' => array(
                                        'type' => 'string',
                                    ),
                                    'Grantee' => array(
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 255,
                                    ),
                                    'Access' => array(
                                        'type' => 'array',
                                        'maxItems' => 30,
                                        'items' => array(
                                            'name' => 'AccessControl',
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more required parameter values were not provided in the request.',
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'IncompatibleVersionException',
                ),
                array(
                    'reason' => 'General authentication failure. The request was not signed correctly.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'The requested resource does not exist or is not available. For example, the pipeline to which you\'re trying to add a job doesn\'t exist or is still being created.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Too many operations for a given AWS account. For example, the number of pipelines exceeds the maximum allowed.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'Elastic Transcoder encountered an unexpected exception while trying to fulfill the request.',
                    'class' => 'InternalServiceException',
                ),
            ),
        ),
        'CreatePreset' => array(
            'httpMethod' => 'POST',
            'uri' => '/2012-09-25/presets',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'CreatePresetResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 40,
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 255,
                ),
                'Container' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Video' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Codec' => array(
                            'type' => 'string',
                        ),
                        'CodecOptions' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 255,
                                'data' => array(
                                    'shape_name' => 'CodecOption',
                                ),
                            ),
                        ),
                        'KeyframesMaxDist' => array(
                            'type' => 'string',
                        ),
                        'FixedGOP' => array(
                            'type' => 'string',
                        ),
                        'BitRate' => array(
                            'type' => 'string',
                        ),
                        'FrameRate' => array(
                            'type' => 'string',
                        ),
                        'MaxFrameRate' => array(
                            'type' => 'string',
                        ),
                        'Resolution' => array(
                            'type' => 'string',
                        ),
                        'AspectRatio' => array(
                            'type' => 'string',
                        ),
                        'MaxWidth' => array(
                            'type' => 'string',
                        ),
                        'MaxHeight' => array(
                            'type' => 'string',
                        ),
                        'DisplayAspectRatio' => array(
                            'type' => 'string',
                        ),
                        'SizingPolicy' => array(
                            'type' => 'string',
                        ),
                        'PaddingPolicy' => array(
                            'type' => 'string',
                        ),
                        'Watermarks' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'PresetWatermark',
                                'type' => 'object',
                                'properties' => array(
                                    'Id' => array(
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 40,
                                    ),
                                    'MaxWidth' => array(
                                        'type' => 'string',
                                    ),
                                    'MaxHeight' => array(
                                        'type' => 'string',
                                    ),
                                    'SizingPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'HorizontalAlign' => array(
                                        'type' => 'string',
                                    ),
                                    'HorizontalOffset' => array(
                                        'type' => 'string',
                                    ),
                                    'VerticalAlign' => array(
                                        'type' => 'string',
                                    ),
                                    'VerticalOffset' => array(
                                        'type' => 'string',
                                    ),
                                    'Opacity' => array(
                                        'type' => 'string',
                                    ),
                                    'Target' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Audio' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Codec' => array(
                            'type' => 'string',
                        ),
                        'SampleRate' => array(
                            'type' => 'string',
                        ),
                        'BitRate' => array(
                            'type' => 'string',
                        ),
                        'Channels' => array(
                            'type' => 'string',
                        ),
                        'CodecOptions' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Profile' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'Thumbnails' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Format' => array(
                            'type' => 'string',
                        ),
                        'Interval' => array(
                            'type' => 'string',
                        ),
                        'Resolution' => array(
                            'type' => 'string',
                        ),
                        'AspectRatio' => array(
                            'type' => 'string',
                        ),
                        'MaxWidth' => array(
                            'type' => 'string',
                        ),
                        'MaxHeight' => array(
                            'type' => 'string',
                        ),
                        'SizingPolicy' => array(
                            'type' => 'string',
                        ),
                        'PaddingPolicy' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more required parameter values were not provided in the request.',
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'IncompatibleVersionException',
                ),
                array(
                    'reason' => 'General authentication failure. The request was not signed correctly.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'Too many operations for a given AWS account. For example, the number of pipelines exceeds the maximum allowed.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'Elastic Transcoder encountered an unexpected exception while trying to fulfill the request.',
                    'class' => 'InternalServiceException',
                ),
            ),
        ),
        'DeletePipeline' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/2012-09-25/pipelines/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more required parameter values were not provided in the request.',
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'IncompatibleVersionException',
                ),
                array(
                    'reason' => 'The requested resource does not exist or is not available. For example, the pipeline to which you\'re trying to add a job doesn\'t exist or is still being created.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'The resource you are attempting to change is in use. For example, you are attempting to delete a pipeline that is currently in use.',
                    'class' => 'ResourceInUseException',
                ),
                array(
                    'reason' => 'General authentication failure. The request was not signed correctly.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'Elastic Transcoder encountered an unexpected exception while trying to fulfill the request.',
                    'class' => 'InternalServiceException',
                ),
            ),
        ),
        'DeletePreset' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/2012-09-25/presets/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more required parameter values were not provided in the request.',
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'IncompatibleVersionException',
                ),
                array(
                    'reason' => 'The requested resource does not exist or is not available. For example, the pipeline to which you\'re trying to add a job doesn\'t exist or is still being created.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'General authentication failure. The request was not signed correctly.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'Elastic Transcoder encountered an unexpected exception while trying to fulfill the request.',
                    'class' => 'InternalServiceException',
                ),
            ),
        ),
        'ListJobsByPipeline' => array(
            'httpMethod' => 'GET',
            'uri' => '/2012-09-25/jobsByPipeline/{PipelineId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListJobsByPipelineResponse',
            'responseType' => 'model',
            'parameters' => array(
                'PipelineId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Ascending' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'PageToken' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more required parameter values were not provided in the request.',
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'IncompatibleVersionException',
                ),
                array(
                    'reason' => 'The requested resource does not exist or is not available. For example, the pipeline to which you\'re trying to add a job doesn\'t exist or is still being created.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'General authentication failure. The request was not signed correctly.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'Elastic Transcoder encountered an unexpected exception while trying to fulfill the request.',
                    'class' => 'InternalServiceException',
                ),
            ),
        ),
        'ListJobsByStatus' => array(
            'httpMethod' => 'GET',
            'uri' => '/2012-09-25/jobsByStatus/{Status}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListJobsByStatusResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Status' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Ascending' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'PageToken' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more required parameter values were not provided in the request.',
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'IncompatibleVersionException',
                ),
                array(
                    'reason' => 'The requested resource does not exist or is not available. For example, the pipeline to which you\'re trying to add a job doesn\'t exist or is still being created.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'General authentication failure. The request was not signed correctly.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'Elastic Transcoder encountered an unexpected exception while trying to fulfill the request.',
                    'class' => 'InternalServiceException',
                ),
            ),
        ),
        'ListPipelines' => array(
            'httpMethod' => 'GET',
            'uri' => '/2012-09-25/pipelines',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListPipelinesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Ascending' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'PageToken' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more required parameter values were not provided in the request.',
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'IncompatibleVersionException',
                ),
                array(
                    'reason' => 'General authentication failure. The request was not signed correctly.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'Elastic Transcoder encountered an unexpected exception while trying to fulfill the request.',
                    'class' => 'InternalServiceException',
                ),
            ),
        ),
        'ListPresets' => array(
            'httpMethod' => 'GET',
            'uri' => '/2012-09-25/presets',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListPresetsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Ascending' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'PageToken' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more required parameter values were not provided in the request.',
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'IncompatibleVersionException',
                ),
                array(
                    'reason' => 'General authentication failure. The request was not signed correctly.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'Elastic Transcoder encountered an unexpected exception while trying to fulfill the request.',
                    'class' => 'InternalServiceException',
                ),
            ),
        ),
        'ReadJob' => array(
            'httpMethod' => 'GET',
            'uri' => '/2012-09-25/jobs/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ReadJobResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more required parameter values were not provided in the request.',
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'IncompatibleVersionException',
                ),
                array(
                    'reason' => 'The requested resource does not exist or is not available. For example, the pipeline to which you\'re trying to add a job doesn\'t exist or is still being created.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'General authentication failure. The request was not signed correctly.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'Elastic Transcoder encountered an unexpected exception while trying to fulfill the request.',
                    'class' => 'InternalServiceException',
                ),
            ),
        ),
        'ReadPipeline' => array(
            'httpMethod' => 'GET',
            'uri' => '/2012-09-25/pipelines/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ReadPipelineResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more required parameter values were not provided in the request.',
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'IncompatibleVersionException',
                ),
                array(
                    'reason' => 'The requested resource does not exist or is not available. For example, the pipeline to which you\'re trying to add a job doesn\'t exist or is still being created.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'General authentication failure. The request was not signed correctly.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'Elastic Transcoder encountered an unexpected exception while trying to fulfill the request.',
                    'class' => 'InternalServiceException',
                ),
            ),
        ),
        'ReadPreset' => array(
            'httpMethod' => 'GET',
            'uri' => '/2012-09-25/presets/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ReadPresetResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more required parameter values were not provided in the request.',
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'IncompatibleVersionException',
                ),
                array(
                    'reason' => 'The requested resource does not exist or is not available. For example, the pipeline to which you\'re trying to add a job doesn\'t exist or is still being created.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'General authentication failure. The request was not signed correctly.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'Elastic Transcoder encountered an unexpected exception while trying to fulfill the request.',
                    'class' => 'InternalServiceException',
                ),
            ),
        ),
        'TestRole' => array(
            'httpMethod' => 'POST',
            'uri' => '/2012-09-25/roleTests',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'TestRoleResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Role' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InputBucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'OutputBucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Topics' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'maxItems' => 30,
                    'items' => array(
                        'name' => 'SnsTopic',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more required parameter values were not provided in the request.',
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'IncompatibleVersionException',
                ),
                array(
                    'reason' => 'The requested resource does not exist or is not available. For example, the pipeline to which you\'re trying to add a job doesn\'t exist or is still being created.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'General authentication failure. The request was not signed correctly.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'Elastic Transcoder encountered an unexpected exception while trying to fulfill the request.',
                    'class' => 'InternalServiceException',
                ),
            ),
        ),
        'UpdatePipeline' => array(
            'httpMethod' => 'PUT',
            'uri' => '/2012-09-25/pipelines/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'UpdatePipelineResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 40,
                ),
                'InputBucket' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Role' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Notifications' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Progressing' => array(
                            'type' => 'string',
                        ),
                        'Completed' => array(
                            'type' => 'string',
                        ),
                        'Warning' => array(
                            'type' => 'string',
                        ),
                        'Error' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'ContentConfig' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Bucket' => array(
                            'type' => 'string',
                        ),
                        'StorageClass' => array(
                            'type' => 'string',
                        ),
                        'Permissions' => array(
                            'type' => 'array',
                            'maxItems' => 30,
                            'items' => array(
                                'name' => 'Permission',
                                'type' => 'object',
                                'properties' => array(
                                    'GranteeType' => array(
                                        'type' => 'string',
                                    ),
                                    'Grantee' => array(
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 255,
                                    ),
                                    'Access' => array(
                                        'type' => 'array',
                                        'maxItems' => 30,
                                        'items' => array(
                                            'name' => 'AccessControl',
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ThumbnailConfig' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Bucket' => array(
                            'type' => 'string',
                        ),
                        'StorageClass' => array(
                            'type' => 'string',
                        ),
                        'Permissions' => array(
                            'type' => 'array',
                            'maxItems' => 30,
                            'items' => array(
                                'name' => 'Permission',
                                'type' => 'object',
                                'properties' => array(
                                    'GranteeType' => array(
                                        'type' => 'string',
                                    ),
                                    'Grantee' => array(
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 255,
                                    ),
                                    'Access' => array(
                                        'type' => 'array',
                                        'maxItems' => 30,
                                        'items' => array(
                                            'name' => 'AccessControl',
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more required parameter values were not provided in the request.',
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'IncompatibleVersionException',
                ),
                array(
                    'reason' => 'General authentication failure. The request was not signed correctly.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'The resource you are attempting to change is in use. For example, you are attempting to delete a pipeline that is currently in use.',
                    'class' => 'ResourceInUseException',
                ),
                array(
                    'reason' => 'The requested resource does not exist or is not available. For example, the pipeline to which you\'re trying to add a job doesn\'t exist or is still being created.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Elastic Transcoder encountered an unexpected exception while trying to fulfill the request.',
                    'class' => 'InternalServiceException',
                ),
            ),
        ),
        'UpdatePipelineNotifications' => array(
            'httpMethod' => 'POST',
            'uri' => '/2012-09-25/pipelines/{Id}/notifications',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'UpdatePipelineNotificationsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Notifications' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Progressing' => array(
                            'type' => 'string',
                        ),
                        'Completed' => array(
                            'type' => 'string',
                        ),
                        'Warning' => array(
                            'type' => 'string',
                        ),
                        'Error' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more required parameter values were not provided in the request.',
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'IncompatibleVersionException',
                ),
                array(
                    'reason' => 'The requested resource does not exist or is not available. For example, the pipeline to which you\'re trying to add a job doesn\'t exist or is still being created.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'The resource you are attempting to change is in use. For example, you are attempting to delete a pipeline that is currently in use.',
                    'class' => 'ResourceInUseException',
                ),
                array(
                    'reason' => 'General authentication failure. The request was not signed correctly.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'Elastic Transcoder encountered an unexpected exception while trying to fulfill the request.',
                    'class' => 'InternalServiceException',
                ),
            ),
        ),
        'UpdatePipelineStatus' => array(
            'httpMethod' => 'POST',
            'uri' => '/2012-09-25/pipelines/{Id}/status',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'UpdatePipelineStatusResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Status' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more required parameter values were not provided in the request.',
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'IncompatibleVersionException',
                ),
                array(
                    'reason' => 'The requested resource does not exist or is not available. For example, the pipeline to which you\'re trying to add a job doesn\'t exist or is still being created.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'The resource you are attempting to change is in use. For example, you are attempting to delete a pipeline that is currently in use.',
                    'class' => 'ResourceInUseException',
                ),
                array(
                    'reason' => 'General authentication failure. The request was not signed correctly.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'Elastic Transcoder encountered an unexpected exception while trying to fulfill the request.',
                    'class' => 'InternalServiceException',
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'CreateJobResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Job' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'PipelineId' => array(
                            'type' => 'string',
                        ),
                        'Input' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Key' => array(
                                    'type' => 'string',
                                ),
                                'FrameRate' => array(
                                    'type' => 'string',
                                ),
                                'Resolution' => array(
                                    'type' => 'string',
                                ),
                                'AspectRatio' => array(
                                    'type' => 'string',
                                ),
                                'Interlaced' => array(
                                    'type' => 'string',
                                ),
                                'Container' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Output' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Id' => array(
                                    'type' => 'string',
                                ),
                                'Key' => array(
                                    'type' => 'string',
                                ),
                                'ThumbnailPattern' => array(
                                    'type' => 'string',
                                ),
                                'Rotate' => array(
                                    'type' => 'string',
                                ),
                                'PresetId' => array(
                                    'type' => 'string',
                                ),
                                'SegmentDuration' => array(
                                    'type' => 'string',
                                ),
                                'Status' => array(
                                    'type' => 'string',
                                ),
                                'StatusDetail' => array(
                                    'type' => 'string',
                                ),
                                'Duration' => array(
                                    'type' => 'numeric',
                                ),
                                'Width' => array(
                                    'type' => 'numeric',
                                ),
                                'Height' => array(
                                    'type' => 'numeric',
                                ),
                                'Watermarks' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'JobWatermark',
                                        'type' => 'object',
                                        'properties' => array(
                                            'PresetWatermarkId' => array(
                                                'type' => 'string',
                                            ),
                                            'InputKey' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                                'AlbumArt' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'MergePolicy' => array(
                                            'type' => 'string',
                                        ),
                                        'Artwork' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'Artwork',
                                                'type' => 'object',
                                                'properties' => array(
                                                    'InputKey' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'MaxWidth' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'MaxHeight' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'SizingPolicy' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'PaddingPolicy' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'AlbumArtFormat' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'Composition' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Clip',
                                        'type' => 'object',
                                        'properties' => array(
                                            'TimeSpan' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'StartTime' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'Duration' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'Captions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'MergePolicy' => array(
                                            'type' => 'string',
                                        ),
                                        'CaptionSources' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'CaptionSource',
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Key' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'Language' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'TimeOffset' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'Label' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'CaptionFormats' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'CaptionFormat',
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Format' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'Pattern' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Outputs' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'JobOutput',
                                'type' => 'object',
                                'properties' => array(
                                    'Id' => array(
                                        'type' => 'string',
                                    ),
                                    'Key' => array(
                                        'type' => 'string',
                                    ),
                                    'ThumbnailPattern' => array(
                                        'type' => 'string',
                                    ),
                                    'Rotate' => array(
                                        'type' => 'string',
                                    ),
                                    'PresetId' => array(
                                        'type' => 'string',
                                    ),
                                    'SegmentDuration' => array(
                                        'type' => 'string',
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                    'StatusDetail' => array(
                                        'type' => 'string',
                                    ),
                                    'Duration' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Width' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Height' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Watermarks' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'JobWatermark',
                                            'type' => 'object',
                                            'properties' => array(
                                                'PresetWatermarkId' => array(
                                                    'type' => 'string',
                                                ),
                                                'InputKey' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'AlbumArt' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'MergePolicy' => array(
                                                'type' => 'string',
                                            ),
                                            'Artwork' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'Artwork',
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'InputKey' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'MaxWidth' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'MaxHeight' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'SizingPolicy' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'PaddingPolicy' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'AlbumArtFormat' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Composition' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Clip',
                                            'type' => 'object',
                                            'properties' => array(
                                                'TimeSpan' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'StartTime' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Duration' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Captions' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'MergePolicy' => array(
                                                'type' => 'string',
                                            ),
                                            'CaptionSources' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'CaptionSource',
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Key' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Language' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'TimeOffset' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Label' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'CaptionFormats' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'CaptionFormat',
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Format' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Pattern' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'OutputKeyPrefix' => array(
                            'type' => 'string',
                        ),
                        'Playlists' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Playlist',
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'type' => 'string',
                                    ),
                                    'Format' => array(
                                        'type' => 'string',
                                    ),
                                    'OutputKeys' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Key',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                    'StatusDetail' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'CreatePipelineResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Pipeline' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'InputBucket' => array(
                            'type' => 'string',
                        ),
                        'OutputBucket' => array(
                            'type' => 'string',
                        ),
                        'Role' => array(
                            'type' => 'string',
                        ),
                        'Notifications' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Progressing' => array(
                                    'type' => 'string',
                                ),
                                'Completed' => array(
                                    'type' => 'string',
                                ),
                                'Warning' => array(
                                    'type' => 'string',
                                ),
                                'Error' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'ContentConfig' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'StorageClass' => array(
                                    'type' => 'string',
                                ),
                                'Permissions' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Permission',
                                        'type' => 'object',
                                        'properties' => array(
                                            'GranteeType' => array(
                                                'type' => 'string',
                                            ),
                                            'Grantee' => array(
                                                'type' => 'string',
                                            ),
                                            'Access' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'AccessControl',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'ThumbnailConfig' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'StorageClass' => array(
                                    'type' => 'string',
                                ),
                                'Permissions' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Permission',
                                        'type' => 'object',
                                        'properties' => array(
                                            'GranteeType' => array(
                                                'type' => 'string',
                                            ),
                                            'Grantee' => array(
                                                'type' => 'string',
                                            ),
                                            'Access' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'AccessControl',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CreatePresetResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Preset' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                        'Container' => array(
                            'type' => 'string',
                        ),
                        'Audio' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Codec' => array(
                                    'type' => 'string',
                                ),
                                'SampleRate' => array(
                                    'type' => 'string',
                                ),
                                'BitRate' => array(
                                    'type' => 'string',
                                ),
                                'Channels' => array(
                                    'type' => 'string',
                                ),
                                'CodecOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Profile' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Video' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Codec' => array(
                                    'type' => 'string',
                                ),
                                'CodecOptions' => array(
                                    'type' => 'object',
                                    'additionalProperties' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'KeyframesMaxDist' => array(
                                    'type' => 'string',
                                ),
                                'FixedGOP' => array(
                                    'type' => 'string',
                                ),
                                'BitRate' => array(
                                    'type' => 'string',
                                ),
                                'FrameRate' => array(
                                    'type' => 'string',
                                ),
                                'MaxFrameRate' => array(
                                    'type' => 'string',
                                ),
                                'Resolution' => array(
                                    'type' => 'string',
                                ),
                                'AspectRatio' => array(
                                    'type' => 'string',
                                ),
                                'MaxWidth' => array(
                                    'type' => 'string',
                                ),
                                'MaxHeight' => array(
                                    'type' => 'string',
                                ),
                                'DisplayAspectRatio' => array(
                                    'type' => 'string',
                                ),
                                'SizingPolicy' => array(
                                    'type' => 'string',
                                ),
                                'PaddingPolicy' => array(
                                    'type' => 'string',
                                ),
                                'Watermarks' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'PresetWatermark',
                                        'type' => 'object',
                                        'properties' => array(
                                            'Id' => array(
                                                'type' => 'string',
                                            ),
                                            'MaxWidth' => array(
                                                'type' => 'string',
                                            ),
                                            'MaxHeight' => array(
                                                'type' => 'string',
                                            ),
                                            'SizingPolicy' => array(
                                                'type' => 'string',
                                            ),
                                            'HorizontalAlign' => array(
                                                'type' => 'string',
                                            ),
                                            'HorizontalOffset' => array(
                                                'type' => 'string',
                                            ),
                                            'VerticalAlign' => array(
                                                'type' => 'string',
                                            ),
                                            'VerticalOffset' => array(
                                                'type' => 'string',
                                            ),
                                            'Opacity' => array(
                                                'type' => 'string',
                                            ),
                                            'Target' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Thumbnails' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Format' => array(
                                    'type' => 'string',
                                ),
                                'Interval' => array(
                                    'type' => 'string',
                                ),
                                'Resolution' => array(
                                    'type' => 'string',
                                ),
                                'AspectRatio' => array(
                                    'type' => 'string',
                                ),
                                'MaxWidth' => array(
                                    'type' => 'string',
                                ),
                                'MaxHeight' => array(
                                    'type' => 'string',
                                ),
                                'SizingPolicy' => array(
                                    'type' => 'string',
                                ),
                                'PaddingPolicy' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Type' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Warning' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListJobsByPipelineResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Jobs' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Job',
                        'type' => 'object',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'PipelineId' => array(
                                'type' => 'string',
                            ),
                            'Input' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Key' => array(
                                        'type' => 'string',
                                    ),
                                    'FrameRate' => array(
                                        'type' => 'string',
                                    ),
                                    'Resolution' => array(
                                        'type' => 'string',
                                    ),
                                    'AspectRatio' => array(
                                        'type' => 'string',
                                    ),
                                    'Interlaced' => array(
                                        'type' => 'string',
                                    ),
                                    'Container' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Output' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Id' => array(
                                        'type' => 'string',
                                    ),
                                    'Key' => array(
                                        'type' => 'string',
                                    ),
                                    'ThumbnailPattern' => array(
                                        'type' => 'string',
                                    ),
                                    'Rotate' => array(
                                        'type' => 'string',
                                    ),
                                    'PresetId' => array(
                                        'type' => 'string',
                                    ),
                                    'SegmentDuration' => array(
                                        'type' => 'string',
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                    'StatusDetail' => array(
                                        'type' => 'string',
                                    ),
                                    'Duration' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Width' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Height' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Watermarks' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'JobWatermark',
                                            'type' => 'object',
                                            'properties' => array(
                                                'PresetWatermarkId' => array(
                                                    'type' => 'string',
                                                ),
                                                'InputKey' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'AlbumArt' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'MergePolicy' => array(
                                                'type' => 'string',
                                            ),
                                            'Artwork' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'Artwork',
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'InputKey' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'MaxWidth' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'MaxHeight' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'SizingPolicy' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'PaddingPolicy' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'AlbumArtFormat' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Composition' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Clip',
                                            'type' => 'object',
                                            'properties' => array(
                                                'TimeSpan' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'StartTime' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Duration' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Captions' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'MergePolicy' => array(
                                                'type' => 'string',
                                            ),
                                            'CaptionSources' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'CaptionSource',
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Key' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Language' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'TimeOffset' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Label' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'CaptionFormats' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'CaptionFormat',
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Format' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Pattern' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Outputs' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'JobOutput',
                                    'type' => 'object',
                                    'properties' => array(
                                        'Id' => array(
                                            'type' => 'string',
                                        ),
                                        'Key' => array(
                                            'type' => 'string',
                                        ),
                                        'ThumbnailPattern' => array(
                                            'type' => 'string',
                                        ),
                                        'Rotate' => array(
                                            'type' => 'string',
                                        ),
                                        'PresetId' => array(
                                            'type' => 'string',
                                        ),
                                        'SegmentDuration' => array(
                                            'type' => 'string',
                                        ),
                                        'Status' => array(
                                            'type' => 'string',
                                        ),
                                        'StatusDetail' => array(
                                            'type' => 'string',
                                        ),
                                        'Duration' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Width' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Height' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Watermarks' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'JobWatermark',
                                                'type' => 'object',
                                                'properties' => array(
                                                    'PresetWatermarkId' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'InputKey' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'AlbumArt' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'MergePolicy' => array(
                                                    'type' => 'string',
                                                ),
                                                'Artwork' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'Artwork',
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'InputKey' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'MaxWidth' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'MaxHeight' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'SizingPolicy' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'PaddingPolicy' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'AlbumArtFormat' => array(
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'Composition' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'Clip',
                                                'type' => 'object',
                                                'properties' => array(
                                                    'TimeSpan' => array(
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'StartTime' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'Duration' => array(
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'Captions' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'MergePolicy' => array(
                                                    'type' => 'string',
                                                ),
                                                'CaptionSources' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'CaptionSource',
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'Key' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'Language' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'TimeOffset' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'Label' => array(
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'CaptionFormats' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'CaptionFormat',
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'Format' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'Pattern' => array(
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'OutputKeyPrefix' => array(
                                'type' => 'string',
                            ),
                            'Playlists' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Playlist',
                                    'type' => 'object',
                                    'properties' => array(
                                        'Name' => array(
                                            'type' => 'string',
                                        ),
                                        'Format' => array(
                                            'type' => 'string',
                                        ),
                                        'OutputKeys' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'Key',
                                                'type' => 'string',
                                            ),
                                        ),
                                        'Status' => array(
                                            'type' => 'string',
                                        ),
                                        'StatusDetail' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'NextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListJobsByStatusResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Jobs' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Job',
                        'type' => 'object',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'PipelineId' => array(
                                'type' => 'string',
                            ),
                            'Input' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Key' => array(
                                        'type' => 'string',
                                    ),
                                    'FrameRate' => array(
                                        'type' => 'string',
                                    ),
                                    'Resolution' => array(
                                        'type' => 'string',
                                    ),
                                    'AspectRatio' => array(
                                        'type' => 'string',
                                    ),
                                    'Interlaced' => array(
                                        'type' => 'string',
                                    ),
                                    'Container' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Output' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Id' => array(
                                        'type' => 'string',
                                    ),
                                    'Key' => array(
                                        'type' => 'string',
                                    ),
                                    'ThumbnailPattern' => array(
                                        'type' => 'string',
                                    ),
                                    'Rotate' => array(
                                        'type' => 'string',
                                    ),
                                    'PresetId' => array(
                                        'type' => 'string',
                                    ),
                                    'SegmentDuration' => array(
                                        'type' => 'string',
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                    'StatusDetail' => array(
                                        'type' => 'string',
                                    ),
                                    'Duration' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Width' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Height' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Watermarks' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'JobWatermark',
                                            'type' => 'object',
                                            'properties' => array(
                                                'PresetWatermarkId' => array(
                                                    'type' => 'string',
                                                ),
                                                'InputKey' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'AlbumArt' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'MergePolicy' => array(
                                                'type' => 'string',
                                            ),
                                            'Artwork' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'Artwork',
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'InputKey' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'MaxWidth' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'MaxHeight' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'SizingPolicy' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'PaddingPolicy' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'AlbumArtFormat' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Composition' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Clip',
                                            'type' => 'object',
                                            'properties' => array(
                                                'TimeSpan' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'StartTime' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Duration' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Captions' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'MergePolicy' => array(
                                                'type' => 'string',
                                            ),
                                            'CaptionSources' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'CaptionSource',
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Key' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Language' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'TimeOffset' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Label' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'CaptionFormats' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'CaptionFormat',
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Format' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Pattern' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Outputs' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'JobOutput',
                                    'type' => 'object',
                                    'properties' => array(
                                        'Id' => array(
                                            'type' => 'string',
                                        ),
                                        'Key' => array(
                                            'type' => 'string',
                                        ),
                                        'ThumbnailPattern' => array(
                                            'type' => 'string',
                                        ),
                                        'Rotate' => array(
                                            'type' => 'string',
                                        ),
                                        'PresetId' => array(
                                            'type' => 'string',
                                        ),
                                        'SegmentDuration' => array(
                                            'type' => 'string',
                                        ),
                                        'Status' => array(
                                            'type' => 'string',
                                        ),
                                        'StatusDetail' => array(
                                            'type' => 'string',
                                        ),
                                        'Duration' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Width' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Height' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Watermarks' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'JobWatermark',
                                                'type' => 'object',
                                                'properties' => array(
                                                    'PresetWatermarkId' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'InputKey' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'AlbumArt' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'MergePolicy' => array(
                                                    'type' => 'string',
                                                ),
                                                'Artwork' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'Artwork',
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'InputKey' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'MaxWidth' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'MaxHeight' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'SizingPolicy' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'PaddingPolicy' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'AlbumArtFormat' => array(
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'Composition' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'Clip',
                                                'type' => 'object',
                                                'properties' => array(
                                                    'TimeSpan' => array(
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'StartTime' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'Duration' => array(
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'Captions' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'MergePolicy' => array(
                                                    'type' => 'string',
                                                ),
                                                'CaptionSources' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'CaptionSource',
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'Key' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'Language' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'TimeOffset' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'Label' => array(
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'CaptionFormats' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'CaptionFormat',
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'Format' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'Pattern' => array(
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'OutputKeyPrefix' => array(
                                'type' => 'string',
                            ),
                            'Playlists' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Playlist',
                                    'type' => 'object',
                                    'properties' => array(
                                        'Name' => array(
                                            'type' => 'string',
                                        ),
                                        'Format' => array(
                                            'type' => 'string',
                                        ),
                                        'OutputKeys' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'Key',
                                                'type' => 'string',
                                            ),
                                        ),
                                        'Status' => array(
                                            'type' => 'string',
                                        ),
                                        'StatusDetail' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'NextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListPipelinesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Pipelines' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Pipeline',
                        'type' => 'object',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'InputBucket' => array(
                                'type' => 'string',
                            ),
                            'OutputBucket' => array(
                                'type' => 'string',
                            ),
                            'Role' => array(
                                'type' => 'string',
                            ),
                            'Notifications' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Progressing' => array(
                                        'type' => 'string',
                                    ),
                                    'Completed' => array(
                                        'type' => 'string',
                                    ),
                                    'Warning' => array(
                                        'type' => 'string',
                                    ),
                                    'Error' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'ContentConfig' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Bucket' => array(
                                        'type' => 'string',
                                    ),
                                    'StorageClass' => array(
                                        'type' => 'string',
                                    ),
                                    'Permissions' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Permission',
                                            'type' => 'object',
                                            'properties' => array(
                                                'GranteeType' => array(
                                                    'type' => 'string',
                                                ),
                                                'Grantee' => array(
                                                    'type' => 'string',
                                                ),
                                                'Access' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'AccessControl',
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'ThumbnailConfig' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Bucket' => array(
                                        'type' => 'string',
                                    ),
                                    'StorageClass' => array(
                                        'type' => 'string',
                                    ),
                                    'Permissions' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Permission',
                                            'type' => 'object',
                                            'properties' => array(
                                                'GranteeType' => array(
                                                    'type' => 'string',
                                                ),
                                                'Grantee' => array(
                                                    'type' => 'string',
                                                ),
                                                'Access' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'AccessControl',
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'NextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListPresetsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Presets' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Preset',
                        'type' => 'object',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'Container' => array(
                                'type' => 'string',
                            ),
                            'Audio' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Codec' => array(
                                        'type' => 'string',
                                    ),
                                    'SampleRate' => array(
                                        'type' => 'string',
                                    ),
                                    'BitRate' => array(
                                        'type' => 'string',
                                    ),
                                    'Channels' => array(
                                        'type' => 'string',
                                    ),
                                    'CodecOptions' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Profile' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Video' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Codec' => array(
                                        'type' => 'string',
                                    ),
                                    'CodecOptions' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'KeyframesMaxDist' => array(
                                        'type' => 'string',
                                    ),
                                    'FixedGOP' => array(
                                        'type' => 'string',
                                    ),
                                    'BitRate' => array(
                                        'type' => 'string',
                                    ),
                                    'FrameRate' => array(
                                        'type' => 'string',
                                    ),
                                    'MaxFrameRate' => array(
                                        'type' => 'string',
                                    ),
                                    'Resolution' => array(
                                        'type' => 'string',
                                    ),
                                    'AspectRatio' => array(
                                        'type' => 'string',
                                    ),
                                    'MaxWidth' => array(
                                        'type' => 'string',
                                    ),
                                    'MaxHeight' => array(
                                        'type' => 'string',
                                    ),
                                    'DisplayAspectRatio' => array(
                                        'type' => 'string',
                                    ),
                                    'SizingPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'PaddingPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'Watermarks' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'PresetWatermark',
                                            'type' => 'object',
                                            'properties' => array(
                                                'Id' => array(
                                                    'type' => 'string',
                                                ),
                                                'MaxWidth' => array(
                                                    'type' => 'string',
                                                ),
                                                'MaxHeight' => array(
                                                    'type' => 'string',
                                                ),
                                                'SizingPolicy' => array(
                                                    'type' => 'string',
                                                ),
                                                'HorizontalAlign' => array(
                                                    'type' => 'string',
                                                ),
                                                'HorizontalOffset' => array(
                                                    'type' => 'string',
                                                ),
                                                'VerticalAlign' => array(
                                                    'type' => 'string',
                                                ),
                                                'VerticalOffset' => array(
                                                    'type' => 'string',
                                                ),
                                                'Opacity' => array(
                                                    'type' => 'string',
                                                ),
                                                'Target' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Thumbnails' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Format' => array(
                                        'type' => 'string',
                                    ),
                                    'Interval' => array(
                                        'type' => 'string',
                                    ),
                                    'Resolution' => array(
                                        'type' => 'string',
                                    ),
                                    'AspectRatio' => array(
                                        'type' => 'string',
                                    ),
                                    'MaxWidth' => array(
                                        'type' => 'string',
                                    ),
                                    'MaxHeight' => array(
                                        'type' => 'string',
                                    ),
                                    'SizingPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'PaddingPolicy' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Type' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'NextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ReadJobResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Job' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'PipelineId' => array(
                            'type' => 'string',
                        ),
                        'Input' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Key' => array(
                                    'type' => 'string',
                                ),
                                'FrameRate' => array(
                                    'type' => 'string',
                                ),
                                'Resolution' => array(
                                    'type' => 'string',
                                ),
                                'AspectRatio' => array(
                                    'type' => 'string',
                                ),
                                'Interlaced' => array(
                                    'type' => 'string',
                                ),
                                'Container' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Output' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Id' => array(
                                    'type' => 'string',
                                ),
                                'Key' => array(
                                    'type' => 'string',
                                ),
                                'ThumbnailPattern' => array(
                                    'type' => 'string',
                                ),
                                'Rotate' => array(
                                    'type' => 'string',
                                ),
                                'PresetId' => array(
                                    'type' => 'string',
                                ),
                                'SegmentDuration' => array(
                                    'type' => 'string',
                                ),
                                'Status' => array(
                                    'type' => 'string',
                                ),
                                'StatusDetail' => array(
                                    'type' => 'string',
                                ),
                                'Duration' => array(
                                    'type' => 'numeric',
                                ),
                                'Width' => array(
                                    'type' => 'numeric',
                                ),
                                'Height' => array(
                                    'type' => 'numeric',
                                ),
                                'Watermarks' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'JobWatermark',
                                        'type' => 'object',
                                        'properties' => array(
                                            'PresetWatermarkId' => array(
                                                'type' => 'string',
                                            ),
                                            'InputKey' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                                'AlbumArt' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'MergePolicy' => array(
                                            'type' => 'string',
                                        ),
                                        'Artwork' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'Artwork',
                                                'type' => 'object',
                                                'properties' => array(
                                                    'InputKey' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'MaxWidth' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'MaxHeight' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'SizingPolicy' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'PaddingPolicy' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'AlbumArtFormat' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'Composition' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Clip',
                                        'type' => 'object',
                                        'properties' => array(
                                            'TimeSpan' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'StartTime' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'Duration' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'Captions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'MergePolicy' => array(
                                            'type' => 'string',
                                        ),
                                        'CaptionSources' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'CaptionSource',
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Key' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'Language' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'TimeOffset' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'Label' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'CaptionFormats' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'CaptionFormat',
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Format' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'Pattern' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Outputs' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'JobOutput',
                                'type' => 'object',
                                'properties' => array(
                                    'Id' => array(
                                        'type' => 'string',
                                    ),
                                    'Key' => array(
                                        'type' => 'string',
                                    ),
                                    'ThumbnailPattern' => array(
                                        'type' => 'string',
                                    ),
                                    'Rotate' => array(
                                        'type' => 'string',
                                    ),
                                    'PresetId' => array(
                                        'type' => 'string',
                                    ),
                                    'SegmentDuration' => array(
                                        'type' => 'string',
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                    'StatusDetail' => array(
                                        'type' => 'string',
                                    ),
                                    'Duration' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Width' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Height' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Watermarks' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'JobWatermark',
                                            'type' => 'object',
                                            'properties' => array(
                                                'PresetWatermarkId' => array(
                                                    'type' => 'string',
                                                ),
                                                'InputKey' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'AlbumArt' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'MergePolicy' => array(
                                                'type' => 'string',
                                            ),
                                            'Artwork' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'Artwork',
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'InputKey' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'MaxWidth' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'MaxHeight' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'SizingPolicy' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'PaddingPolicy' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'AlbumArtFormat' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Composition' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Clip',
                                            'type' => 'object',
                                            'properties' => array(
                                                'TimeSpan' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'StartTime' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Duration' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Captions' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'MergePolicy' => array(
                                                'type' => 'string',
                                            ),
                                            'CaptionSources' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'CaptionSource',
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Key' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Language' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'TimeOffset' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Label' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'CaptionFormats' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'CaptionFormat',
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Format' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Pattern' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'OutputKeyPrefix' => array(
                            'type' => 'string',
                        ),
                        'Playlists' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Playlist',
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'type' => 'string',
                                    ),
                                    'Format' => array(
                                        'type' => 'string',
                                    ),
                                    'OutputKeys' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Key',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                    'StatusDetail' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'ReadPipelineResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Pipeline' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'InputBucket' => array(
                            'type' => 'string',
                        ),
                        'OutputBucket' => array(
                            'type' => 'string',
                        ),
                        'Role' => array(
                            'type' => 'string',
                        ),
                        'Notifications' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Progressing' => array(
                                    'type' => 'string',
                                ),
                                'Completed' => array(
                                    'type' => 'string',
                                ),
                                'Warning' => array(
                                    'type' => 'string',
                                ),
                                'Error' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'ContentConfig' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'StorageClass' => array(
                                    'type' => 'string',
                                ),
                                'Permissions' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Permission',
                                        'type' => 'object',
                                        'properties' => array(
                                            'GranteeType' => array(
                                                'type' => 'string',
                                            ),
                                            'Grantee' => array(
                                                'type' => 'string',
                                            ),
                                            'Access' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'AccessControl',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'ThumbnailConfig' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'StorageClass' => array(
                                    'type' => 'string',
                                ),
                                'Permissions' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Permission',
                                        'type' => 'object',
                                        'properties' => array(
                                            'GranteeType' => array(
                                                'type' => 'string',
                                            ),
                                            'Grantee' => array(
                                                'type' => 'string',
                                            ),
                                            'Access' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'AccessControl',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ReadPresetResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Preset' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                        'Container' => array(
                            'type' => 'string',
                        ),
                        'Audio' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Codec' => array(
                                    'type' => 'string',
                                ),
                                'SampleRate' => array(
                                    'type' => 'string',
                                ),
                                'BitRate' => array(
                                    'type' => 'string',
                                ),
                                'Channels' => array(
                                    'type' => 'string',
                                ),
                                'CodecOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Profile' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Video' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Codec' => array(
                                    'type' => 'string',
                                ),
                                'CodecOptions' => array(
                                    'type' => 'object',
                                    'additionalProperties' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'KeyframesMaxDist' => array(
                                    'type' => 'string',
                                ),
                                'FixedGOP' => array(
                                    'type' => 'string',
                                ),
                                'BitRate' => array(
                                    'type' => 'string',
                                ),
                                'FrameRate' => array(
                                    'type' => 'string',
                                ),
                                'MaxFrameRate' => array(
                                    'type' => 'string',
                                ),
                                'Resolution' => array(
                                    'type' => 'string',
                                ),
                                'AspectRatio' => array(
                                    'type' => 'string',
                                ),
                                'MaxWidth' => array(
                                    'type' => 'string',
                                ),
                                'MaxHeight' => array(
                                    'type' => 'string',
                                ),
                                'DisplayAspectRatio' => array(
                                    'type' => 'string',
                                ),
                                'SizingPolicy' => array(
                                    'type' => 'string',
                                ),
                                'PaddingPolicy' => array(
                                    'type' => 'string',
                                ),
                                'Watermarks' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'PresetWatermark',
                                        'type' => 'object',
                                        'properties' => array(
                                            'Id' => array(
                                                'type' => 'string',
                                            ),
                                            'MaxWidth' => array(
                                                'type' => 'string',
                                            ),
                                            'MaxHeight' => array(
                                                'type' => 'string',
                                            ),
                                            'SizingPolicy' => array(
                                                'type' => 'string',
                                            ),
                                            'HorizontalAlign' => array(
                                                'type' => 'string',
                                            ),
                                            'HorizontalOffset' => array(
                                                'type' => 'string',
                                            ),
                                            'VerticalAlign' => array(
                                                'type' => 'string',
                                            ),
                                            'VerticalOffset' => array(
                                                'type' => 'string',
                                            ),
                                            'Opacity' => array(
                                                'type' => 'string',
                                            ),
                                            'Target' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Thumbnails' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Format' => array(
                                    'type' => 'string',
                                ),
                                'Interval' => array(
                                    'type' => 'string',
                                ),
                                'Resolution' => array(
                                    'type' => 'string',
                                ),
                                'AspectRatio' => array(
                                    'type' => 'string',
                                ),
                                'MaxWidth' => array(
                                    'type' => 'string',
                                ),
                                'MaxHeight' => array(
                                    'type' => 'string',
                                ),
                                'SizingPolicy' => array(
                                    'type' => 'string',
                                ),
                                'PaddingPolicy' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Type' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'TestRoleResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Success' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Messages' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'UpdatePipelineResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Pipeline' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'InputBucket' => array(
                            'type' => 'string',
                        ),
                        'OutputBucket' => array(
                            'type' => 'string',
                        ),
                        'Role' => array(
                            'type' => 'string',
                        ),
                        'Notifications' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Progressing' => array(
                                    'type' => 'string',
                                ),
                                'Completed' => array(
                                    'type' => 'string',
                                ),
                                'Warning' => array(
                                    'type' => 'string',
                                ),
                                'Error' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'ContentConfig' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'StorageClass' => array(
                                    'type' => 'string',
                                ),
                                'Permissions' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Permission',
                                        'type' => 'object',
                                        'properties' => array(
                                            'GranteeType' => array(
                                                'type' => 'string',
                                            ),
                                            'Grantee' => array(
                                                'type' => 'string',
                                            ),
                                            'Access' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'AccessControl',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'ThumbnailConfig' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'StorageClass' => array(
                                    'type' => 'string',
                                ),
                                'Permissions' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Permission',
                                        'type' => 'object',
                                        'properties' => array(
                                            'GranteeType' => array(
                                                'type' => 'string',
                                            ),
                                            'Grantee' => array(
                                                'type' => 'string',
                                            ),
                                            'Access' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'AccessControl',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'UpdatePipelineNotificationsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Pipeline' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'InputBucket' => array(
                            'type' => 'string',
                        ),
                        'OutputBucket' => array(
                            'type' => 'string',
                        ),
                        'Role' => array(
                            'type' => 'string',
                        ),
                        'Notifications' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Progressing' => array(
                                    'type' => 'string',
                                ),
                                'Completed' => array(
                                    'type' => 'string',
                                ),
                                'Warning' => array(
                                    'type' => 'string',
                                ),
                                'Error' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'ContentConfig' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'StorageClass' => array(
                                    'type' => 'string',
                                ),
                                'Permissions' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Permission',
                                        'type' => 'object',
                                        'properties' => array(
                                            'GranteeType' => array(
                                                'type' => 'string',
                                            ),
                                            'Grantee' => array(
                                                'type' => 'string',
                                            ),
                                            'Access' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'AccessControl',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'ThumbnailConfig' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'StorageClass' => array(
                                    'type' => 'string',
                                ),
                                'Permissions' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Permission',
                                        'type' => 'object',
                                        'properties' => array(
                                            'GranteeType' => array(
                                                'type' => 'string',
                                            ),
                                            'Grantee' => array(
                                                'type' => 'string',
                                            ),
                                            'Access' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'AccessControl',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'UpdatePipelineStatusResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Pipeline' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'InputBucket' => array(
                            'type' => 'string',
                        ),
                        'OutputBucket' => array(
                            'type' => 'string',
                        ),
                        'Role' => array(
                            'type' => 'string',
                        ),
                        'Notifications' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Progressing' => array(
                                    'type' => 'string',
                                ),
                                'Completed' => array(
                                    'type' => 'string',
                                ),
                                'Warning' => array(
                                    'type' => 'string',
                                ),
                                'Error' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'ContentConfig' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'StorageClass' => array(
                                    'type' => 'string',
                                ),
                                'Permissions' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Permission',
                                        'type' => 'object',
                                        'properties' => array(
                                            'GranteeType' => array(
                                                'type' => 'string',
                                            ),
                                            'Grantee' => array(
                                                'type' => 'string',
                                            ),
                                            'Access' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'AccessControl',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'ThumbnailConfig' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'StorageClass' => array(
                                    'type' => 'string',
                                ),
                                'Permissions' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Permission',
                                        'type' => 'object',
                                        'properties' => array(
                                            'GranteeType' => array(
                                                'type' => 'string',
                                            ),
                                            'Grantee' => array(
                                                'type' => 'string',
                                            ),
                                            'Access' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'AccessControl',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'iterators' => array(
        'ListJobsByPipeline' => array(
            'input_token' => 'PageToken',
            'output_token' => 'NextPageToken',
            'result_key' => 'Jobs',
        ),
        'ListJobsByStatus' => array(
            'input_token' => 'PageToken',
            'output_token' => 'NextPageToken',
            'result_key' => 'Jobs',
        ),
        'ListPipelines' => array(
            'input_token' => 'PageToken',
            'output_token' => 'NextPageToken',
            'result_key' => 'Pipelines',
        ),
        'ListPresets' => array(
            'input_token' => 'PageToken',
            'output_token' => 'NextPageToken',
            'result_key' => 'Presets',
        ),
    ),
);
